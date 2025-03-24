<?php

namespace App\Http\Controllers\Admin;
use Gate;
use Carbon\Carbon;
use App\Models\Extra;
use App\Models\Booking;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Duration;
use App\Models\BookingExtra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
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
        $extras=Extra::where('status',1)->get();
        $customers=Customer::get();
        $durations=Duration::get();
        return view('admin.bookings.create',compact('services','customers','durations','extras'));
    }
    public function store(Request $req){
        try {
            // foreach ($req->extra_quantities as $key => $value) {
            //     if($value > 0){
            //         echo $key;
            //         echo '  '.$value."<br>";
            //     }
            // }
            // return ;

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

             if ($req->extra_quantities) {
                $booking_id=$booking->id;
                foreach ($req->extra_quantities as $key => $value) {
                    if($value > 0){
                        try {
                            $price = Extra::where('id', $key)->value('price') ?? 0;
                           
                            BookingExtra::create([
                                'booking_id' =>  $booking_id, 
                                'extra_id' => $key,
                                'count' => $value,
                                'price' => $price,
                            ]);
                
                        } catch (\Exception $e) {
                            \Log::error('Error inserting into BookingExtra: ' . $e->getMessage());
                            dd('Error:', $e->getMessage()); // Show error message on screen
                        }
                    }
                }
            }

             return redirect()->route('admin.bookings')->with('success', 'Booking successfully created');
        }catch (\Throwable $e) {
            \Log::error('Booking Create Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function edit(Request $req,$id){
        abort_if(Gate::denies('booking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $booking= Booking::with('extras')->findOrFail($id);
            // return $booking;
            if($booking){
                $services=Service::where('status',1)->get();
                $allExtras = Extra::all();
                $customers=Customer::get();
                $durations=Duration::get();
                return view('admin.bookings.edit',compact('booking','services','customers','durations','allExtras'));
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
            if ($ser) {
                if ($req->extra_quantities) {
                    $bookingExtras = BookingExtra::where('booking_id', $ser->id)->get();       
                    $existingExtrasArray = [];
            
                    // Store existing extras in an associative array (key: ID, value: extra_id)
                    foreach ($bookingExtras as $extra) {
                        $existingExtrasArray[$extra->id] = $extra->extra_id;
                    }
            
                    // Filter extras where quantity is greater than 0
                    $filteredExtraQuantities = array_filter($req->extra_quantities, function ($qty) {
                        return $qty > 0;
                    });
            
                    // Extract valid extra IDs from request
                    $requestedExtraIds = array_map('intval', array_keys($filteredExtraQuantities));
            
                    // Check existing extras against requested extras
                    foreach ($existingExtrasArray as $extraDbId => $extra_id) {
                        if (!in_array($extra_id, $requestedExtraIds)) {
                                       
                            BookingExtra::where('id', $extraDbId)->delete();
                        } 
                    }
            
                    foreach ($req->extra_quantities as $extraId => $quantity) {
                        if ($quantity > 0) {
                            $price = Extra::where('id', $extraId)->value('price');
                            $existingExtra = $bookingExtras->firstWhere('extra_id', $extraId);
            
                            if ($existingExtra) {
                                $existingExtra->update([
                                    'count' => $quantity,
                                    'price' => $price,
                                ]);
                            } else {
                                BookingExtra::create([
                                    'booking_id' => $ser->id,
                                    'extra_id'   => $extraId,
                                    'count'      => $quantity,
                                    'price'      => $price,
                                ]);
                            }
                        }
                    }
                }
            }
            
            
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
        abort_if(Gate::denies('booking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $booking = Booking::with(['service', 'duration', 'customer','extras.extra'])->find($id);

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
        try {

            $time = Carbon::createFromFormat('h:i A', $req->time)->format('H:i');
    
            $validator = Validator::make($req->all(), [
                "service" => 'required|exists:services,id',
                "frequency" => 'required|exists:durations,id',
                "bedrooms" => 'required|integer',
                "bathrooms" => 'required|integer',
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
    
            $name = $req->first_name . ' ' . $req->last_name;
            $customer = Customer::firstOrCreate(
                ['email' => $req->email],
                ['name' => $name, 'phone' => $req->phone, 'address' => $req->address, 'apt_no' => $req->apt_no]
            );
    
            $extrastotal = 0;
            if ($req->filled('extras')) {
                foreach ($req->extras as $extra) {
                    $price = Extra::where('id', $extra)->value('price') ?? 0;
                    $quantity = $req->extra_quantities[$extra] ?? 1;
                    $extrastotal += $price * $quantity;
                }
            }
    
            $servicePrice = Service::where('id', $req->service)->value('price') ?? 0;
            $total = $servicePrice + $extrastotal;
    
            $booking = Booking::create([
                'customer_id' => $customer->id,
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
                'instructions_home_access' => $req->notes ?? '',
                'hide_keys' => $req->key_hidden,
                'sms_reminder' => $req->sms_reminder,
                'time' => $time,
            ]);


            try {
                if ($req->filled('extras')) {
                    $booking_id=$booking->id;
                   foreach ($req->extras as $extra) {
                    try {
                        $price = Extra::where('id', $extra)->value('price') ?? 0;
                        $quantity = $req->extra_quantities[$extra] ?? 1;
                        BookingExtra::create([
                            'booking_id' =>  $booking_id, // Replace with a valid booking ID
                            'extra_id' => $extra,
                            'count' => $quantity,
                            'price' => $price,
                        ]);
            
                    } catch (\Exception $e) {
                        \Log::error('Error inserting into BookingExtra: ' . $e->getMessage());
                        dd('Error:', $e->getMessage()); // Show error message on screen
                    }
                }
                }
            } catch (\Exception $e) {
                \Log::error('Error adding extras: ' . $e->getMessage());
                return redirect()->back()->with('error', 'An error occurred while adding extras. Please try again.');
            }
    
            return redirect()->back()->with('success', 'Booking successfully created');
        } catch (\Exception $e) {
            \Log::error('Error in booking process: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while processing the booking. Please try again.');
        }
    }
    
  
}
