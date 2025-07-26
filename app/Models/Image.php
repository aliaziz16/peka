<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'filename',
        'path',
        'alt_text',
        'category',
        'is_active',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
