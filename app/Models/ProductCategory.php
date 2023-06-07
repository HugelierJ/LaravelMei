<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ["name", "description", "gender_id"];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            "product_productcategory",
            "productcategory_id",
            "product_id"
        );
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
}
