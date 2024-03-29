<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["billing_id", "status", "total_price", "session_id"];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot("price", "quantity", "shoesize")
            ->withTimestamps();
    }

    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }
}
