<?php

namespace App\Http\Controllers\Frontend;

use App\Events\NewUserRegistrationEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\NewUserRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed'],
            'age' => ['required', 'numeric'],
            'gender' => ['required', 'in:male,female'],
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);
        auth()->login($user);


        // Send notification to dashboard
        event(new NewUserRegistrationEvent($user));

        return response()->json([
            'status' => 'success',
            'message' => 'Your account has been created successfully.'
        ]);
    }

    public function login(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'user')
                return back();

            return redirect()->route('admin.index');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('frontend.index');
    }
}
