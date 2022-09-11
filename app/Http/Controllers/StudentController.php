<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Score;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //load semua data siswa
        $data['title'] = 'Siswa';
        $data['students'] = DB::select('select * from siswa');
        return view('pages.siswa.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Tambah siswa';
        return view('pages.siswa.create',$data);
    }


    public function store(Request $request)
    {

        $rules = [
            'username'=>'required|max:15',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8',
            'nis'=>'required|max:12',
            'nm_siswa'=>'required',
            'tgl_lhr'=>'required|date',
            'tpt_lhr'=>'required',
            'jns_kel'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'gbr_siswa'=>'image|file|max:1024',
             ];
        $messages = [
            'username.required'=>'Masukan username',
            'username.max'=>'Maksimal panjang 15 karater ',
            'email.required'=>'Masukan Email',
            'email.email'=>'Email tidak sesuai',
            'password.required'=>'Masukan password',
            'password.confirmed'=>'Kedua password harus sama',
            'nis.required' => 'Masuka NIS',
            'nis.max'=>'Maksimum NIS 12 digit',
            'nm_siswa.required'=>'Masukan nama lengkap',
            'tgl_lhr.required'=>'Masukan tanggal lahir',
            'tgl_lhr.date'=>'Masukan format tanggal dengan benar',
            'tpt_lhr.required'=>'Masukan tempat lahir',
            'jns_kel.required'=>'Jenis kelamin belum dipilih',
            'alamat.required'=>'Masukan alamat',
            'no_telp.required'=>'Masukan nomor telepon atau hp',
            'gbr_siswa.image'=>'Format harus jpg,jpeg,png',
            'gbr_siswa.max'=>'Ukuran gambar 1MB'
        ];
        $validate= $request->validate($rules,$messages);
        $password = Hash::make($request->password);
        $checkEmailUser = DB::table('users')->where('email',$validate['email'])->first();
        $checkUsername = DB::table('users')->where('username',$validate['username'])->first();
        if($checkEmailUser || $checkUsername){
            return back()->with('error','Username atau Email anda sudah ada');
        }else{
            // insert user
            $user = new User([
                'username' => $validate['username'],
                'email' => $validate['email'],
                'password' => $password,
                'level' => 'siswa'
            ]);
            $user->save();

            if($request->file('gbr_siswa')){
                $validate['gbr_siswa'] = $request->file('gbr_siswa')->store('siswa');
            }

            //insert siswa
            $student = new Student([
                'id_siswa'=>Str::random(40),
                'nis'=>$validate['nis'],
                'nm_siswa'=>$validate['nm_siswa'],
                'tgl_lhr' =>$validate['tgl_lhr'],
                'tpt_lhr'=>$validate['tpt_lhr'],
                'jns_kel'=>$validate['jns_kel'],
                'alamat'=>$validate['alamat'],
                'no_telp'=>$validate['no_telp'],
                'gbr_siswa'=>$validate['gbr_siswa'],
                'id_user'=>$user->id
            ]);
            $student->save();
            return back()->with('message','Data siswa berhasil disimpan.');
    }

}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id_siswa)
    {
        //
        $student = DB::table('siswa')->where('id_siswa',$id_siswa)->first();
        $data['title'] = 'Edit Siswa';
        $data['student'] = $student;
        $data['user'] = User::find($student->id_user);
        return view('pages.siswa.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //update data siswa
        $rules = [
            'nis'=>'required|max:12',
            'nm_siswa'=>'required',
            'tgl_lhr'=>'required|date',
            'tpt_lhr'=>'required',
            'jns_kel'=>'required',
            'alamat'=>'required',
            'no_telp'=>'required',
            'gbr_siswa'=>'image|file|max:1024',
             ];
        $messages = [
            'nis.required' => 'Masukan NIS',
            'nis.max'=>'Maksimum NIS 12 digit',
            'nm_siswa.required'=>'Masukan nama lengkap',
            'tgl_lhr.required'=>'Masukan tanggal lahir',
            'tgl_lhr.date'=>'Masukan format tanggal dengan benar',
            'tpt_lhr.required'=>'Masukan tempat lahir',
            'jns_kel.required'=>'Jenis kelamin belum dipilih',
            'alamat.required'=>'Masukan alamat',
            'no_telp.required'=>'Masukan nomor telepon atau hp',
            'gbr_siswa.mime'=>'Format harus jpg,jpeg,png',
            'gbr_siswa.max'=>'Ukuran gambar 1MB'
        ];
        $validate= $request->validate($rules,$messages);
        $id_siswa = $request->id_siswa;
        //update siswa
        if($request->file('gbr_siswa')){
            $validate['gbr_siswa'] = $request->file('gbr_siswa')->store('siswa');
        }

        $student = Student::find($id_siswa);
        $student->nis = $request->nis;
        $student->nm_siswa = $request->nm_siswa;
        $student->tgl_lhr = $request->tgl_lhr;
        $student->tpt_lhr = $request->tpt_lhr;
        $student->jns_kel = $request->jns_kel;
        $student->alamat = $request->alamat;
        $student->no_telp = $request->no_telp;
        $student->gbr_siswa = $validate['gbr_siswa'];
        $updated = $student->save();

        if($updated){

            return back()->with('message','Data siswa berhasil diperbarui.');
        }else{
            return back()->with('error','Data siswa gagal diperbarui.');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_siswa)
    {

        $student = DB::table('siswa')->where('id_siswa',$id_siswa)->first();
        $user = User::find($student->id_user);
        $nilai = Score::find($id_siswa);
        unlink(public_path('storage/siswa').$student->gbr_siswa);
        $user->forceDelete();
        $student->forceDelete();
        $nilai->forceDelete();
        return redirect('siswa')->with('message','Data siswa berhasil dihapus');
    }
}
