<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supervisor;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SupervisorController extends Controller
{
    //
    function show()
    {
        $supervisors = Supervisor::all();
        return view('supervisorList', compact('supervisors'));
    }
    function edit($id)
    {
        $data = DB::table('supervisors')->where('id', $id)->first();
        return view('Supervisor.edit',['supervisors' => $data]);
    }

    function title()
    {
        $data = Supervisor::all();
        return view('projectTitleList',['supervisors'=>$data]);
    }


}