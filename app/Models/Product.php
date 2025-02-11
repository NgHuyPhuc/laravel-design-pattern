<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "slug",
        "code",
        "info",
        "describer",
        "image",
        "price",
        "featured",
        "state",
        "categories_id",
    ];
    public function category(){
        return $this->belongsto(Category::class ,"categories_id","id");
    }
    
}
