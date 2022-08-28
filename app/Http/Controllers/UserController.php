<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    public function login(){
        $data['title'] = 'Login User';
        return view('pages.signin',$data);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
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

            return redirect()->intended('dashboard');
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
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'username'=>'required|max:20',
            'email'=>'required|email',
            'password'=>'required|confirmed|min:8',
        ]);
        $username = $request->username;
        $email = $request->email;
        $password = Hash::make($request->password);
        $user = new User([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'level' => 'siswa'
        ]);
        $user->save();
        return redirect('signup')->with('status','User berhasil ditambahkan. Silahkan login menggunakan akun baru.');
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
    public function update(Request $request, $id)
    {
        //
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
