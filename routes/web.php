<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScoreController;


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
Route::get('register/admin',[UserController::class,'createAdmin']);
Route::get('register',[UserController::class,'create']);
Route::post('user/store',[UserController::class,'store'])->name('store.siswa');
Route::post('admin/store',[UserController::class,'saveAdmin'])->name('store.admin');
Route::get('instruktur',[InstructorController::class,'index'])->name('instruktur')->middleware('admin');
Route::get('instruktur/tambah',[InstructorController::class,'create'])->name('instruktur.tambah')->middleware('admin');
Route::post('instruktur/tambah',[InstructorController::class,'store'])->name('instruktur.simpan');
Route::get('instruktur/{id}/edit/',[InstructorController::class,'edit'])->name('instruktur.edit')->middleware('admin');
Route::post('instruktur/{id}/edit',[InstructorController::class,'update'])->name('instruktur.update');
Route::get('instruktur/{id}/hapus',[InstructorController::class,'destroy'])->name('instruktur.hapus')->middleware('admin');
Route::get('siswa',[StudentController::class,'index'])->name('siswa')->middleware('admin');
Route::get('siswa/tambah',[StudentController::class,'create'])->name('siswa.tambah')->middleware('admin');
Route::post('siswa/tambah',[StudentController::class,'store'])->name('siswa.simpan');
Route::get('siswa/{id_siswa}/edit',[StudentController::class,'edit'])->name('siswa.edit')->middleware('admin');
Route::post('siswa/update',[StudentController::class,'update'])->name('siswa.update');
Route::get('siswa/{id_siswa}/hapus',[StudentController::class,'destroy'])->name('siswa.hapus')->middleware('admin');
Route::get('kursus',[CourseController::class,'index'])->name('kursus')->middleware('admin');
Route::get('kursus/tambah',[CourseController::class,'create'])->name('kursus.tambah')->middleware('admin');
Route::post('kursus/simpan',[CourseController::class,'store'])->name('kursus.simpan');
Route::get('kursus/{id}/edit',[CourseController::class,'edit'])->name('kursus.edit')->middleware('admin');
Route::post('kursus/{id}/edit',[CourseController::class,'update'])->name('kursus.update');
Route::get('kursus/{id}/hapus',[CourseController::class,'destroy'])->name('kursus.hapus')->middleware('admin');
Route::get('nilai',[ScoreController::class,'index'])->name('nilai')->middleware('admin');
Route::get('nilai/tambah',[ScoreController::class,'create'])->name('nilai.tambah')->middleware('admin');
Route::post('nilai/simpan',[ScoreController::class,'store'])->name('nilai.simpan');
Route::get('nilai/{id_nilai}/edit',[ScoreController::class,'edit'])->name('nilai.edit')->middleware('admin');
Route::post('nilai/{id_nilai}/edit',[ScoreController::class,'update'])->name('nilai.update');
Route::get('nilai/{id_nilai}/hapus',[ScoreController::class,'destroy'])->name('nilai.delete')->middleware('admin');
Route::get('403',function(){
    return view('pages.error403');
})->name('error.403');
