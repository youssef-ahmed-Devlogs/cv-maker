<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function users()
    {
        return view('admin.pages.users.index');
    }

    public function create()
    {
        return view('admin.pages.users.create');
    }
}
