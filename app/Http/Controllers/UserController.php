<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Student;

class UserController extends Controller
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
        //
        $data['title'] = 'Register User';
        return view('pages.signup',$data);
    }

    public function createAdmin(){
        $data['title'] = 'Register Admin';
        return view('pages.signupAdmin',$data);
    }

    public function login(){
        $data['title'] = 'Login User';
        return view('pages.signin',$data);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function authenticate(Request $request)
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
             ];
        $messages = [
            'email.required'=>'Masukan Email Anda',
            'email.email'=>'Email tidak sesuai',
            'password.required'=>'Masukan password Anda'
        ];
        $credentials = $request->validate($rules,$messages);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success','Selamat anda berhasil login');
        }

        return back()->with(
            'error' , 'Periksa kembali email dan password anda',
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function saveAdmin(Request $request){
        $rules = [
            'username'=>'required|max:20',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8',
             ];
        $messages = [
            'username.required'=>'Masukan username Anda',
            'username.max'=>'Maksimal panjang 20 karakter ',
            'email.required'=>'Masukan Email Anda',
            'email.email'=>'Email tidak sesuai',
            'password.required'=>'Masukan password Anda',
            'password.confirmed'=>'Kedua password harus sama',
            'password.min'=>'Panjang password minimal 8 karakter'
        ];
        $request->validate($rules,$messages);
        $username = $request->username;
        $email = $request->email;
        $password = Hash::make($request->password);
        $checkEmailUser = DB::table('users')->where('email',$email)->first();
        $checkUsername = DB::table('users')->where('username',$username)->first();
        if($checkEmailUser || $checkUsername){
            return redirect('register')->with('error','Username atau Email anda sudah terdaftar di sistem. Harap masukan email baru');
        }else{
            $user = new User([
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'level' => 'admin'
            ]);
            $user->save();
            return back()->with('status','User berhasil ditambahkan. Silahkan login menggunakan akun baru.');

        }
    }

    public function store(Request $request)
    {
        //
        $rules = [
            'username'=>'required|max:20',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8',
            'nm_siswa'=>'required',
            'no_telp'=>'required'
             ];
        $messages = [
            'username.required'=>'Masukan username',
            'username.max'=>'Maksimal panjang 20 karakter ',
            'email.required'=>'Masukan alamat Email',
            'email.email'=>'Email tidak sesuai',
            'nm_siswa.required'=>'Masukan nama',
            'no_telp.required'=>'Masukan nomor telepon atau hp',
            'password.required'=>'Masukan password',
            'password.confirmed'=>'Kedua password harus sama',
            'password.min'=>'Panjang password minimal 8 karakter'
        ];
        $validate= $request->validate($rules,$messages);
        $password = Hash::make($request->password);
        $checkEmailUser = DB::table('users')->where('email',$validate['email'])->first();
        $checkUsername = DB::table('users')->where('username',$validate['username'])->first();
        if($checkEmailUser || $checkUsername){
            return redirect('register')->with('error','Username atau Email anda sudah terdaftar di sistem. Harap masukan email baru');
        }else{
            // insert user
            $user = new User([
                'username' => $validate['username'],
                'email' => $validate['email'],
                'password' => $password,
                'level' => 'siswa'
            ]);
            $user->save();

            //insert siswa
            $student = new Student([
                'id_siswa'=>Str::random(40),
                'nm_siswa'=>$validate['nm_siswa'],
                'no_telp'=>$validate['no_telp'],
                'id_user'=>$user->id
            ]);
            $student->save();
            return redirect('register')->with('status','User berhasil ditambahkan. Silahkan login menggunakan akun baru.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::find(Auth::user()->id);
        $data = [
            'title'=>'Ubah Sandi',
            'user' => $user
        ];
        return view('pages.user.ubah-sandi',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = [
            'username'=>'required|max:20',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8',
             ];
        $messages = [
            'username.required'=>'Masukan username Anda',
            'username.max'=>'Maksimal panjang 20 karakter ',
            'email.required'=>'Masukan Email Anda',
            'email.email'=>'Email tidak sesuai',
            'password.required'=>'Masukan password Anda',
            'password.confirmed'=>'Kedua password harus sama',
            'password.min'=>'Panjang password minimal 8 karakter'
        ];
        $id = $request->id;
        $validate= $request->validate($rules,$messages);
        $password = Hash::make($request->password);
        $user = User::find($id);
        $user->username = $validate['username'];
        $user->email = $validate['email'];
        $user->password = $password;
        $success = $user->save();
        if($success){
            return back()->with('message','Data akun pengguna berhasil diperbarui');
        }else{
            return back()->with('error','Data akun pengguna gagal diperbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
