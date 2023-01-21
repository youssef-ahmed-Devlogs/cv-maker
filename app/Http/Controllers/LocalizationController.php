<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function changeLanguage(Request $request)
    {
        Session::put("locale", $request->language);
        App::setLocale($request->language);
        return back();
    }
}
