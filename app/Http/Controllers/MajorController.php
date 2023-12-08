<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors=Major::paginate(5);
        return view('Major.index',compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors=Major::get();
        return view('Major.create',compact('majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        Validator::make($data,[
            'title'=>['required','string']
        ])->validate();
        Major::create($data);
        return redirect()->route('major.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        // $major=Major::get();
        $doctor=Doctor::select('name')->get();
        return view('Major.show',compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $major=Major::find($id);
        return view('Major.update',compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $major=Major::where('id',$id)->update([
            'title'=>request()->title,
        ]);
        return redirect()->route('major.index');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Major::find($id)->delete();
        return redirect()->route('major.index');
    }
}
