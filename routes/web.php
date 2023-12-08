<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\UserController;
use App\Models\Booking;
use App\Models\Doctor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function (){
    Route::resource('doctor',DoctorController::class);
    Route::resource('major',MajorController::class);
    Route::resource('user',UserController::class);
});
    Route::resource('booking',BookingController::class);


Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/login',[LoginController::class,'loginview'])->name('login.view')->middleware('guest');
Route::post('/logout',[LoginController::class,'logout'])->name('login.logout');
