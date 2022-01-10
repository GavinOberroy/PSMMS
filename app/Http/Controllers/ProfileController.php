<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function viewStudent()
    {
        
        return view('ManageProfile.studentProfile');
    }

    public function show()
    {
        
    }
}
