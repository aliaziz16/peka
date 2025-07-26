<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    // Relasi ke Post (1 kategori punya banyak post)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
