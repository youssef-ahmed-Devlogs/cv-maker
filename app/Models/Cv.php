<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }
}
