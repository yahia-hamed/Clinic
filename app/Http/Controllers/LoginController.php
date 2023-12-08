<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    function validatelogin($data){
        Validator::make($data,[
            'email'=>'required|email',
            'password'=>'required|min:5|max:20',
        ])->validate();
    }
    function login(Request $request){
        $this->validatelogin($request->all());
        if (Auth::guard('doctor')->attempt(['email' =>$request->email, 'password' => $request->password])) {
            return redirect()->route('doctor.index');
        }elseif(Auth::guard('web')->attempt(['email' =>$request->email, 'password' => $request->password])){
            return redirect()->route('user.index');
        }else{
             return redirect()->back();
        }
    }
    function loginview(){
        return view('authintcation.login');
    }
    function logout(){
        auth::logout();
        return view('welcome');
    }
}
