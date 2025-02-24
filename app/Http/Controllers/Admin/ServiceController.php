<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Service;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    public function index(){

        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services =Service::get();
        return view('services.index', compact('services'));
    }
    public function create(){
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('services.create');
    }
    public function store(Request $req)
    {
        try {
            $data = $req->validate([
                'name' => 'required|string|max:255',      
                'description' => 'required|string|max:500',
                'price' => 'required|numeric|min:0', 
            ]);
            $data['status'] = $req->has('status') ? 1 : 0; 
            $service = Service::create($data);
            return redirect()->route('admin.services')->with('success', 'Service successfully created');
        } catch (\Throwable $e) {
            \Log::error('Service Create Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
public function delete(Request $req,$id){
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    try {
        $service= Service::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.services')->with('success', 'Service Sucessfully Deleted');
    } catch (\Throwable $e) {
        \Log::error('Service Delete Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
public function edit(Request $req,$id){
    abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
   
    try 
        {
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
        return redirect()->route('admin.services')->with('success', 'Service successfully updated');
    } catch (\Throwable $e) {
        \Log::error('Service Update Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
public function show(Request $req,$id){
    abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    try 
    {
        $service= Service::findOrFail($id);
        
        if($service){
            return view('services.show',compact('service'));
        }
        else{
            return redirect()->back()->with('error', 'Service not Found ');
        }
    } catch (\Throwable $e) {
        \Log::error('Service found Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
public function updatestatus(Request $req, $id)
{
    try {
        $service = Service::findOrFail($id);

        $service->status = $req->input('status');  
        $service->save();  

        return response()->json([
            'message' => 'Status updated successfully',
        ]);
    } catch (\Throwable $th) {
        return response()->json([
            'message' => 'Service not found or error occurred.',
        ], 404);
    }
}

}    