<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingExtra extends Model
{
    protected $fillable = ['booking_id', 'extra_id', 'count', 'price'];
    use HasFactory;
    public function extra()
{
    return $this->belongsTo(Extra::class, 'extra_id');
}

}
