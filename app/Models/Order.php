<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "tracking_no",
        "fullname",
        "email",
        "phone",
        "city",
        "country",
        "postcode",
        "address",
        "notes",
        "status_message",
        "payment_mode",
        "payment_id"
    ];
}
