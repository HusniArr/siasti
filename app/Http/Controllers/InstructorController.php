<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\File;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['title'] = 'Instruktur';
        $instructors = Instructor::all();
        $data['instructors'] = $instructors;
        return view('pages.instruktur.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['title'] = 'Tambah Instruktur';
        return view('pages.instruktur.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'kd_instr' => ['required'],
            'nm_instr' => ['required'],
            'tgl_lhr'=>['required','date'],
            'tpt_lhr'=>['required'],
            'jns_kel'=>['in:L,P'],
            'alamat'=>['required'],
            'image'=>['image','file','max:1024']
             ];
        $messages = [
            'kd_instr.required'=>'Masukan NIP',
            'nm_instr.required'=>'Masukan nama',
            'tgl_lhr.required'=>'Masukan tanggal lahir',
            'tgl_lhr.date'=>'Format tanggal tidak valid',
            'tpt_lhr.required'=>'Masukan tempat lahir',
            'jns_kel.in'=>'Jenis kelamin belum dipilih',
            'alamat.required'=>'Masukan alamat tinggal sekarang',
            'gbr_instr.image'=>'Format upload file harus berbentuk JPEG,JPG,PNG',
            'gbr_instr.max'=>'Ukuran file maksimal 1 MB'
        ];
        $validate = $request->validate($rules,$messages);
        if($request->file('gbr_instr')){
            $validate['gbr_instr'] = $request->file('gbr_instr')->store('instruktur');
        }
        $instructor = new Instructor([
            'kd_instr'=>$validate['kd_instr'],
            'nm_instr'=>$validate['nm_instr'],
            'tgl_lhr'=>$validate['tgl_lhr'],
            'tpt_lhr'=>$validate['tpt_lhr'],
            'jns_kel'=>$validate['jns_kel'],
            'alamat'=>$validate['alamat'],
            'gbr_instr'=>$validate['gbr_instr'],
            'no_telp'=>$request->no_telp
        ]);
        $instructor->save();
        return back()->with('message','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kd_instr)
    {
        //
        $data['row'] = Instructor::find($kd_instr);
        $data['title'] = 'EDIT';
        return view('pages.instruktur.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd_instr)
    {
        //
        $rules = [
            'nm_instr' => ['required'],
            'tgl_lhr'=>['required','date'],
            'tpt_lhr'=>['required'],
            'jns_kel'=>['in:L,P'],
            'alamat'=>['required'],
            'image'=>['image','file','max:1024']
             ];
        $messages = [
            'nm_instr.required'=>'Masukan nama',
            'tgl_lhr.required'=>'Masukan tanggal lahir',
            'tgl_lhr.date'=>'Format tanggal tidak valid',
            'tpt_lhr.required'=>'Masukan tempat lahir',
            'jns_kel.in'=>'Jenis kelamin belum dipilih',
            'alamat.required'=>'Masukan alamat tinggal sekarang',
            'gbr_instr.image'=>'Format upload file harus berbentuk JPEG,JPG,PNG',
            'gbr_instr.max'=>'Ukuran file maksimal 1 MB'
        ];
        $validate = $request->validate($rules,$messages);
        if($request->file('gbr_instr')){
            $validate['gbr_instr'] = $request->file('gbr_instr')->store('instruktur');
        }
        $instr = Instructor::find($kd_instr);
        $instr->nm_instr = $validate['nm_instr'];
        $instr->tgl_lhr = $validate['tgl_lhr'];
        $instr->tpt_lhr = $validate['tpt_lhr'];
        $instr->jns_kel = $request->jns_kel;
        $instr->alamat = $validate['alamat'];
        $instr->gbr_instr = $validate['gbr_instr'];
        $instr->no_telp = $request->no_telp;
        $instr->save();
        return back()->with('message','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kd_instr)
    {
        //hapus record
        $instr = Instructor::find($kd_instr);
        File::delete($instr->gbr_instr);
        $instr->delete();
        return back()->with('message','Data berhasil dihapus');
    }
}
