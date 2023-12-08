<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    function index(){
        $doctors=Doctor::with('major')->get();
        return response()->json(['data'=>$doctors]);
    }
}
