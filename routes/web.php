<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'authenticate']);
Route::get('/register',[UserController::class,'create']);
Route::post('/user/store',[UserController::class,'store']);
Route::get('/home', [HomeController::class,'index'])->middleware('auth');
