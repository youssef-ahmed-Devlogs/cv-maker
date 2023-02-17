<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'created_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function title($lang = null)
    {
        if (!$lang)
            $lang = Session::get('locale');
        return json_decode($this->title)->$lang;
    }
}
