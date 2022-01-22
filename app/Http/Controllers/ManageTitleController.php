<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Title;
use App\Models\User;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ManageTitleController extends Controller
{
    //
    function show()
    {
        $title = titleModel::all();
        return view('TitleList',['supervisors'=>$title]);
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