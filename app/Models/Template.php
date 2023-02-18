<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover',
        'template_code',
        'is_free',
        'created_by',
        'category_id',
    ];

    public function name($lang = null)
    {
        if (!$lang)
            $lang = Session::get('locale');
        return json_decode($this->name)->$lang;
    }

    public function cover()
    {
        return $this->cover ? asset('storage/' . $this->cover) : asset('images/template_cover.png');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
