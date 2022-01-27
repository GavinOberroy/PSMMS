<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supervisor;
use App\Models\User;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SupervisorController extends Controller
{
    //
    function show()
    {
        $lecturers = DB::table('lecturer')->get();
        return view('ManageSupervisorHunting.supervisorList', compact('lecturers'));
    }

    function detail($Lecturer_ID)
    {
        $lecturers = DB::select('select * from lecturer where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $educations = DB::select('select * from lecturer_education where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $supervisions = DB::select('select * from student where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $expertises = DB::table('expertises')->where('lecturer_email',Auth::user()->email)->get();
        return view('ManageProfile.lecturerProfile',['lecturers'=>$lecturers, 'educations'=>$educations, 'supervisions'=>$supervisions, 'expertises'=>$expertises]);
    }

    function lecturerDetail($Lecturer_ID)
    {
        $lecturers = DB::select('select * from lecturer where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $educations = DB::select('select * from lecturer_education where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $supervisions = DB::select('select * from student where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $expertises = DB::select('select * from expertises where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        return view('ManageProfile.lecturerDetail',['lecturers'=>$lecturers, 'educations'=>$educations, 'supervisions'=>$supervisions, 'expertises'=>$expertises]);
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $lecturers = DB::table('lecturer')->where('Lecturer_Name','LIKE','%'.$search_text."%")->get();
        return view('ManageSupervisorHunting.search',compact('lecturers'));
    }


}