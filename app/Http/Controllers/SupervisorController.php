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
        $lecturers = DB::table('lecturers')->get();
        return view('supervisorList', compact('lecturers'));
    }

    function edit()
    {
        $data = DB::table('supervisors')->where('id', Auth::user()->id)->first();
        dd($data);
        return view('mana2',['supervisors' => $data]);
    }

    function title()
    {
        $data = Supervisor::all();
        return view('projectTitleList',['supervisors'=>$data]);
    }


}