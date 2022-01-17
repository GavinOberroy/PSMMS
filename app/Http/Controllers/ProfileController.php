<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $students = DB::select('select * from student where User_ID = :id', ['id' => Auth::user()->id]);
        return view('ManageProfile.test',['students'=>$students]);
        /*$results = DB::select('select * from student where User_ID = :id', ['id' => Auth::user()->id]);
        return view('ManageProfile.test')->with('ManageProfile.test', $results);*/
    }

    public function viewStudent()
    {
        $students = DB::select('select * from student where User_ID = :id', ['id' => Auth::user()->id]);
        return view('ManageProfile.studentProfile',['students'=>$students]);
    }

    public function viewLecturer()
    {
        $lecturers = DB::select('select * from lecturer where User_ID = :id', ['id' => Auth::user()->id]);
        return view('ManageProfile.lecturerProfile',['lecturers'=>$lecturers]);
    }
}
