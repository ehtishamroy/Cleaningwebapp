<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   public function index(){
    $payments =Payment::get();
    return view('admin.payments.index',compact('payments'));
   }
   public function create(){
    $bookings=Booking::get();
    return view('admin.payments.create',compact('bookings'));
   }

   public function store(Request $req){
    try {
        $data = $req->validate([ 
            'booking_id' => 'required',
            'payment' => 'required|numeric', 
            'status' => 'required',
        ]);
        $payment = Payment::create($data);
        return redirect()->route('payments')->with('success', 'Payment successfully created');
    } catch (\Throwable $e) {
        \Log::error('Payment Create Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
   }
}
