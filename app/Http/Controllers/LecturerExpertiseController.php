<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use App\Models\Supervisor;
use App\Models\Expertise;
use App\Models\User;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LecturerExpertiseController extends Controller
{
    //
    function index()
    {
        return view('ManageLecturerExpertise.lecturerExpertise');
    }

    function show()
    {
        $expertises = Expertise::all();
        return view('ManageLecturerExpertise.viewExpertise', compact ('expertises'));
    }

    function edit($id)
    {
        $data = Expertise::find($id);
        return view('viewExpertise',compact ('expertises','id'));
    }

    function delete($id)
    {
        $data = Expertise::find($id);
        return view('viewExpertise',compact ('expertises','id'));
    }

    function detail($id)
    {
        $lecturers = DB::table('lecturers')->where('Lecturer_ID', $id)->get();
        $expertises = DB::table('expertises')->where('lecturer_email',Auth::user()->email)->get();
        //return view('ManageLecturerExpertise.viewExpertise',['lecturers' => $lecturers]);
        return view('ManageLecturerExpertise.viewExpertise', compact('lecturers', 'expertises'));
    }

    function store(Request $request)
    {
        $expertises = new expertise;
        $expertises->expertise_name=$request->expertise_name;
        $expertises->expertise_level=$request->expertise_level;
        $expertises->lecturer_email= Auth::user()->email;
        $expertises->save();

        $expertises = Expertise::all()->where('lecturer_email',Auth::user()->email);
        return Redirect::to('/lecturerExpertise')->with(['expertises'=>$expertises]);

    }

}   
