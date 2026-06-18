<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    // Mengizinkan penyimpanan data secara massal pada kolom-kolom berikut
    protected $fillable = [
        'category_id', 
        'title', 
        'description', 
        'date', 
        'location', 
        'price', 
        'stock', 
        'poster_path'
    ];

    // Mengonversi kolom date otomatis menjadi objek Carbon / DateTime
    protected $casts = [
        'date' => 'datetime',
    ];

    /**
     * Relasi Many-to-One ke model Category 
     * (Setiap event terikat pada satu kategori induk)
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
