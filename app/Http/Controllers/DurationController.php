<?php

namespace App\Http\Controllers;

use App\Models\Duration;
use Illuminate\Http\Request;

class DurationController extends Controller
{
    
    public function index(){
        $durations=Duration::get();
        return view('durations.index', compact('durations'));
    }
    public function create(){
        return  view('durations.create');
    }    
    public function store(Request $req)
    {
        try {
            $data = $req->validate([
                'name' => 'required|string|max:255',
            ]);
            $data['status'] = $req->has('status') ? 1 : 0;
            $duration = Duration::create($data); 
            return redirect()->route('durations')->with('success', 'Duration successfully created');
            
        } catch (\Throwable $e) {
            \Log::error('Duration Create Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
    public function edit(Request $req,$id){
            try {
                $duration= Duration::findOrFail($id);
                if($duration){
                    return view('durations.edit',compact('duration'));
                }
                else{
                    return redirect()->back()->with('error', 'Duration not Found ');
                }
            } catch (\Throwable $e) {
                \Log::error('Duration found Error: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
            }
           }   
   public function delete(Request $req,$id){
    try {
        $duration= Duration::findOrFail($id);
       if ($duration) {
        $duration->delete();
        return redirect()->route('durations')->with('success', 'Duration Sucessfully Deleted');
       }
       else{
        return redirect()->back()->with('error', 'Duration not Found ');
       }
    } catch (\Throwable $e) {
        \Log::error('Service Delete Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
   }
//   
   public function update(Request $req,$id){
    try {
        $duration= Duration::findOrFail($id);
        if($duration){

           $req->validate([
            'name' => 'required|string|max:255',]);
    
        $duration->name=$req->name;
        $duration->status = $req->has('status') ? 1 : 0;
        $duration->save();
        return redirect()->route('durations')->with('success', 'Duraction Sucessfully Updated');
        }
        else{
            return redirect()->back()->with('error', 'Duration not Found ');
        }
    } catch (\Throwable $e) {
        \Log::error('Duration found Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
   }

}
