@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
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
                                    <option value="projectbased">Project-Based</option>
                                    <option value="researchbased">Research-Based</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">PROJECT DOC</label>
                                <input type="file" class="form-control" name="file" placeholder="file">
                            </div>
                         
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
@endsection