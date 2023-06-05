<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ["status", "total_price", "session_id"];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }
}
