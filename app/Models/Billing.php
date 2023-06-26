<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "address",
        "state",
        "city",
        "zip_code",
        "phone_number",
        "email",
    ];

    public function order()
    {
        return $this->HasOne(Order::class);
    }
}
