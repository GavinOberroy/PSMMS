<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        Proposal::where('id',$id)->update(['status'=> $request->status]);
        return back();
    }
}
