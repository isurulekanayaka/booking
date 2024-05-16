<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;

    protected $table = 'booking_details';

    protected $fillable = [
        'user_id',
        'bus_id',
        'date',
        'seat_numbers',
        'payment_id',
        'price',
    ];

    protected $casts = [
        'seat_numbers' => 'array',
        'bus_id' => 'string',
    ];
}
