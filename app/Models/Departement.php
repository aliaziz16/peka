<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'program_work',
        'image',
    ];

    // Auto-generate slug from name
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($departement) {
            if (empty($departement->slug)) {
                $departement->slug = Str::slug($departement->name);
            }
        });
        
        static::updating(function ($departement) {
            if ($departement->isDirty('name') && empty($departement->slug)) {
                $departement->slug = Str::slug($departement->name);
            }
        });
    }
}
