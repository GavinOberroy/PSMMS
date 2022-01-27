<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    //Show all proposal submitted from student
    public function showAllSubmittedProposal()
    {
        $proposals=Proposal::where('lecturer_email',Auth::user()->email)->get();
        return view('ManageProposal.LecturerProposal',compact('proposals'));
    }

    //change proposal status
    public function changeStatus(Request $request,$id)
    {
        $proposal = Proposal::find($id);
        Proposal::where('id',$id)->update(['Proposal_Status'=> $request->status]);
        return back();
    }

    //show proposal detail
    public function showDetail($id)
    {
        $proposal=Proposal::find($id);
        return view('ManageProposal.ProposalDetail',compact('proposal'));
    }

    //show proposal submit form
    public function create()
    {
        return view('ManageProposal.ProposalForm');
    }

    //save proposal input form
    public function store(Request $request)
    {
 
        $data=new Proposal();
        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets.file',$filename);
        $data->file=$filename;

        $data->Student_Name=$request->Student_Name;
        $data->Student_ID=$request->Student_ID;
        $data->SV_Name=$request->SV_Name;
        $data->Proposal_Title=$request->Proposal_Title;
        $data->lecturer_email=$request->lecturer_email;
        $data->Proposal_Type=$request->Proposal_Type;
        $data->save();
        return redirect()->route('ManageProposal.ProposalForm')->with('message',"Your Proposal has bee added sucessfully");
 
    }

    //delete proposal
    public function destroy($id)
        {
            $proposal=Proposal::findOrFail($id);
            $proposal->delete();
            return back()->with('message','Proposal has been delete sucessfully');
        }
    
    //download proposal doc
    public function download(Request $request,$file)
        {   
            return response()->download(public_path('assets.file/'.$file));
        }

    //view proposal doc
     public function view($id)
        {
            $data=Proposal::find($id);
     
            return view('ManageProposal.ViewDocProposal',compact('data'));
     
     
        }

}


