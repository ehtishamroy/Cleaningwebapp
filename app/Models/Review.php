<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'customer_id',
        'review',
        'rating',
        'status',
        'review_description',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }    
    public function booking()
    {
        return $this->belongsTo(booking::class);
    }
}
