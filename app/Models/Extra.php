<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'image',
        'can_incremented',
        'price',
        'status'
    ];
    

}
