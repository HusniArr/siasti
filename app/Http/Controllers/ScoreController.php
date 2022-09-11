<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = DB::table('nilai')
        ->leftJoin('siswa','siswa.id_siswa','=','nilai.id_siswa')
        ->leftJoin('kursus','kursus.id','=','nilai.id_kursus')
        ->select('nilai.*','siswa.nis','siswa.nm_siswa','kursus.nm_kursus')
        ->get();
        // dd($allData);
        $data = [
            'title' => 'Nilai',
            'allData' => $allData
        ];
        return view('pages.nilai.index',$data);
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
            'title' => 'Tambah Nilai',
            'students' => $students,
            'courses' => $courses
        ];

        return view('pages.nilai.create',$data);
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
            'id_siswa'=> 'required',
            'id_kursus' => 'required',
            'nilai' => 'required',
            'ket' =>'required'
        ];
        $messages = [
            'id_siswa.required' => 'Masukan NIS atau Nama Siswa',
            'id_kursus.required' => 'Masukan Nama kursus atau kelas',
            'nilai.required' => 'Masukan Nilai Siswa',
            'ket.required' => 'Masukan Status belajar siswa'
        ];
        $validate = $request->validate($rules,$messages);
        $nilai = new Score([
            'id_siswa'=>$validate['id_siswa'],
            'id_kursus'=>$validate['id_kursus'],
            'nilai' =>$validate['nilai'],
            'ket'=>$validate['ket']
        ]);
        $success = $nilai->save();
        if($success){
            return back()->with('message','Data nilai berhasil disimpan');
        }else{
            return back()->with('error','Data nilai gagal disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit($id_nilai)
    {
        $score = Score::find($id_nilai);
        $students = DB::table('siswa')->get();
        $courses = DB::table('kursus')->get();
        $data = [
            'title' => 'Tambah Nilai',
            'students' => $students,
            'courses'=>$courses,
            'score' => $score
        ];

        return view('pages.nilai.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules = [
            'id_kursus' => 'required',
            'nilai' => 'required',
            'ket' =>'required'
        ];
        $messages = [
            'id_kursus.required' => 'Masukan Nama kursus atau kelas',
            'nilai.required' => 'Masukan Nilai Siswa',
            'ket.required' => 'Masukan Status belajar siswa'
        ];

        $validate = $request->validate($rules,$messages);
        $score = Score::find($id);
        $score->id_kursus = $validate['id_kursus'];
        $score->nilai = $validate['nilai'];
        $score->ket = $validate['ket'];
        $updated = $score->save();
        if($updated){
            return back()->with('message','Data nilai berhasil diperbarui');
        }else{
            return back()->with('error','Data nilai gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_nilai)
    {
        $score = Score::find($id_nilai);
        $deleted = $score->delete();
        if($deleted){
            return back()->with('message','Data nilai berhasil dihapus');
        }else{
            return back()->with('error','Data nilai gagal dihapus');
        }
    }
}
