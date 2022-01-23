<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Logbook;
use App\Models\User;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Redirect;

class LogbookController extends Controller
{

    public function create() //create
    {
        return view(logbook.create);
    }

    // public function store(Request $request)
    // {
    //     $logbook = new Logbook;
    //     $logbook->Logbook_Week = $request->input('Logbook_Week');
    //     $logbook->Logbook_Date = $request->input('Logbook_Date');
    //     $logbook->Logbook_Time = $request->input('Logbook_Time');
    //     $logbook->Current_Progress = $request->input('Current_Progress');
    //     $logbook->Upcoming_Progress = $request->input('Upcoming_Progress');
    //     $logbook->save();
    //     return redirect()->back()->with('status','Logbook Added Successfully');
    // }

    function store(Request $request)
    {
        $logbooks = new Logbook;
        $logbooks->Logbook_Week=$request->Logbook_Week;
        $logbooks->Logbook_Date=$request->Logbook_Date;
        $logbooks->Logbook_Time=$request->Logbook_Time;
        $logbooks->Current_Progress=$request->Current_Progress;
        $logbooks->Upcoming_Progress=$request->Upcoming_Progress;
        $logbooks->Student_Name=$request->Student_Name;
        $logbooks->Student_ID=$request->Student_ID;
        $logbooks->Lecturer_Email=$request->Lecturer_Email;
        $logbooks->Student_Email= Auth::user()->email;
        $logbooks->Status_Approval='Not Approve';

        $logbooks->save();

        // $post->save();
        // return redirect()->route('ManageTitle.lecturerProjectTitle',['titles'=>$titles]);
        
        $logbooks = Logbook::all()->where('Student_Email',Auth::user()->email);
        return Redirect::to('/viewAdded')->with(['logbooks' => $logbooks]);
       
        // return Redirect::to('/lecturerProjectTitle')->with(['titles'=>$titles]);
    }
    
    function showLogbook($id)
    {
        //$lecturers = DB::table('lecturers')->where('Lecturer_ID', $id)->get();
        $logbooks = DB::table('logbooks')->where('Student_Email',Auth::user()->email)->get();
        return view('ManageLogbook.ApproveLogbook', compact('logbooks'));
        
    }
    
    //    function detail($id)
    // {
    //     $lecturers = DB::table('lecturer')->where('Lecturer_ID', $id)->get();
    //     $expertises = DB::table('expertises')->where('lecturer_email',Auth::user()->email)->get();
    //     //return view('ManageLecturerExpertise.viewExpertise',['lecturers' => $lecturers]);
    //     return view('ManageLecturerExpertise.viewExpertise', compact('lecturers', 'expertises'));
    // }


    // function show()
    // {
    //     $logbooks = DB::table('logbooks')->get();
    //     return view('ManageLogbook.ViewProgress',['logbooks' => $logbooks]);
    // }
    function showUpdatedLog()
    {
        //$lecturers = DB::table('lecturers')->where('Lecturer_ID', $id)->get();
        $logbooks = DB::table('logbooks')->where('Student_Email',Auth::user()->email)->get();
        return view('ManageLogbook.ViewProgress', compact('logbooks'));
        
    }

    function displayLogbook()
    {
        $logbooks = Logbook::all()->where('Lecturer_Email',Auth::user()->email);
        return view('ManageLogbook.ApproveLogbook',['logbooks' => $logbooks]);
    }

    // function generate()
    // {
    //     $logbooks = DB::table('logbooks')->get();
    //     return view('ManageLogbook.ViewProgress',['logbooks' => $logbooks]);
    // }

    function edit($id)
    {
        $logbooks =  Logbook::where('Logbook_ID', $id)->first();
        return view('ManageLogbook.EditProgress', compact('logbooks'));
    }

    function update(Request $request, $id)
    {
        $logbooks =  Logbook::where('Logbook_ID', $id)->first();
        $logbooks->Logbook_Week=$request->input ('Logbook_Week');
        $logbooks->Logbook_Date=$request->input ('Logbook_Date');
        $logbooks->Logbook_Time=$request->input ('Logbook_Time');
        $logbooks->Current_Progress=$request->input ('Current_Progress');
        $logbooks->Upcoming_Progress=$request->input ('Upcoming_Progress');

        $logbooks->save();
        return Redirect::to('/showUpdated')->with('status', 'Succefully Updated');

    }
}
