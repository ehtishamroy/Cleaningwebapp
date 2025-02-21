<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Duration;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $bookings = Booking::get();
        return view('admin.bookings.index',compact('bookings'));
    }
    public function create(){
        $services=Service::get();
        $customers=Customer::get();
        $durations=Duration::get();
        return view('admin.bookings.create',compact('services','customers','durations'));
    }
    public function store(Request $req){
        try {
            $data = $req->validate([ 
                'customer_id' => 'required',
                 'service_id' => 'required', 
                 'duration_id' => 'required',
                 'booking_date' => 'required',
                 'address' => 'required',
                 'payment' => 'required',
             ]);
             $data['review_given'] = $req->has('review_given') ? 1 : 0; 
             $data['is_follow_up'] = $req->has('is_follow_up') ? 1 : 0; 
             $data['is_cancelled'] = $req->has('is_cancelled') ? 1 : 0; 
             $booking = Booking::create($data);
             return redirect()->route('bookings')->with('success', 'Booking successfully created');
        }catch (\Throwable $e) {
            \Log::error('Booking Create Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function edit(Request $req,$id){
        try {
            $booking= Booking::findOrFail($id);
            if($booking){
                $services=Service::get();
                $customers=Customer::get();
                $durations=Duration::get();
                return view('admin.bookings.edit',compact('booking','services','customers','durations'));
            }
            else{
                return redirect()->back()->with('error', 'Booking not Found ');
            }
        } catch (\Throwable $e) {
            \Log::error('Booking found Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function update(Request $req,$id) {
        try {
            $ser = Booking::findOrFail($id); 
        if ($ser) {
          
            $data = $req->validate([
                'customer_id' => 'required',
                'service_id' => 'required',
                'duration_id' => 'required',
                'booking_date' => 'required|date',  
                'address' => 'required',
                'payment' => 'required|numeric',  
            ]);
            $data['review_given'] = $req->has('review_given') ? 1 : 0;
            $data['is_follow_up'] = $req->has('is_follow_up') ? 1 : 0;
            $data['is_cancelled'] = $req->has('is_cancelled') ? 1 : 0;
            $ser->update($data);
        
            return redirect()->route('bookings')->with('success', 'Booking successfully updated');
        }
        else{
            return redirect()->back()->with('error', 'Booking not Found ');
        }
        } catch (\Throwable $e) {
            \Log::error('Booking Update Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
        
    }
    public function delete(Request $req,$id){
        try {
            $booking= Booking::findOrFail($id);
            if($booking){
                $booking->delete();
                return redirect()->route('services')->with('success', 'Booking Sucessfully Deleted');
            }
            else{
                return redirect()->back()->with('error', 'Booking not Found ');
            }
          
        } catch (\Throwable $e) {
            \Log::error('Booking Delete Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

}
