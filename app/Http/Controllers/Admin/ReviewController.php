<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Review;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Gate;
use Symfony\Component\HttpFoundation\Response;
class ReviewController extends Controller
{
    public function index(){
        abort_if(Gate::denies('review_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $reviews= Review::get();
        return view('admin.reviews.index',compact('reviews'));
    }
    public function create(){
        abort_if(Gate::denies('review_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $bookings=Booking::get();
        $customers=Customer::get();
        return view('admin.reviews.create',compact('bookings','customers'));
    }
    public function store(Request $req){
        // return $req;
        try {
            $data = $req->validate([ 
                'booking_id' => 'required',
                'customer_id' => 'required',
                'review' => 'required',
                'rating' => 'required|numeric', 
            ]);
            $data['status'] = $req->has('status') ? 1 : 0; 
            $review = Review::create($data);
            return redirect()->route('admin.reviews')->with('success', 'Review successfully created');
        } catch (\Throwable $e) {
            \Log::error('Review Create Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function edit(Request $req,$id){
        abort_if(Gate::denies('review_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $review= Review::findOrFail($id);
            $bookings=Booking::get();
            if($review){
                $customers=Customer::get();
                return view('admin.reviews.edit',compact('bookings','review','customers'));
            }
            else{
                return redirect()->back()->with('error', 'Review not Found ');
            }
        } catch (\Throwable $e) {
            \Log::error('Review found Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function update(Request $req,$id){
        try {
            $review= Review::findOrFail($id);
            if($review){
                $data = $req->validate([ 
                    'booking_id' => 'required',
                    'customer_id' => 'required',
                    'review' => 'required',
                    'rating' => 'required|numeric', 
                ]);
                $data['status'] = $req->has('status') ? 1 : 0; 
                $review->update($data);
                return redirect()->route('admin.reviews')->with('success', 'Review successfully updated');
            }
            else{
                return redirect()->back()->with('error', 'Review not Found ');
            }
        } catch (\Throwable $e) {
            \Log::error('Review found Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function delete(Request $req,$id){
        abort_if(Gate::denies('review_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $review= Review::findOrFail($id);
            if($review){
                $review->delete();
                return redirect()->route('admin.reviews')->with('success', 'Review successfully deleted');
            }
            else{
                return redirect()->back()->with('error', 'Review not Found ');
            }
          
        } catch (\Throwable $e) {
            \Log::error('Review Delete Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function show(Request $req,$id){
        abort_if(Gate::denies('review_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        try {
            $review= Review::with(['booking', 'customer'])->find($id);
            // return $review;
            if($review){
                return view('admin.reviews.show',compact('review'));
            }
            else{
                return redirect()->back()->with('error', 'Review not Found ');
            }
        } catch (\Throwable $e) {
            \Log::error('Review found Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function updatestatus(Request $req, $id)
    {
        try {
            $review = Review::findOrFail($id);
    
            $review->status = $req->input('status');  
            $review->save();  
    
            return response()->json([
                'message' => 'Status updated successfully',
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Review not found or error occurred.',
            ], 404);
        }
    }
}
