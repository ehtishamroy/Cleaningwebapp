<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $services =Service::get();
        return view('services.index', compact('services'));
    }
    public function create(){
        return view('services.create');
    }
    public function store(Request $req)
    {
        try {
            // return $req;
            $data = $req->validate([
                'name' => 'required|string|max:255',      
                'description' => 'required|string|max:500',
                'price' => 'required|numeric|min:0', 
            ]);
            $data['status'] = $req->has('status') ? 1 : 0; 
            $service = Service::create($data);
            return redirect()->route('services')->with('success', 'Service successfully created');
        } catch (\Throwable $e) {
            \Log::error('Service Create Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
       public function delete(Request $req,$id){
    try {
        $service= Service::findOrFail($id);
        $service->delete();
        return redirect()->route('services')->with('success', 'Service Sucessfully Deleted');
    } catch (\Throwable $e) {
        \Log::error('Service Delete Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
public function edit(Request $req,$id){
    try {
        $service= Service::findOrFail($id);
        if($service){
            return view('services.edit',compact('service'));
        }
        else{
            return redirect()->back()->with('error', 'Service not Found ');
        }
    } catch (\Throwable $e) {
        \Log::error('Service found Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
   } 
   public function update(Request $req, $id)
{
    try {
        $ser = Service::findOrFail($id);
        $req->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:0', 
        ]);
        $ser->name = $req->name;
        $ser->description = $req->description; 
        $ser->price = $req->price; 
        $ser->status = $req->has('status') ? 1 : 0;
        $ser->save();
        return redirect()->route('services')->with('success', 'Service successfully updated');
    } catch (\Throwable $e) {
        \Log::error('Service Update Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}


}    