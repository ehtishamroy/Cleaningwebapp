<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Frontendcontroller extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function kitclean()
    {
        return view('frontend.kitchenservice');
    }
    public function bedclean()
    {
        return view('frontend.bedroomservice');
    }   
    public function book()
    {
        return view('frontend.bookingform');
    }   
   

    
}

