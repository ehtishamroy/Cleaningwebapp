<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Duration;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class BookingController extends Controller
{
    public function index(){
        abort_if(Gate::denies('booking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $bookings = Booking::get();
        return view('admin.bookings.index',compact('bookings'));
    }
    public function create(){
        abort_if(Gate::denies('booking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
             return redirect()->route('admin.bookings')->with('success', 'Booking successfully created');
        }catch (\Throwable $e) {
            \Log::error('Booking Create Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function edit(Request $req,$id){
        abort_if(Gate::denies('booking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        
            return redirect()->route('admin.bookings')->with('success', 'Booking successfully updated');
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
        abort_if(Gate::denies('booking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $booking= Booking::findOrFail($id);
            if($booking){
                $booking->delete();
                return redirect()->route('admin.bookings')->with('success', 'Booking Sucessfully Deleted');
            }
            else{
                return redirect()->back()->with('error', 'Booking not Found ');
            }
          
        } catch (\Throwable $e) {
            \Log::error('Booking Delete Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function show(Request $req,$id){
        // $booking= Booking::findOrFail($id);
        // $booking = Booking::with(['service', 'duration', 'customer'])->find($id);
        // return $booking;
        abort_if(Gate::denies('booking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $booking = Booking::with(['service', 'duration', 'customer'])->find($id);
            if($booking){
                return view('admin.bookings.show',compact('booking'));
            }
            else{
                return redirect()->back()->with('error', 'Booking not Found ');
            }
        } catch (\Throwable $e) {
            \Log::error('Booking found Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

    }

}
