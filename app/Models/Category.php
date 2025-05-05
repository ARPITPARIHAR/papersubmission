<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories()
    {
        return $this->hasMany(\App\Models\SubCategory::class); // Ensure the namespace is correct
    }
}
