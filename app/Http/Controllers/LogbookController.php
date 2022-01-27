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

    //Method to save the logbook progress details into database.
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
        
        $logbooks = Logbook::all()->where('Student_Email',Auth::user()->email);
        return Redirect::to('/viewAdded')->with(['logbooks' => $logbooks]);
       
    }
    
    //Method to retrieve the students’s logbook progress details and display it at lecturer page
    function showLogbook($id)
    {
        
        $logbooks = DB::table('logbooks')->where('Student_Email',Auth::user()->email)->get();
        return view('ManageLogbook.ApproveLogbook', compact('logbooks'));
        
    }

    //Method to retrieve student logbook status approval 
    public function updateStatusApprove(Request $request,$Logbook_ID)
    {
        $logbooks = Logbook::find($Logbook_ID);
        $logbooks->Status_Approval = "Approve";
        $logbooks->save();
        
        return back();
    }

    //Method to retrieve student logbook status approval 
    public function updateStatusReject(Request $request,$Logbook_ID)
    {
        $logbooks = Logbook::find($Logbook_ID);
        $logbooks->Status_Approval = "Rejected";
        $logbooks->save();
        
        return back();
    }
    
    //Method to retrieve the students’s logbook progress details and display at student page. 
    function showUpdatedLog()
    {
        
        $logbooks = DB::table('logbooks')->where('Student_Email',Auth::user()->email)->get();
        return view('ManageLogbook.ViewProgress', compact('logbooks'));
        
    }

    //Method to retrieve the students’s logbook progress details and display at lecturer page. 
    function displayLogbook()
    {
        $logbooks = Logbook::all()->where('Lecturer_Email',Auth::user()->email);
        return view('ManageLogbook.ApproveLogbook',['logbooks' => $logbooks]);
    }

    //Method to edit the logbook progress details into database
    function edit($id)
    {
        $logbooks =  Logbook::where('Logbook_ID', $id)->first();
        return view('ManageLogbook.EditProgress', compact('logbooks'));
    }

    //Method to update the logbook progress details into database 
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
