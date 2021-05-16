<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;


    public function getNameAttribute()
    {
        $image = $this->attributes['name'];
        $image_url = asset('images/no-image.png');
        if (isset($image) && $image != '' && file_exists(public_path('uploads' . DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR . $this->product_id . DIRECTORY_SEPARATOR . 'gallery' . DIRECTORY_SEPARATOR . $image))) {
            $image_url = asset('uploads/products/' . $this->product_id . '/gallery/' . $image);
        }
        return $image_url;
    }
}
