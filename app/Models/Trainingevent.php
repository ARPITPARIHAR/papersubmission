<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainingevent extends Model
{
    protected $fillable = ['title', 'category_id', 'pdf_file'];

    public function category()
    {
        return $this->belongsTo(Trainingevent::class, 'category_id');
    }
    public function categories()
    {
        return $this->belongsTo(Relive::class, 'category_id');
    }
}