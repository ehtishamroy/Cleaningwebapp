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
        $bookings = Booking::with(['service', 'duration', 'customer'])->get();
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
            // return $req;
            $data = $req->validate([ 
                'customer_id' => 'required',
                 'service_id' => 'required', 
                 'duration_id' => 'required',
                 'booking_date' => 'required',
                 'address' => 'required',
                 'payment' => 'required',
                 'is_waiting'=> 'required|boolean',
                 'someone_at_home'=> 'required|boolean',
                 'bedrooms'=> 'required',
                 'bathrooms'=> 'required',
                 'instructions_home_access'=> 'required',
                'hide_keys'=> 'required|boolean',
                'review_given'=> 'required|boolean',
                'is_follow_up'=> 'required|boolean',
                'is_cancelled'=> 'required|boolean',
             ]);
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

    public function booking(Request $req){
        $req->validate([ 
            "service" => 'required',
            "frequency" => 'required',
            "bedrooms" => 'required',
            "bathrooms" => 'required',
            "square_feet" => 'required',
            "date" => 'required|date', 
            "time" => 'required',
            "first_name" => 'required|string',
            "last_name" => 'required|string',
            "email" => 'required|email',
            "phone" => 'required|string', 
            "sms_reminder" => 'required|boolean',
            "address" => 'required|string',
            "apt_no" => 'required|string',
            "someone_at_home" => 'required|boolean',
            "key_hidden" => 'required|boolean',
            "notes" => 'required|string',  
        ]);
            $name = $req->first_name . ' ' . $req->last_name;
            $customer = Customer::where('email', $req->email)->first();
            if ($customer) {
                $customerId = $customer->id;
            } else {
                $customer = Customer::create([
                    'name' => $name,
                    'email' => $req->email,
                    'phone' => $req->phone,
                    'address' => $req->address
                ]);
                $customerId = $customer->id;
            }
            $payment = Service::where('id', $req->service)->value('price');
        $booking = Booking::create([
            'customer_id'=>$customerId,
            'booking_date'=>$req->date,
            'service_id'=>$req->service,
            'duration_id'=>$req->frequency,
            'review_given'=>0,
            'address'=>$req->address,
            'payment'=>$payment,
            'is_follow_up'=>0,
            'is_cancelled'=>0,
            'is_waiting'=>0,
            'someone_at_home'=>$req->someone_at_home,
            'bedrooms'=>$req->bedrooms,
            'bathrooms'=>$req->bathrooms,
            'instructions_home_access'=>$req->notes,
           'hide_keys'=>$req->key_hidden,
        ]);
        if($booking){
            return redirect()->back()->with('success', 'Booking successfully created');
        }
        else{
            return redirect()->back()->with('error', 'Error ' );
        }
    }
}
