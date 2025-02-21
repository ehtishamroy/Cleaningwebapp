<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'booking_date',
        'service_id',
        'duration_id',
        'review_given',
        'address',
        'payment',
        'is_follow_up',
        'is_cancelled'	
    ];
}
