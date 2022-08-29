<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InstructorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('login', [UserController::class,'login'])->name('login')->middleware('guest');
Route::post('login',[UserController::class,'authenticate']);
Route::get('logout',[UserController::class,'logout']);
Route::get('register',[UserController::class,'create']);
Route::post('user/store',[UserController::class,'store']);
Route::get('instruktur',[InstructorController::class,'index'])->name('instruktur')->middleware('admin');
Route::get('siswa',function(){
    $data['title'] = 'Siswa';
    return view('pages.siswa.index',$data);
})->name('siswa')->middleware('admin');
Route::get('403',function(){
    return view('pages.error403');
})->name('error.403');
