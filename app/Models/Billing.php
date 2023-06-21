<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
        "billing_name",
        "billing_address",
        "billing_state",
        "billing_city",
        "billing_zip_code",
        "billing_phone_number",
        "billing_email",
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
