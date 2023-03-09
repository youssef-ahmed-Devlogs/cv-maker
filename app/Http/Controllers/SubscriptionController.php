<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use \Stripe\StripeClient;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

// 4242 4242 4242 4242
class SubscriptionController extends Controller
{
    public function index()
    {
        return view('frontend.pages.subscription');
    }

    public function subscribe(Request $request, $plan)
    {
        $subscription_options = [
            'plan' => $plan,
            'price' => 0,
            'expiration_date' => null,
            'sessionId' => null,
        ];

        if ($plan === 'PRO') {

            if (auth()->user()->subscriptionExpiration()) {
                toastr()->success('You are already subscribed in the pro subscription plan.');
                return redirect()->route('frontend.index');
            }

            $subscription_options['price'] = 99; // EGP
            $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));

            $checkout_session = $stripe->checkout->sessions->create([
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'egp',
                        'product_data' => [
                            'name' => strtolower($plan) . ' subscription plan',
                        ],
                        'unit_amount' => $subscription_options['price'] * 100, // convert to piastres
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('frontend.subscription.success') . "?session_id={CHECKOUT_SESSION_ID}",
                'cancel_url' => route('frontend.subscription.cancel') . "?session_id={CHECKOUT_SESSION_ID}",
            ]);


            $currentDate = new \DateTime();
            $currentDate->modify('+30 days');
            $subscription_options['expiration_date'] = $currentDate->format('Y-m-d H:i:s');
            $subscription_options['sessionId'] = $checkout_session->id;

            $this->startSubscription($subscription_options);
            return redirect($checkout_session->url);
        }

        if ($plan === 'FREE' && auth()->user()->free_subscription()) {
            toastr()->success('You are already subscribed in the free subscription');
            return redirect()->route('frontend.index');
        }

        $this->startSubscription($subscription_options);

        toastr()->success('Your free subscription has been started successfully.');
        return redirect()->route('frontend.index');
    }


    public function startSubscription($subscription_options)
    {
        $subscription = new Subscription();
        $subscription->user_id = auth()->id();
        $subscription->plan = $subscription_options['plan'];
        $subscription->price = $subscription_options['price'];
        $subscription->session_id = $subscription_options['sessionId'];
        $subscription->expiration_date = $subscription_options['expiration_date'];
        $subscription->save();
    }

    public function subscribe_success(Request $request)
    {
        try {
            $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
            $session = $stripe->checkout->sessions->retrieve($request->get('session_id'));
            $subscription = Subscription::where('session_id', $session->id)->where('payment_status', 'UNPAID')->first();

            if (!$subscription) {
                throw new NotFoundHttpException;
            }

            $subscription->payment_status = 'PAID';
            $subscription->save();
        } catch (\Exception $e) {
            throw new NotFoundHttpException;
        }

        toastr()->success('Your pro subscription has been started successfully, and the expiration date is ' . $subscription->expiration_date);
        return redirect()->route('frontend.index');
    }

    public function subscribe_cancel(Request $request)
    {
        try {
            $stripe = new StripeClient(env('STRIPE_SECRET_KEY'));
            $session = $stripe->checkout->sessions->retrieve($request->get('session_id'));
            $subscription = Subscription::where('session_id', $session->id)->where('payment_status', 'UNPAID')->first();

            if (!$subscription) {
                throw new NotFoundHttpException;
            }

            $subscription->delete();
        } catch (\Exception $e) {
            throw new NotFoundHttpException;
        }

        return redirect()->route('frontend.index');
    }

    public function unsubscribe($plan)
    {
        $subscriptions = auth()->user()->subscriptions->where('plan', $plan);

        foreach ($subscriptions as $subscription) {
            $subscription->delete();
        }

        toastr()->success('The subscription plan has been unsubscribed successfully.');
        return back();
    }
}
