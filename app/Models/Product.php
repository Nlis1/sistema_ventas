<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
      public function images()
    {
        return $this->hasMany(Image::class); // un producto puede tener varias imágenes
    }
}
