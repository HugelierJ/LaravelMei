<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

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
