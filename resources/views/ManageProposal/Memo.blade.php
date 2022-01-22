@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Your Proposal Status
                       
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Proposal_Title </th>
                                    <th scope="col">Proposal_Type </th>
                                    <th scope="col">Proposal Status</th>
                                    <th scope="col">Cancel Request</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proposal as $data)

                                <th>{{$no+1}}</th>
                                <td>{{$data->Student_ID->Student_Name }}</td>
                                <td>{{$proposal->Student_ID }}</td>
                                <td>{{ $proposal->Proposal_Title }}</td>
                                <td>{{ $proposal->Proposal_Type}}</td>
                                <td>{{ $proposal->Proposal_Status}}</td>
                                <form action="{{ route('ManageProposal.status',$proposal->id) }}" method="post">@csrf
                                    <td>
                                        <input name="status" type="submit" value="accepted"
                                            class="btn btn-success btn-sm">
                                    </td>
                                    <td>
                                        <input name="status" type="submit" value="rejected"
                                            class="btn btn-danger btn-sm">
                                    </td>
                                </form>
                            </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
