<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;

class ProposalController extends Controller
{
    public function showAllSubmittedProposal()
    {
        $proposals=Proposal::all();
        return view('ManageProposal.LectureProposal',compact('proposals'));
    }
}
