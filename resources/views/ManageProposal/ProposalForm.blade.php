@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if ($message =session('message'))
                    <div class="alest alert-success"><h5>{{ $message }}</h5></div>
                  @endif
                    <div class="card-header">Proposal Form<br>
                        </div>
                    
                    <form action="{{ route('proposal.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" class="form-control" name="Student_Name" placeholder="student name">
                            </div>

                            <div class="form-group">
                                <label for="name">NO. MATRIK (MATRIC ID)</label>
                                <input type="text" class="form-control" name="Student_ID" placeholder="student Id">
                            </div>

                            <div class="form-group">
                                <label for="name">SUPERVISOR</label>
                                <input type="text" class="form-control" name="SV_Name" placeholder="supervisor name for psm">
                            </div>

                            <div class="form-group">
                                <label for="name">PROJECT TITLE</label>
                                <input type="text" class="form-control" name="Proposal_Title" placeholder="project title">
                            </div>

                           
                            <div class="form-group">
                                <label for="description">PSM Category</label>
                                <select class="form-control" name="Proposal_Type">
                                    <option value=""></option>
                                    <option value="Project-Based">Project-Based</option>
                                    <option value="Research-Based">Research-Based</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">PROJECT DOC</label>
                                <input type="file" class="form-control" name="file" placeholder="file">
                            </div>
                         
                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit">Submit</button>
                            </div>
                            <hr>
                            <div class="form-group text-center">
                                <div class="col-md-12 text-center">
                                    <a href="{{ url('/redirects') }}" class="btn btn-info">Back Home</a>
                                </div>
                              </div>
                        </div>
                      

                </div>
                <br><br>
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