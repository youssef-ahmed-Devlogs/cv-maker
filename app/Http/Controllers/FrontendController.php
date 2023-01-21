<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
