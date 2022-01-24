<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
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
                    <input class="search-input" type="text" placeholder="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-search"
                        viewBox="0 0 24 24">
                        <defs></defs>
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </div>
            </div>
            <div class="app-header-right">
                <button class="mode-switch" title="Switch Theme">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
                <button class="add-btn" title="Add New Title">
                    <svg class="btn-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-plus">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </button>
                <button class="notification-btn" onclick="window.location.href='/logout'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                        <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                </button>
                <!--<button class="profile-btn">
                    <img src="https://assets.codepen.io/3306515/IMG_2025.jpg" /> &nbsp
                    <span>{{ Auth::user()->name }}</span>
                </button>-->
            </div>
            <button class="messages-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-message-circle">
                    <path
                        d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
                </svg>
            </button>
             <!-- Profile Button -->
             <button class="profile-btn">
                    <img src="https://assets.codepen.io/3306515/IMG_2025.jpg" /> &nbsp
                    <span>{{ Auth::user()->name }}</span>
                </button>
        </div>
        <!-- SIDE BAR -->
        <div class="app-content">
            <div class="app-sidebar">
                <a href="{{url('lecturerDashboard')}}" class="app-sidebar-link">
                    <img src="/assets/home.png" alt="" height="25" width="25">
                </a>
                <a href="{{url('lecturerProjectTitle')}}" class="app-sidebar-link">
                    <img src="/assets/title.png" alt="" height="25" width="25">
                </a>
                <a href="{{ route('ManageProposal.LecturerProposal') }}" class="app-sidebar-link" title="List Submitted Proposal For Lecturer">
                    <img src="/assets/book.png" alt="" height="25" width="25">
                </a>
                <a href="{{url('superviseeLogbook')}}" class="app-sidebar-link"> 
                    <img src="/assets/proposal.png" alt="" height="25" width="25">
                </a>
            </div>

            
            <div class="projects-section">
                <br>
                
                <div class="projects-section-line">
                    <div class="projects-status">
                    
                        <div class="item-status">
                            <span class="status-number">Edit Title</span>
                            
                        <br>
                        <a style="text-decoration:none; color: black;">
                         <div class="project-box-wrapper">
                         <div class="project-box" style="background-color: #dbf6fd;">
                            @foreach($titles as $title)    
                         <form method="post" action="/updateTitle/{{$title->Title_ID}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="box-content-subheader">
                             <label for="Title_Name" class="col-sm-3 col-form-label"><b>PROJECT TITLE :</b></label>
                             <div class="input--style-5">
                                <input  name="Title_Name" type="text" class="form-control" style="height: 30px; width:1000px;" value="{{$title->Title_Name}}">   
                             </div>
                        </div>
                        <br>
                        <div class="box-content-subheader">
                            <label for="Title_Type" class="col-sm-3 col-form-label"><b>PROJECT TYPE :</b></label>
                            <div class="input--style-5">
                            <input name="Title_Type" type="text" class="form-control" style="height: 30px; width:1000px;"  value="{{$title->Title_Type}}">
                        
                        
                            </select>
                            </div>
                        </div>
                        <br>
                        <div class="box-content-subheader">
                            <label for="Title_Description" class="col-sm-3 col-form-label"><b>PROJECT DESCRIPTION :</b></label>
                            <div class="input--style-5">
                            <input name="Title_Description" type="text" class="dropdown-item" style="height: 100px; width:100%;" value="{{$title->Title_Description}}"></p>  
                                <i class="fa fa-edit"></i>
                        </div>
                        <br>
                        </div>
                        <div class="box-content-subheader">
                            <label for="Required_Skill" class="col-sm-3 col-form-label"><b>SKILLS REQUIRED (SPECIFIC TO THE PROJECT) :</b></label>
                            <div class="input--style-5">
                            <input name="Required_Skill" type="text" class="form-control" style="height: 30px; width:100%;" value="{{$title->Required_Skill}}"></p>  
                        </div>
                        <br>
                        </div>
                        @endforeach
                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-primary m-2">Save Title</button>
        
                            </div>
                        </div>
                    </form>
                    
                    

                         </div>
                         </div>
                         </a>
                        </div>
                    </div>


                    
                </div>
                

                <div id=editTitle class="project-boxes jsGridView">

                    
                
            </div>
             
           
        </div>
    </div>

    </div>

    </div>
    </div>


    <!-- partial -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

</body>

</html>