@extends('layouts.app')

@section('content')
<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-title">
              <strong>Proposal Details</strong>
            </div>           
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                    
                  <div class="form-group row">
                    <label for="student_name" class="col-md-4 col-form-label">Student Name</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $proposal->Student_Name}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="student_id" class="col-md-4 col-form-label">Student Id</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $proposal->Student_ID}}</p>
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="Proposal_title" class="col-md-4 col-form-label">Proposal Title</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $proposal->Proposal_Title}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="Proposal_title" class="col-md-4 col-form-label">Proposal Type</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $proposal->Proposal_Type}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="SV_name" class="col-md-4 col-form-label">PSM Supervisor Name</label>
                    <div class="col-md-9">
                      <p class="form-control-plaintext text-muted">{{ $proposal->SV_Name}}</p>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="SV_name" class="col-md-4 col-form-label">Doc</label>
                    <div class="col-md-9">
              
                      <a href="{{route('proposalDoc.download',$proposal->file)}}">
                        <button class="btn btn-info mb-1">Download Document</button>
                    </a>
                    </div>
                  </div>
                  

                  <hr>
                  <div class="form-group row mb-0">
                    <div class="col-md-12 text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-info">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
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