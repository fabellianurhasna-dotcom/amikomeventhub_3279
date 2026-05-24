<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // 🌟 Pastikan 'slug' ada di dalam array fillable ini
    protected $fillable = ['name', 'slug']; 

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}