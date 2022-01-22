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
        return view('supervisorList', compact('lecturers'));
    }

    function edit()
    {
        $data = DB::table('supervisors')->where('id', Auth::user()->id)->first();
        dd($data);
        return view('mana2',['supervisors' => $data]);
    }

    function detail($id)
    {
        $data=Supervisor::find($id);
        //$data=Supervisor::where('id',"=", $id)->first();
        dd($data);
    }

    function title()
    {
        $data = Supervisor::all();
        return view('projectTitleList',['supervisors'=>$data]);
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $supervisors = DB::table('lecturer')->where('Lecturer_Name','LIKE','%'.$search_text."%")->get();
        return view('ManageSupervisorHunting.search',compact('supervisors'));
    }


}