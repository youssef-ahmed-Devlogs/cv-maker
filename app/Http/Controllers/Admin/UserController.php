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
            'country_id' => ['required'],
            'city_id' => ['required'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $newUser['password'] = bcrypt($newUser['password']);

        if ($request->hasFile('photo')) {
            $newUser['photo'] = $request->photo->store('users/photos', 'public');
        }

        User::create($newUser);

        toastr()->success('User created successfully.', 'success');
        return redirect()->back();
    }

    public function edit(User $user)
    {
        return view('admin.pages.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email', "unique:users,email,$user->id,id"],
            'password' => ['nullable', 'min:8', 'max:50', 'confirmed'],
            'age' => ['required', 'numeric', 'min:15', 'max:70'],
            'phone' => ['required', 'numeric', 'digits_between:11,11'],
            'gender' => ['required', 'in:male,female'],
            'role' => ['required', 'in:user,admin'],
            'country_id' => ['required'],
            'city_id' => ['required'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $updatedUser = $request->all();

        if ($updatedUser['password'] != null)
            $updatedUser['password'] = bcrypt($updatedUser['password']);
        else
            unset($updatedUser['password']);

        if ($request->hasFile('photo')) {
            $updatedUser['photo'] = $request->photo->store('users/photos', 'public');

            if ($user->photo != null)
                unlink('storage/' . $user->photo);
        }

        $user->update($updatedUser);
        toastr()->success('User updated successfully.', 'success');
        return redirect()->back();
    }

    public function show(User $user)
    {
        return view('admin.pages.users.show', compact('user'));
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.pages.users.show', compact('user'));
    }


    public function destroy(User $user)
    {
        if ($user->photo != null)
            unlink('storage/' . $user->photo);

        $user->delete();
        toastr()->success('User deleted successfully.', 'success');
        return redirect()->route('admin.users.index');
    }
}
