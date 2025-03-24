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
        'is_cancelled'	,
        'is_waiting',
        'someone_at_home',
        'bedrooms',
        'bathrooms',
        'instructions_home_access',
       'hide_keys',
      
       'sms_reminder',
       'time',
        
    ];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function extras()
    {
     return $this->hasMany(BookingExtra::class, 'booking_id');
    }

}
