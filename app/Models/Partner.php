<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    // 🌟 Tambahkan 'email' ke dalam array ini
    protected $fillable = ['name', 'email', 'logo']; 
}