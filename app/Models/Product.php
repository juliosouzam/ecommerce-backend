<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'slug',
        'price',
        'quantity'
    ];

    protected $with = ['images'];
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

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
