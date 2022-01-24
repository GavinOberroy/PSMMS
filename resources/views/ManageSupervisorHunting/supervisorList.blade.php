<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Supervisor Hunting</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"> </script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"> </script>

<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="app-container">
        <div class="app-header">
            <div class="app-header-left">
                <span class="app-icon"></span>
                <img src="https://www.ump.edu.my/download/logo-ump-jawi-2021.png" alt=""
                    style="width:180px;height:101.25px;">
                <div class="search-wrapper">
                    <form type="get" action="{{ url('/search') }}">
                    <input class="search-input" name="query" type="search" placeholder="Search">
                    <button class="btn" style="display: none;"><i class="fa fa-home"></i></button>
                    </form>
                    
                </div>
            </div>
                <div class="app-header-right">
                    <button class="notification-btn">
                        <a style="text-decoration: none;" href="{{ url('logout') }}">Logout</a>
                        <img src="assets/logout.png" height="30" width="30">
                    </button>
                    <!-- Profile Button -->
                    <button class="profile-btn" onclick="location.href='{{ url('/studentProfile')}}'">
                        <img src="https://assets.codepen.io/3306515/IMG_2025.jpg" /> &nbsp
                        <span>{{ Auth::user()->name }}</span>
                    </button>
                </div>

            <button class="messages-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-message-circle">
                    <path
                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                </svg>
            </button>
        </div>

        <!-- SIDE BAR -->
        <div class="app-content">
            <div class="app-sidebar">
                <a href="{{ url('studentDashboard') }}" class="app-sidebar-link">
                    <img src="assets/home.png" alt="" height="25" width="25">
                </a>
                <a href="{{ url('supervisorList') }}" class="app-sidebar-link">
                    <img src="assets/supervisor.png" alt="" height="30" width="30">
                </a>
                <a href="{{url('titleList')}}" class="app-sidebar-link"> 
                    <img src="assets/proposal.png" alt="" height="25" width="25">
                </a>
                <a href="{{url('/AddProgress')}}" class="app-sidebar-link"> 
                    <img src="assets/book.png" alt="" height="25" width="25">
                </a>
                <a href="{{ route('ManageProposal.ProposalForm') }}" class="app-sidebar-link" title="Create Proposal For Student">
                    <img src="assets/logbook.png" alt="" height="25" width="25">
                </a>
            </div>


            <div class="projects-section">
                <br>
                <div class="projects-section-line">
                    <div class="projects-status">
                        <div class="item-status">
                            <span class="status-number">{{$count = DB::table('lecturer')->count();}}</span>
                            <span class="status-type">Supervisor</span>
                        </div>

                    </div>

                    <div class="view-actions">
                        <button class="view-btn grid-view active" title="Grid View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7" />
                                <rect x="14" y="3" width="7" height="7" />
                                <rect x="14" y="14" width="7" height="7" />
                                <rect x="3" y="14" width="7" height="7" />
                            </svg>
                        </button>
                    </div>
                </div>


                <div id=supervisorList class="project-boxes jsGridView">


                    @foreach($lecturers as $lecturer)
                    <a style="text-decoration:none; color: black;">
                        <div class="project-box-wrapper">
                            <div class="project-box" style="background-color: #dbf6fd;">
                                <div class="project-box-content-header">
                                    <img src="data:image/jpg;base64,{{ chunk_split(base64_encode($lecturer->Lecturer_Image)) }}"
                                        style="border-radius: 40px; object-fit: cover;" height="200px" width="200px" />
                                    <p class="box-content-header">{{$lecturer->Lecturer_Name}}</p>
                                    <p class="box-content-subheader">{{$lecturer->Lecturer_Email}}</p>
                                </div>
                                <div class="menu effect-12">
                                    <ul>
                                        <li><button type="button" class="btn btn-primary m-2" onclick="location.href='{{"ProposalForm"}}'">Book</button> </li>
                                        &nbsp;
                                        <li><button type="button" class="btn btn-primary m-2" onclick="location.href='{{"supervisorDetail/".$lecturer->Lecturer_ID }}'">Detail</button></li>

                                    </ul>
                                </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    </div>

    </div>
    </div>

    {{-- <!-- Modal Example Start-->
			<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria- 
            labelledby="demoModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="demoModalLabel">Modal Example - 
                             Websolutionstuff</h5>
								<button type="button" class="close" data-dismiss="modal" aria- 
                                label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
								Welcome, Websolutionstuff !!
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>
	 <!-- Modal Example End--> --}}


    <!-- partial -->
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        
</body>

</html>