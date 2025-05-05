<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Page extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($page) {
            $page->slug = Str::slug($page->name);
        });

        static::updating(function ($page) {
        });
    }

    // Parent relationship - a page belongs to another page (its parent)
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    // Children relationship - a page can have many child pages (subcategories)
    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }
}
