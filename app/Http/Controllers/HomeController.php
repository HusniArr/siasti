<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Instructor;
use App\Models\User;
use App\Models\Course;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        if(Auth::user()){
            // load view dashboard page
            $count_student = Student::all()->count();
            $count_instr = Instructor::all()->count();
            $count_user = User::all()->count();
            $count_course = Course::all()->count();
            $data = [
                'title'=>'LKP Techno Informatika',
                'count_student' => $count_student,
                'count_instr' => $count_instr,
                'count_user' => $count_user,
                'count_course' => $count_course
            ];

            return view('pages.home',$data);
        }else{
            return redirect('/login');
        }
    }


    /*
    fitur pencarian informasi siswa dan pengajar
    */
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
