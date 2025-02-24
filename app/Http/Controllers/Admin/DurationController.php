<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Duration;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class DurationController extends Controller
{
    
    public function index(){
        abort_if(Gate::denies('duration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $durations=Duration::get();
        return view('durations.index', compact('durations'));
    }
    public function create(){
        abort_if(Gate::denies('duration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
            return redirect()->route('admin.durations')->with('success', 'Duration successfully created');
            
        } catch (\Throwable $e) {
            \Log::error('Duration Create Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
    public function edit(Request $req,$id){
        abort_if(Gate::denies('duration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
    abort_if(Gate::denies('duration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    try {
        $duration= Duration::findOrFail($id);
       if ($duration) {
        $duration->delete();
        return redirect()->route('admin.durations')->with('success', 'Duration Sucessfully Deleted');
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
        return redirect()->route('admin.durations')->with('success', 'Duraction Sucessfully Updated');
        }
        else{
            return redirect()->back()->with('error', 'Duration not Found ');
        }
    } catch (\Throwable $e) {
        \Log::error('Duration found Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
   }
   public function show(Request $req,$id){
    abort_if(Gate::denies('duration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $duration= Duration::findOrFail($id);
            // return $duration;
            if($duration){
                return view('durations.show',compact('duration'));
            }
            else{
                return redirect()->back()->with('error', 'Duration not Found ');
            }
        } catch (\Throwable $e) {
            \Log::error('Duration found Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
       } 

       public function updatestatus(Request $req, $id)
       {
           try {
               $duration = Duration::findOrFail($id);
       
               $duration->status = $req->input('status');  
               $duration->save();  
       
               return response()->json([
                   'message' => 'Status updated successfully',
               ],200);
           } catch (\Throwable $th) {
               return response()->json([
                   'message' => 'Duration not found or error occurred.',
               ], 404);
           }
       }
       
}
