<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
}
