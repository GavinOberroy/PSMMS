@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="card ">
            
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Proposal_Title </th>
                                    <th scope="col">Proposal_Type </th>
                                    <th scope="col">Proposal Status</th>
                                    <th scope="col">View<br>Detail</th>
                                    <th scope="col">Accept</th>
                                    <th scope="col">Reject</th>
  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proposals as $proposal)
                                    <tr>
                                        <td>{{ $proposal->id}}</td>
                                        <td>{{ $proposal->Student_ID}}</td>
                                        <td>{{ $proposal->Proposal_Title }}</td>
                                        <td>{{ $proposal->Proposal_Type}}</td>
                                        <td>{{ $proposal->Proposal_Status}}</td>
                                        <td>link</td>
                                        <form action="{{ route('ManageProposal.status',$proposal->id) }}" method="post">@csrf
                                            <td>
                                                <input name="status" type="submit" value="accepted"
                                                    class="btn btn-primary btn-sm">
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