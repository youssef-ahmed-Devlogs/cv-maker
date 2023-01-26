<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.pages.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }

    public function store(Request $request)
    {
        $newUser = $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:50', 'confirmed'],
            'age' => ['required', 'numeric', 'min:15', 'max:70'],
            'phone' => ['required', 'numeric', 'digits_between:11,11'],
            'gender' => ['required', 'in:male,female'],
            'role' => ['required', 'in:user,admin'],
            'country' => ['required'],
            'city' => ['required'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $newUser['password'] = bcrypt($newUser['password']);

        if ($request->hasFile('photo')) {
            $newUser['photo'] = $request->photo->store('users/photos', 'public');
        }

        User::create($newUser);
        return redirect()->back();
    }

    public function show(User $user)
    {
        return $user;
    }
}
