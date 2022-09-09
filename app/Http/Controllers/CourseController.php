<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title'=>'Kursus',
            'courses'=> DB::table('kursus')->get()
        ];
        return view('pages.kursus.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Kursus'
        ];
        return view('pages.kursus.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'kd_kursus' => 'required|max:12',
            'nm_kursus' => 'required|max:100',
            'jenjang' => 'required',
            'jdwl_kursus'=> 'required',
            'wkt_kursus' => 'required',
            'biaya_kursus' => 'required'
        ];
        $messages = [
            'kd_kursus.required' => 'Masukan kode kursus',
            'kd_kursus.max' => 'Batas kode hanya 12 digit',
            'nm_kursus.required' => 'Masukan nama kursus',
            'nm_kursus.max' => 'Nama Kursus terlalu panjang',
            'jenjang.required' => 'Masukan jenjang kursus',
            'jdwl_kursus.required' => 'Masukan jadwal kursus',
            'wkt_kursus.required' => 'Waktu kursus belum diset',
            'biaya_kursus.required' => 'Masukan jumlah biaya kursus'
        ];
        $validate = $request->validate($rules,$messages);
        $time = date_create($validate['wkt_kursus']);
        $course = new Course([
            'kd_kursus'=>$validate['kd_kursus'],
            'nm_kursus' => $validate['nm_kursus'],
            'jenjang' => $validate['jenjang'],
            'jdwl_kursus' => $validate['jdwl_kursus'],
            'wkt_kursus' => date_format($time,"H:i"),
            'biaya_kursus' => $validate['biaya_kursus']
        ]);
        $success = $course->save();
        if($success){
            return back()->with('message','Data kursus berhasil disimpan');
        }else{
            return back()->with('error','Data kursus gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($kd_kursus)
    {
        $data = [
            'title' => 'Edit Kursus',
            'course' => DB::table('kursus')->where('kd_kursus',$kd_kursus)->first()
        ];
        return view('pages.kursus.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$kd_kursus)
    {
        $rules = [
            'nm_kursus' => 'required|max:100',
            'jenjang' => 'required',
            'jdwl_kursus'=> 'required',
            'wkt_kursus' => 'required',
            'biaya_kursus' => 'required'
        ];
        $messages = [
            'nm_kursus.required' => 'Masukan nama kursus',
            'nm_kursus.max' => 'Nama Kursus terlalu panjang',
            'jenjang.required' => 'Masukan jenjang kursus',
            'jdwl_kursus.required' => 'Masukan jadwal kursus',
            'wkt_kursus.required' => 'Waktu kursus belum diset',
            'biaya_kursus.required' => 'Masukan jumlah biaya kursus'
        ];
        $validate = $request->validate($rules,$messages);
        $time = date_create($validate['wkt_kursus']);
        $updated = DB::table('kursus')
        ->where('kd_kursus',$kd_kursus)
        ->update([
            'nm_kursus' => $validate['nm_kursus'],
            'jenjang' => $validate['jenjang'],
            'jdwl_kursus' => $validate['jdwl_kursus'],
            'wkt_kursus' => date_format($time,"H:i"),
            'biaya_kursus' => $validate['biaya_kursus']
        ]);

        if($updated){
            return back()->with('message','Data kursus berhasil diperbarui');
        }else{
            return back()->with('error','Data kursus gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_kursus)
    {
        $course = Course::find($kd_kursus);
        $deleted = $course->delete();
        if($deleted){
            return back()->with('message','Data kursus berhasil dihapus');
        }else{
            return back()->with('error','Data kursus gagal dihapus');
        }

    }
}
