<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = DB::table('siswa')->get();
        $courses = DB::table('kursus')->get();
        $data = [
            'title'=>'Presensi',
            'students'=>$students,
            'courses'=>$courses
        ];
        return view('pages.presensi.create',$data);
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
            "id_siswa" => "required",
            "id_kursus" => "required",
            "tgl"=>"required|date",
            "jam" => "required"
        ];
        $messages = [
            "id_siswa.required" => "Masukan NIS atau nama",
            "id_kursus.required" => "Masukan nama kursus atau kelas",
            "tgl.required"=>"Masukan tanggal presensi",
            "jam.required"=>"Masukan jam presensi"
        ];
        $validate = $request->validate($rules,$messages);
        $tgl = date_create($validate['tgl']);
        $jam = date_create($validate['jam']);
        $attendances = Attendance::all();
        foreach($attendances as $item){
            if($item->tgl == date_format($tgl,"Y-m-d")){
                return back()->with('error',"Maaf, presensi tidak bisa dilakukan kembali di tanggal yang sama karena Anda sudah melakukanya di hari ini.");
            }

        }
        $query = new Attendance([
            'id' => Str::random(50),
            'id_siswa'=>$validate['id_siswa'],
            'id_kursus'=>$validate['id_kursus'],
            'tgl'=>date_format($tgl,"Y-m-d"),
            'jam'=>date_format($jam,"H:i")
        ]);
        $success = $query->save();
        if($success){
            return back()->with('message','Data presensi berhasil disimpan');
        }else{
            return back()->with('error','Data presensi gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
