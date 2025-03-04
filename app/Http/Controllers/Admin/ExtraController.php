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
            $image = $req->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $data['image'] = $image->storeAs('extras', $filename, 'public');
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
        $extra = Extra::findOrFail($id);
        $data = $req->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image',
            'price' => 'required|numeric|min:0',
            'can_incremented' => 'required|boolean',
            'status' => 'required|boolean',
        ]);

        if ($req->hasFile('image')) {
            if ($extra->image) {
                Storage::delete('public/' . $extra->image);
            }
        
            $image = $req->file('image'); 
            $filename = time() . '_' . $image->getClientOriginalName();
            $data['image'] = $image->storeAs('extras', $filename, 'public'); 
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

}
