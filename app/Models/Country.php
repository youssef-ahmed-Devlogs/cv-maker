<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Country extends Model
{
    use HasFactory;

    public function name($lang = null)
    {
        if ($lang)
            $lang = "name_" . $lang;
        else
            $lang = "name_" . Session::get('locale');
        return json_decode($this->name)->$lang;
    }
}
