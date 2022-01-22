@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card ">
            
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Proposal_Title </th>
                                    <th scope="col">Proposal_Type </th>
                                    <th scope="col">Proposal Status</th>
                                    <th scope="col">Accept</th>
                                    <th scope="col">Reject</th>
                                    <th scope="col">View Details</th>
                                    <th scope="col">Delete</th>
  
                                </tr>
                            </thead>
                            <tbody>
                                @if ($message =session('message'))
                               <div class="alest alert-success"><h5>{{ $message }}</h5></div>
                               @endif
                                @foreach ($proposals as $no => $proposal)
                                    <tr>
                                        <th>{{$no+1}}</th>
                                        <td>{{$proposal->Student_Name }}</td>
                                        <td>{{$proposal->Student_ID }}</td>
                                        <td>{{ $proposal->Proposal_Title }}</td>
                                        <td>{{ $proposal->Proposal_Type}}</td>
                                        <td  width="150">{{ $proposal->Proposal_Status}}</td>
                                        <form action="{{ route('ManageProposal.status',$proposal->id) }}" method="post">@csrf
                                            <td width="150">
                                                <input name="status" type="submit" value="accepted"
                                                    class="btn btn-success btn-sm">
                                            </td>
                                            <td width="150">
                                                <input name="status" type="submit" value="rejected"
                                                    class="btn btn-danger btn-sm">
                                            </td>
                                        </form>
                                        <td width="150" ><a href="{{ route('ManageProposal.showDetail', $proposal->id )}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a></td>
                                         <td width="150">
                                        <a href="{{ route('proposal.destroy', $proposal->id)}}" class="btn-delete btn btn-sm btn-circle btn-outline-danger" title="Delete"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                <form id="form-delete" method="POST" style="display: none">
                                    @csrf
                                    @method('DELETE')
                                    </form>
                                    
                            </tbody>
                        </table>
                        <div class="form-group text-center">
                            <div class="col-md-12 text-center">
                                <a href="{{ url('/redirects') }}" class="btn btn-info">Back Home</a>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        a.list-group-item {
            font-size: 18px;
        }

        a.list-group-item:hover {
            background-color: rgb(0, 238, 255);
            color: #fff;
        }

        .card-header {
            background-color: rgb(0, 204, 255);
            color: #fff;
            font-size: 20px;
        }

    </style>
@endsection