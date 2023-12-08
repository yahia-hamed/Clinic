<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors=Doctor::paginate(5);
        return view('Doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $majors=Major::get();
    return view('Doctor.create',compact('majors'));
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
            'password'=>['required','string','min:8','max:12'],
            'image'=>['required','image'],
            'major_id'=>['required','string'],
        ])->validate();
        $data['password']=Hash::make($request->password);
        $path=$request->file('image')->store('public');
        $path=str_replace('public','storage',$path);
        $data['image']=$path;
        Doctor::create($data);
        // dd($data['image']);

        return redirect()->route('doctor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( Doctor $doctor)
    {
        // dd($path);
        return view('Doctor.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor=Doctor::find($id);
        $majors=Major::get();
        return view('Doctor.update',compact('doctor','majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $doctor=Doctor::where('id',$id)->update([
            'name'=>request()->name,
            'email'=>request()->email,
            'password'=>request()->password,
            'phone'=>request()->phone,
            'city'=>request()->city,
            'major_id'=>request()->major_id,
        ]);
        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor=Doctor::Find($id);
        $doctor->delete();
        return redirect()->route('doctor.index');
    }
}
