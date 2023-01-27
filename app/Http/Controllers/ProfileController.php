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
    //testing
    public function index()
    {
        $students = DB::select('select * from student where User_ID = :id', ['id' => Auth::user()->id]);
        return view('ManageProfile.test',['students'=>$students]);
        /*$results = DB::select('select * from student where User_ID = :id', ['id' => Auth::user()->id]);
        return view('ManageProfile.test')->with('ManageProfile.test', $results);*/
    }

    //view student profile data
    public function viewStudent($Student_ID)
    {
        $students = DB::select('select * from student where Student_ID = :id', ['id' => $Student_ID]);
        return view('ManageProfile.studentProfile',['students'=>$students]);
    }
 //edit student profile
 public function editStudentProfile(Request $request){
    $studentID = $request->studentID;
    $studentName = $request->studentName;
    $studentEmail = $request->studentEmail;
    $studentPhoneNo = $request->studentPhoneNo;

    //update to the student table data 
    $updateStudent = [
        'Student_ID' => $studentID,
        'Student_Name' => $studentName,
        'Student_Email' => $studentEmail,
        'Student_PhoneNo' => $studentPhoneNo,
    ];

    //update to the student table in database
    DB::table('student')->where('Student_ID', $request->studentID)->update($updateStudent);

    return back();
    //redirect()->route('studentProfile')->with('editStudentProfile');
}
    //student view lecturer profile data
    function lecturerDetail($Lecturer_ID)
    {
        $lecturers = DB::select('select * from lecturer where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $educations = DB::select('select * from lecturer_education where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $supervisions = DB::select('select * from student where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $expertises = DB::select('select * from expertises where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        return view('ManageProfile.lecturerDetail',['lecturers'=>$lecturers, 'educations'=>$educations, 'supervisions'=>$supervisions, 'expertises'=>$expertises]);
    }

    //view lecturer profile and supervision data
    public function viewLecturer($Lecturer_ID)
    {
        //$lecturers=DB::table('lecturer')->where('Lecturer_ID',$Lecturer_ID)->get();
        $lecturers = DB::select('select * from lecturer where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $educations = DB::select('select * from lecturer_education where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $supervisions = DB::select('select * from student where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        $expertises = DB::table('expertises')->where('lecturer_email',Auth::user()->email)->get();
        return view('ManageProfile.lecturerProfile',['lecturers'=>$lecturers, 'educations'=>$educations, 'supervisions'=>$supervisions, 'expertises'=>$expertises]);
    }

    //not valid -tak jadi-
    public function viewSupervision(){
        $supervisions = DB::select('select * from student where Lecturer_ID = :id', ['id' => $Lecturer_ID]);
        return view('ManageProfile.lecturerProfile',['supervisions'=>$supervisions]);
    }

    //edit lecturer profile
    public function editProfile(Request $request){
        $lecturerID = $request->lecturerID;
        $lecturerName = $request->lecturerName;
        $lecturerEmail = $request->lecturerEmail;
        $lecturerOfficeNo = $request->lecturerOfficeNo;
        $lecturerBiography = $request->lecturerBiography;

        //update to the lecturer table data 
        $updateLecturer = [
            'Lecturer_ID' => $lecturerID,
            'Lecturer_Name' => $lecturerName,
            'Lecturer_Email' => $lecturerEmail,
            'Lecturer_OfficeNo' => $lecturerOfficeNo,
            'Lecturer_Biography' => $lecturerBiography,
        ];

        //update to the lecturer table in database
        DB::table('lecturer')->where('Lecturer_ID', $request->lecturerID)->update($updateLecturer);

        return back();
        //redirect()->route('lecturerProfile')->with('editLecturer');
    }

    //delete education in lecturer profile 
    public function deleteEducation($id){
        $delete = DB::table('lecturer_education')->where('Education_ID', $id)->delete();

        return back();
    }

    //edit and update education in lecturer profile 
    public function editEducation(Request $eduLecturer){
        $eduID = $eduLecturer->eduID;
        $eduInfo = $eduLecturer->eduInfo;

        DB::table('lecturer_education')->where('Education_ID', $eduLecturer->eduID)->update(['Education_Info' => $eduInfo]);

        return back();
    }

    //add new education in lecturer profile 
    public function addEducation(Request $newEducation){
        $lectID = $newEducation->lectID;
        $newEdu = $newEducation->newEdu;

        $addEducation = [
            'Lecturer_ID' => $lectID,
            'Education_Info' => $newEdu,
        ];

        //insert new education to lecturer education table
        DB::table('lecturer_education')->insert($addEducation);

        return back();
    }

}
