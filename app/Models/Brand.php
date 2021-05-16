<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory,Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    public function getLogoAttribute()
    {
        $image = $this->attributes['logo'];
        $image_url = asset('images/no-image.png');
        if (isset($image) && $image != '' && file_exists(public_path('uploads' . DIRECTORY_SEPARATOR . 'brand_logo_images' . DIRECTORY_SEPARATOR . $image))) {
            $image_url = asset('uploads/brand_logo_images/' . $image);
        }
        return $image_url;
    }
}
