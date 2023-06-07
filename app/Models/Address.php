<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "home_address",
        "secondary_address",
        "city",
        "state",
        "zip_code",
        "type",
        "is_billing_address",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
