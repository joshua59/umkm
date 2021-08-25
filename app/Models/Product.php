<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'merchant_id', 'nama', 'slug', 'jenis', 'harga', 'gambar'
    ];
    public function getTakeImageAttribute()
    {
        return "storage/" . $this->gambar;
    }
}