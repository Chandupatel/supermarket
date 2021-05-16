<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function getThumbnailAttribute()
    {
        $image = $this->attributes['thumbnail'];
        $image_url = asset('images/no-image.png');
        if (isset($image) && $image != '' && file_exists(public_path('uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $this->id . DIRECTORY_SEPARATOR . 'thumbnail' . DIRECTORY_SEPARATOR . $image))) {
            $image_url = asset('uploads/products/' . $this->id . '/thumbnail/' . $image);
        }
        return $image_url;
    }

    public function product_categories()
    {
        return $this->hasMany(ProductCategory::class, 'product_id');
    }
    
    public function gallery()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function tags()
    {
        return $this->hasMany(ProductTag::class, 'product_id');
    }

    
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    
}
