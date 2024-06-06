<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id','id');
    }

    public function galleryImage(){
        return $this->hasMany(GalleryImage::class,'product_id','id');
    }

    public function color(){
        return $this->hasMany(ProductColor::class,'product_id','id');
    }

    public function size(){
        return $this->hasMany(ProductSize::class,'product_id','id');
    }

    public function cart(){
        return $this->hasMany(Cart::class,'product_id','id');
    }
}

