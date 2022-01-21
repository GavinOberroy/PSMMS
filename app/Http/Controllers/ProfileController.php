<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $students = DB::select('select * from student where User_ID = :id', ['id' => Auth::user()->id]);
        return view('ManageProfile.test',['students'=>$students]);
        /*$results = DB::select('select * from student where User_ID = :id', ['id' => Auth::user()->id]);
        return view('ManageProfile.test')->with('ManageProfile.test', $results);*/
    }

    //view student profile data
    public function viewStudent()
    {
        $students = DB::select('select * from student where User_ID = :id', ['id' => Auth::user()->id]);
        return view('ManageProfile.studentProfile',['students'=>$students]);
    }

    //view lecturer profile and supervision data
    public function viewLecturer()
    {
        $lecturers = DB::select('select * from lecturer where User_ID = :id', ['id' => Auth::user()->id]);
        $educations = DB::select('select * from lecturer_education where Lecturer_ID = :id', ['id' => '0159']);
        $supervisions = DB::select('select * from student where Lecturer_ID = :id', ['id' => '0159']);//masalah dia kat sini sbb id paggil yg user, kene panggil id dlm table lecturer! cari solution ni kekgi!
        return view('ManageProfile.lecturerProfile',['lecturers'=>$lecturers, 'educations'=>$educations, 'supervisions'=>$supervisions]);
    }

    public function viewSupervision(){
        $supervisions = DB::select('select * from student where Lecturer_ID = :id', ['id' => Auth::user()->id]);
        return view('ManageProfile.lecturerProfile',['supervisions'=>$supervisions]);
    }

    public function editProfile(Request $request){
        $lecturerID = $request->lecturerID;
        $lecturerName = $request->lecturerName;
        $lecturerEmail = $request->lecturerEmail;
        $lecturerOfficeNo = $request->lecturerOfficeNo;
        $lecturerBiography = $request->lecturerBiography;

        //update to the lecturer table in database
        $updateLecturer = [
            'Lecturer_ID' => $lecturerID,
            'Lecturer_Name' => $lecturerName,
            'Lecturer_Email' => $lecturerEmail,
            'Lecturer_OfficeNo' => $lecturerOfficeNo,
            'Lecturer_Biography' => $lecturerBiography,
        ];

        DB::table('lecturer')->where('Lecturer_ID', $request->lecturerID)->update($updateLecturer);

        return back();
        //redirect()->route('lecturerProfile')->with('editLecturer');
    }
}
