<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    public function comment()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at','DESC');
    }
    public function owner()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function getTakeImageAttribute()
    {
        return "storage/" . $this->gambar;
    }
}