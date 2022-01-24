<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\User;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Redirect;

class titleController extends Controller
{
    //
  
    function showAllSubmittedTitle()
    {
        $title=titles::orderBy('id','DESC')->get();
        return view('ManageTitle.lecturerProjectTitle',['titles'=>$titles]);
    }

    function show()
    {
        $titles = DB::table('titles')->get();
        return view('ManageTitle.titleList',['titles'=>$titles]);
    }

    function edit($Title_ID)
    {
        $titles = DB::table('titles')->where('Title_ID', $Title_ID)->get();
        return view('ManageTitle.editTitle', compact('titles'));
    }

    function view($Title_ID)
    {
        //$lecturers = DB::table('lecturers')->where('Lecturer_ID', $id)->get();
        $titles = DB::table('titles')->where('Title_ID', $Title_ID)->get();
        return view('ManageTitle.viewTitle',['titles' => $titles]);
        
    }

    function title()
    {
        $titles = Title::all()->where('Lecturer_Email',Auth::user()->email);
        return view('ManageTitle.lecturerProjectTitle',['titles'=>$titles]);
    }

    function delete($id)
    {
        //$lecturers = DB::table('lecturers')->where('Lecturer_ID', $id)->get();
        $titles = DB::table('titles')->where('Title_ID', $id)->get();
        return view('ManageTitle.lecturerProjectTitle',['titles' => $titles]);
        
    }

    function store(Request $request)
    {
        $titles = new title;
        $titles->Title_Name=$request->Title_Name;
        $titles->Title_Type=$request->Title_Type;
        $titles->Title_Description=$request->Title_Description;
        $titles->Required_Skill=$request->Required_Skill;
        $titles->Title_Status='AVAILABLE';
        // $title->Lecturer_Email='a@gmail.com';
        $titles->Lecturer_Email= Auth::user()->email;
        $titles->Lecturer_Name= Auth::user()->name;
        $titles->save();

        $titles = Title::all()->where('Lecturer_Email',Auth::user()->email);
        // return redirect()->route('ManageTitle.lecturerProjectTitle',['titles'=>$titles]);
        return Redirect::to('/lecturerProjectTitle')->with(['titles'=>$titles]);

    }

    function update(Request $request, $id)
    {
        $titles = Title::where('Title_ID', $id)->first();
        $titles->Title_Name=$request->input ('Title_Name');
        $titles->Title_Type=$request->input ('Title_Type');
        $titles->Title_Description=$request->input ('Title_Description');
        $titles->Required_Skill=$request->input ('Required_Skill');
        $titles->Title_Status='AVAILABLE';
        $titles->save();
        return Redirect::to('/viewUpdatedTitle')->with('status', 'Succefully Updated');

    }

    public function destroy($Title_ID)
    {
        $titles=Title::findOrFail($Title_ID);
        $titles->delete();
        return back()->with('message','Title has been delete sucessfully');
    }

    // function bookTitle(Request $request, $id)
    // {
    //     $titles = Title::where('Title_ID', $id)->first();
    //     $titles->Title_Name=$request->input ('Title_Name');
    //     $titles->Title_Type=$request->input ('Title_Type');
    //     $titles->Title_Description=$request->input ('Title_Description');
    //     $titles->Required_Skill=$request->input ('Required_Skill');
    //     $titles->Title_Status='AVAILABLE';
    //     $titles->save();
    //     return Redirect::to('/viewUpdatedTitle')->with('status', 'Succefully Updated');
    
    // }

}