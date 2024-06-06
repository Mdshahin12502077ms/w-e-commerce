<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Subcategory extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Category(){
            return $this->belongsTo(Category::class,'category_id','id');
          }
          public function product(){
            return $this->hasMany(Product::class, 'subcategory_id','id');
        }
}
