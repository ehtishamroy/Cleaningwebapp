<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers=Customer::get();
        return view('admin.customers.index',compact('customers'));
    }
    public function create(){
        return view('admin.customers.create');
    }
    public function store(Request $req)
    {
        try {
            $data = $req->validate([ 
                'email' => 'required|email|max:255|unique:customers,email',
                'phone' => 'required|string|max:15', 
                'address' => 'required|string|max:255',
            ]);
    
            $customer = Customer::create($data);
            return redirect()->route('customers')->with('success', 'Customer successfully created');
        } catch (\Throwable $e) {
            \Log::error('Customer Create Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function edit(Request $req,$id){
        try {
            $customer= Customer::findOrFail($id);
            if($customer){
                return view('admin.customers.edit',compact('customer'));
            }
            else{
                return redirect()->back()->with('error', 'Customer not Found ');
            }
        } catch (\Throwable $e) {
            \Log::error('Customer found Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    } 
    public function update(Request $req, $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            if($customer){

            $data = $req->validate([ 
               'email' => 'required|email|max:255|unique:customers,email,' . $id,
                'phone' => 'required|string|max:15', 
                'address' => 'required|string|max:255',
            ]);
            $customer->email = $req->email;
            $customer->phone = $req->phone; 
            $customer->address = $req->address;
            $customer->save();
            return redirect()->route('customers')->with('success', 'Customer successfully updated');}
            else{
                return redirect()->back()->with('error', 'Customer not Found ');
            }
        } catch (\Throwable $e) {
            \Log::error('Customer Update Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function delete(Request $req,$id)
    {
        try {
            $Customer= Customer::findOrFail($id);
            if($Customer){
            $Customer->delete();
            return redirect()->route('customers')->with('success', 'Customer successfully updated');}
            else{
                return redirect()->back()->with('error', 'Customer not Found ');
            }
        } catch (\Throwable $e) {
            \Log::error('Service Delete Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
