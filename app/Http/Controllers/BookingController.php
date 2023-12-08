<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings=User::paginate(5);
        return view('Booking.index',compact('bookings'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors=Doctor::get();
        return view('Booking.create',compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        Validator::make($data,[
            'name'=>['required','string','min:5','max:50'],
            'email'=>['required','email','unique:doctors,email'],
            'phone'=>['required'],
            'doctor_id'=>['required','string'],
        ])->validate();
        Booking::create($data);
        // dd($data['image']);

        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking=Booking::find($id);
        $doctors=Doctor::get();
        return view('Booking.update',compact('booking','doctors'));    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking=Booking::where('id',$id)->update([
            'name'=>request()->name,
            'email'=>request()->email,
            'phone'=>request()->phone,
            'doctor_id'=>request()->doctor_id,
        ]);
        return redirect()->route('booking.index');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking=Booking::Find($id);
        $booking->delete();
        return redirect()->route('booking.index');    }
}
