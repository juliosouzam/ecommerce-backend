<?php

namespace App\Models;

class Product extends Model
{
     /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class);
    }
}
