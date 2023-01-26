<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function ajaxCities(Request $request)
    {
        return City::where(['country_id' => $request->country_id])->get();
    }
}
