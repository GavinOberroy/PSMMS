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
    //Function to show all the lecturer from the database
    function show()
    {
        $lecturers = DB::table('lecturer')->get();
        return view('ManageSupervisorHunting.supervisorList', compact('lecturers'));
    }

    //Function to search the lecturer based on keywords entered
    public function search()
    {
        $search_text = $_GET['query'];
        $lecturers = DB::table('lecturer')->where('Lecturer_Name','LIKE','%'.$search_text."%")->get();
        return view('ManageSupervisorHunting.search',compact('lecturers'));
    }


}