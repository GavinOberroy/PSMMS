<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use App\Models\Proposal;

class ProposalController extends Controller
{
    public function showAllSubmittedProposal()
    {
        $proposals=Proposal::orderBy('id','DESC')->get();
        return view('ManageProposal.LecturerProposal',compact('proposals'));
    }

    public function changeStatus(Request $request,$id)
    {
        $proposal = Proposal::find($id);
        Proposal::where('id',$id)->update(['Proposal_Status'=> $request->status]);
        return back();
    }

    public function showDetail($id)
    {
        $proposal=Proposal::find($id);
        return view('ManageProposal.ProposalDetail',compact('proposal'));
    }

    public function create()
    {
        return view('ManageProposal.ProposalForm');
    }

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
        $data->Proposal_Type=$request->Proposal_Type;
        $data->save();
        return redirect()->route('ManageProposal.ProposalForm')->with('message',"Your Proposal has bee added sucessfully");
 
    }

    public function index()
    {
        $proposal = Proposal::latest()->where('Student_ID',auth()->user()->id)->get();
        return view('ManageProposal.Memo',compact('proposal'));
    }

    public function destroy($id)
        {
            $proposal=Proposal::findOrFail($id);
            $proposal->delete();

            return back()->with('message','Proposal has bee delete sucessfully');
        }

    public function download(Request $request,$file)
        {   
            return response()->download(public_path('assets.file/'.$file));
        }

     public function view($id)
        {
            $data=Proposal::find($id);
     
            return view('ManageProposal.ViewDocProposal',compact('data'));
     
     
        }

}


