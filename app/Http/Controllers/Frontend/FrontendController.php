<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.index');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function faq()
    {
        return view('frontend.pages.faq');
    }

    public function templates()
    {
        $templates = Template::all();
        return view('frontend.pages.templates', compact('templates'));
    }

    public function create()
    {
        $template = Template::findOrFail(request()->get('template'));
        $templateView = Blade::render($template->template_code);
        return view('frontend.pages.create', compact('templateView'));
    }

    public function myCvs()
    {
        $cvs = auth()->user()->cvs;
        return view('frontend.pages.my_cvs', compact('cvs'));
    }

    public function myAccount()
    {
        return view('frontend.pages.my_account');
    }

    public function updateMyAccount(Request $request)
    {
        $currentUser = auth()->user();
        $formFields = $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email', "unique:users,email,$currentUser->id"],
            'age' => ['required', 'numeric', 'min:15', 'max:70'],
            'phone' => ['nullable', 'numeric', 'digits_between:11,11'],
            'gender' => ['required', 'in:male,female'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'about_me' => ['nullable', 'max:5000'],
            'country_id' => ['required'],
            'city_id' => ['required'],
        ]);

        if ($request->hasFile('photo')) {
            $formFields['photo'] = $request->photo->store('users/photos', 'public');

            if ($currentUser->photo != null)
                unlink('storage/' . $currentUser->photo);
        }

        $currentUser->update($formFields);

        toastr()->success('Account updated successfully.', 'success');
        return redirect()->back();
    }

    public function updateMyPassword(Request $request)
    {
        $currentUser = auth()->user();

        $formFields = $request->validate([
            'current_password' => ['required', 'min:8', 'max:50'],
            'password' => ['required', 'min:8', 'max:50', 'confirmed'],
            'password_confirmation' => ['required', 'min:8', 'max:50'],
        ]);

        if (!Hash::check($request->current_password, $currentUser->password))
            return redirect()->back()->withErrors(['current_password' => 'Invalid password']);

        $currentUser->update([
            'password' => Hash::make($request->password)
        ]);

        toastr()->success('Password updated successfully.', 'success');
        return redirect()->back();
    }
}
