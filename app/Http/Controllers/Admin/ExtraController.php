<?php

namespace App\Http\Controllers\Admin;

use App\Models\Extra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExtraController extends Controller
{
   public function index(){
    $extras=Extra::get();
    return view('admin.extra.index',compact('extras'));
   }
   public function create(){
    return view('admin.extra.create');
   }

   public function store(Request $req)
   {
       try {
           $data = $req->validate([
               'name'            => 'required|string|max:255',
               'image'           => 'required|image', 
            //    'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
               'can_incremented' => 'required|boolean',
               'price'           => 'required|numeric|min:0',
               'status'          => 'required|boolean', 
           ]);
           // Handle image upload


           if ($req->hasFile('image')) {
            $img=$req->image;
            $ext=$img->getClientOriginalExtension();
            $imagename= time().'.'.$ext;
            $img->storeAs('extras', $imagename,'public');
            $data['image'] =$imagename ;
        }
        
   
           // Create Extra
           Extra::create($data);
   
           return redirect()->route('admin.extra')->with('success', 'Extra successfully created.');
       } catch (\Throwable $e) {
           Log::error('Extra Create Error: ' . $e->getMessage());
           return redirect()->back()->with('error', 'Something went wrong. Please try again.');
       }
   }
   public function edit(Request $req,$id){
    try {
        $extra= Extra::findOrFail($id);
        if($extra){
            return view('admin.extra.edit',compact('extra'));
        }
        else{
            return redirect()->back()->with('error', 'Extra not Found ');
        }
    } catch (\Throwable $e) {
        \Log::error('Extra found Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
public function update(Request $req, $id) {
    try {
        // Find the existing Extra record
        $extra = Extra::findOrFail($id);
    
        // Validate the incoming request data
        $data = $req->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image', // image is optional but should be a valid image type if provided
            'price' => 'required|numeric|min:0',
            'can_incremented' => 'required|boolean',
            'status' => 'required|boolean',
        ]);
    
        // Check if a new image is being uploaded
        if ($req->hasFile('image')) {
            $path = 'storage/extras/'; 
            if ($extra->image && file_exists(public_path('storage/extras/' . $extra->image))) {
                unlink(public_path('storage/extras/' . $extra->image)); 
            }
            $img = $req->image;
            $ext = $img->getClientOriginalExtension();
            $imagename = time() . '.' . $ext;
            $img->storeAs('public/extras', $imagename);
            $data['image'] = $imagename;
        } else {
            $data['image'] = $extra->image;
        }
        $extra->update($data);

        return redirect()->route('admin.extra')->with('success', 'Extra successfully updated');
    } catch (\Throwable $e) {
        \Log::error('Extra Update Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}

public function delete(Request $req,$id){
    try {
        $extra= Extra::findOrFail($id);
        if($extra){
            $extra->delete();
            return redirect()->route('admin.extra')->with('success', 'Extra successfully deleted');
        }
        else{
            return redirect()->back()->with('error', 'Extra not Found ');
        }
      
    } catch (\Throwable $e) {
        \Log::error('Payment Delete Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}
public function updatestatus(Request $req, $id)
{
    try {
        $extra = Extra::findOrFail($id);

        $extra->status = $req->input('status');  
        $extra->save();  

        return response()->json([
            'message' => 'Status updated successfully',
        ],200);
    } catch (\Throwable $th) {
        return response()->json([
            'message' => 'Extra not found or error occurred.',
        ], 404);
    }
}
}
