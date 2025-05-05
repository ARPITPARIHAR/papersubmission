<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Boarddirectory extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($team) {
            $team->slug = Str::slug($team->name . ' ' . $team->designation);
        });

        static::updating(function ($team) {
            if ($team->slug == NULL) {
                $team->slug = Str::slug($team->name . ' ' . $team->designation);
            }
        });
    }
}
