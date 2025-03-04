<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class PaymentController extends Controller
{
   public function index(){
    abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    $payments =Payment::with('booking')->get();
    return view('admin.payments.index',compact('payments'));
   }
   public function create(){
    abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
        return redirect()->route('admin.payments')->with('success', 'Payment successfully created');
    } catch (\Throwable $e) {
        \Log::error('Payment Create Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
   }
   public function edit(Request $req,$id){
    abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    try {
        $payment= Payment::findOrFail($id);
        if($payment){
            $bookings=Booking::get();
            return view('admin.payments.edit',compact('bookings','payment'));
        }
        else{
            return redirect()->back()->with('error', 'Payment not Found ');
        }
    } catch (\Throwable $e) {
        \Log::error('Payment found Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
public function update(Request $req,$id){
    try {
        $payment= Payment::findOrFail($id);
        if($payment){
        $data = $req->validate([ 
            'booking_id' => 'required',
            'payment' => 'required|numeric', 
            'status' => 'required',
        ]);
        $payment->update($data);
        return redirect()->route('admin.payments')->with('success', 'Payment successfully updated');
    }
    else{
        return redirect()->back()->with('error', 'Payment not Found ');
    }
    } catch (\Throwable $e) {
        \Log::error('Payment update Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
public function delete(Request $req,$id){
    abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    try {
        $payment= Payment::findOrFail($id);
        if($payment){
            $payment->delete();
            return redirect()->route('admin.payments')->with('success', 'Payment successfully deleted');
        }
        else{
            return redirect()->back()->with('error', 'Payment not Found ');
        }
      
    } catch (\Throwable $e) {
        \Log::error('Payment Delete Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}

public function show(Request $req,$id){
    abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    try {
        $payment= Payment::with('booking')->find($id);
      
        if($payment){
            return view('admin.payments.show',compact('payment'));
        }
        else{
            return redirect()->back()->with('error', 'Payment not Found ');
        }
    } catch (\Throwable $e) {
        \Log::error('Payment found Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
}
