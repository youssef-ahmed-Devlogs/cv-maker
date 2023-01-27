<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        return view('frontend.pages.index', compact('usersCount'));
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

    public function download()
    {
        return view('frontend.pages.download');
    }

    public function templates()
    {
        return view('frontend.pages.templates');
    }

    public function create()
    {
        return view('frontend.pages.create');
    }

    public function myCvs()
    {
        return view('frontend.pages.my_cvs');
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
            'phone' => ['required', 'numeric', 'digits_between:11,11'],
            'gender' => ['required', 'in:male,female'],
            'country_id' => ['required'],
            'city_id' => ['required'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'about_me' => ['nullable', 'max:5000'],
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
