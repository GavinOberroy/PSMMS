<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $role=Auth::user()->role;

        if($role=='1')
        {
            return view('lecturerDashboard');
        }

        else if($role=='2')
        {
            //buat sini
            //$data = DB::table('supervisors')->where('id', Auth::user()->id)->first();
            //dd($data);
            //return view('mana2',['supervisors' => $data]);
            return view('studentDashboard');
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
        $data->password=bcrypt($request->password);

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
