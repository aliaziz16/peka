<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'author',
    ];

    public $timestamps = true; // created_at untuk menampilkan quote terbaru
}
