<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Management extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($management) {
            $management->slug = Str::slug($management->name . ' ' . $management->designation);
        });

        static::updating(function ($management) {
        });
    }
}