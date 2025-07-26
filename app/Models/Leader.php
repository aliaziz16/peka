<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Leader extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'period',
        'description',
        'photo',
    ];

    // Auto-generate slug from name
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($leader) {
            if (empty($leader->slug)) {
                $leader->slug = Str::slug($leader->name);
            }
        });
        
        static::updating(function ($leader) {
            if ($leader->isDirty('name') && empty($leader->slug)) {
                $leader->slug = Str::slug($leader->name);
            }
        });
    }
}
