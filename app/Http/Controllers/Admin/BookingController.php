<?php

namespace App\Http\Controllers\Admin;
use Gate;
use Carbon\Carbon;
use App\Models\Extra;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Duration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $services=Service::where('status',1)->get();
        $customers=Customer::get();
        $durations=Duration::get();
        return view('admin.bookings.create',compact('services','customers','durations'));
    }
    public function store(Request $req){
        try {
            $time = Carbon::createFromFormat('h:i A', $req->time)->format('H:i');
            $validator = \Validator::make($req->all(),[ 
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
                //  'instructions_home_access'=> 'required',
                'hide_keys'=> 'required|boolean',
                'review_given'=> 'required|boolean',
                'is_follow_up'=> 'required|boolean',
                'is_cancelled'=> 'required|boolean',
                "sms_reminder" => 'required|boolean',
                "time" => 'required',
             ]);
             if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $req->all();
             $data['time']=$time;

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
                $services=Service::where('status',1)->get();
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
            $data['sms_reminder']=$req->sms_reminder;
            if($req->instructions_home_access){
            $data['instructions_home_access']=$req->instructions_home_access;}
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

    public function booking(Request $req) {


        $time = Carbon::createFromFormat('h:i A', $req->time)->format('H:i');
        $validator = \Validator::make($req->all(), [
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
            
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // If validation passes, proceed with the logic
        $name = $req->first_name . ' ' . $req->last_name;
    
        // Check if customer already exists by email
        $customer = Customer::where('email', $req->email)->first();
    
        if ($customer) {
            $customerId = $customer->id;
        } else {
            // Create a new customer if one does not exist
            try {
                $customer = Customer::create([
                    'name' => $name,
                    'email' => $req->email,
                    'phone' => $req->phone,
                    'address' => $req->address,
                    'apt_no' => $req->apt_no,
                ]);
                $customerId = $customer->id;
            } catch (\Exception $e) {
                \Log::error('Error creating customer: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error creating customer.');
            }
        }
        $extrastotal=0; 
        if($req->extras){
        $extras= $req->extras;
        foreach ($extras as $extra) {
            $price = Extra::where('id', $extra)->value('price');
            $extrastotal +=$price; 
        }
        }
        $payment = Service::where('id', $req->service)->value('price');
        $total=$payment+$extrastotal;
    
        // Create the booking
        try {
            $booking = Booking::create([
                'customer_id' => $customerId,
                'booking_date' => $req->date,
                'service_id' => $req->service,
                'duration_id' => $req->frequency,
                'review_given' => 0,
                'address' => $req->address,
                'payment' => $total,
                'is_follow_up' => 0,
                'is_cancelled' => 0,
                'is_waiting' => 0,
                'someone_at_home' => $req->someone_at_home,
                'bedrooms' => $req->bedrooms,
                'bathrooms' => $req->bathrooms,
                'instructions_home_access' => $req->notes,
                'hide_keys' => $req->key_hidden,
                'sms_reminder' => $req->sms_reminder,
                'time' => $time,
            ]);
            return redirect()->back()->with('success', 'Booking successfully created');
        } catch (\Exception $e) {
            \Log::error('Error creating booking: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error creating booking.');
        }
    }
    
}
