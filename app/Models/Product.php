<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "photo_id",
        "brand_id",
        "gender_id",
        "color_id",
        "name",
        "slug",
        "body",
        "price",
        "stock",
    ];
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class)
            ->withPivot("price", "shoesize", "quantity")
            ->withTimestamps();
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function productcategories()
    {
        return $this->belongsToMany(
            ProductCategory::class,
            "product_productcategory",
            "product_id",
            "productcategory_id"
        );
    }
}
