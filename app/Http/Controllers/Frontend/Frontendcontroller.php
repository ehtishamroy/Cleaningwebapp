<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Extra;
use App\Models\Review;
use App\Models\Service;
use App\Models\Duration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Frontendcontroller extends Controller
{
    public function index(Request $request)
    {
        $query = Review::with(['customer:id,name'])->where('status', 1);
        if ($request->has('rating') && in_array($request->rating, [1, 2, 3, 4, 5])) {
            $query->where('rating', $request->rating);
        }

$reviews = $query->orderBy('created_at', 'desc')->get();
        return view('frontend.home',compact('reviews'));
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
        $extras=Extra::where('status',1)->get();
        $services=Service::where('status',1)->get();
        $frequencys =Duration::where('status',1)->get();
        // return $extra;
        return view('frontend.bookingform',compact('services','frequencys','extras'));
    }   
    public function term(){
        return view('Frontend.term');
    }    
    public function privacy(){
        return view('Frontend.privacy');
    }
    public function review(Request $request){
        $query = Review::with(['customer:id,name'])->where('status', 1);
        if ($request->has('rating') && in_array($request->rating, [1, 2, 3, 4, 5])) {
            $query->where('rating', $request->rating);
        }

$reviews = $query->orderBy('created_at', 'desc')->get();
        return view('Frontend.review',compact('reviews'));
    }
    
}

