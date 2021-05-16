<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory, Sluggable;

    //protected $with = ['subcategory'];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function subcategory()
    {
        return $this->hasMany('App\Models\Categories', 'parent_id');
    }
    public function getImageAttribute()
    {
        $image = $this->attributes['image'];
        
        $image_url = asset('images/no-image.png');
        if (isset($image) && $image != '' && file_exists(public_path('uploads' . DIRECTORY_SEPARATOR . 'categories_images' . DIRECTORY_SEPARATOR . $image))) {
            $image_url = asset('uploads/categories_images/' . $image);
        }
        return $image_url;
    }
}
