<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\titleModel;
use App\Models\User;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class titleController extends Controller
{
    //
    function show()
    {
        $title = DB::table('title')->get();
       
        return view('ManageTitle.TitleList',['titles'=>$title]);
    }

    function edit()
    {
        $data = DB::table('title')->where('id', Auth::user()->id)->first();
        dd($data);
        return view('book',['title' => $data]);
    }

    function title()
    {
        $data = Supervisor::all();
        return view('projectTitleList',['supervisors'=>$data]);
    }


}