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

    function show($Lecturer_ID)
    {
        $lecturers = DB::select('select * from lecturer where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $expertises = Expertise::all()->where('lecturer_email',Auth::user()->email);
        return view('ManageLecturerExpertise.lecturerExpertise',['lecturers'=>$lecturers,'expertises'=>$expertises]);
    }

    function showAdded()
    {
        $expertises = Expertise::all()->where('lecturer_email',Auth::user()->email);
        return view('ManageLecturerExpertise.lecturerExpertise',['expertises'=>$expertises]);
    }

    function edit($id)
    {
        $expertises =  Expertise::where('expertise_id', $id)->first();
         //dd($expertises);
        return view('ManageLecturerExpertise.edit', compact('expertises'));
    }

    // function delete($id)
    // {
    //     $data = Expertise::find($id);
    // }

    function detail($id)
    {
        $lecturers = DB::table('lecturer')->where('Lecturer_ID', $id)->get();
        $expertises = DB::table('expertises')->where('lecturer_email',Auth::user()->email)->get();
        //return view('ManageLecturerExpertise.viewExpertise',['lecturers' => $lecturers]);
        return view('ManageLecturerExpertise.viewExpertise', compact('lecturers', 'expertises'));
    }

    function updatedExpertise($Lecturer_ID)
    {
        $lecturers = DB::select('select * from lecturer where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $educations = DB::select('select * from lecturer_education where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $supervisions = DB::select('select * from student where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $expertises = DB::table('expertises')->where('lecturer_email',Auth::user()->email)->get();
        return view('ManageProfile.lecturerProfile',['lecturers'=>$lecturers, 'educations'=>$educations, 'supervisions'=>$supervisions, 'expertises'=>$expertises]);
    }

    function store(Request $request)
    {
        $expertises = new expertise;
        $expertises->expertise_name = $request->expertise_name;
        $expertises->expertise_level = $request->expertise_level;
        $expertises->lecturer_email = Auth::user()->email;
        $expertises->lecturer_id = Auth::user()->id;
        $expertises->save();

        $expertises = Expertise::all()->where('lecturer_email',Auth::user()->email);
        return Redirect::to('addedExpertise')->with(['expertises'=>$expertises])->with('status', 'Succefully Added');

    }

    function update(Request $request, $id)
    {
        $expertises =  Expertise::where('expertise_id', $id)->first();
        // $Lecturer_ID = DB::table('lecturer')->where('Lecturer_ID',$id)->get();
        // dd($expertises);
        $expertises->expertise_name = $request->input ('expertise_name');
        $expertises->expertise_level = $request->input ('expertise_level');
        $expertises->save();
        return Redirect::to('updatedExpertise')->with('status', 'Succefully Updated');

    }

}   
