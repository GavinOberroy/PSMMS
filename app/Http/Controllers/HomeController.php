<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;

        if($role=='1')
        {
            $lecturers = DB::table('lecturer')->where('User_ID', Auth::user()->id)->get();
            
            return view('lecturerDashboard',compact('lecturers'));
            
        }

        else if($role=='2')
        {
            //buat sini
            //$data = DB::table('supervisors')->where('id', Auth::user()->id)->first();
            //dd($data);
            //return view('mana2',['supervisors' => $data]);

            $students = DB::table('student')->where('User_ID', Auth::user()->id)->get();
            return view('studentDashboard', compact('students'));
        }

        else
        {
            return view('welcome');
        }
    }

   

    public function studentRegistration(Request $request)
    {
        $data=new user;

        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=$request->password;

        $data->role='2';

        $data->save();

        return redirect()->back();

    }

    public function logout()
    {        
        Auth::logout();

        return redirect('/');
    }
}
