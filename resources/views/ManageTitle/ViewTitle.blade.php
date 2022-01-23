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
                <button class="notification-btn">
                    <a style="text-decoration: none;" href="{{ url('logout') }}">Logout</a>
                    <img src="/assets/logout.png" height="30" width="30">
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

             @foreach($titles as $title)
            <div class="projects-section">
                <br>
                <div class="projects-section-line">
                    <div class="projects-status">
                    
                        <div class="item-status">
                            <span class="status-number">View Title</span>
                            
                        <br>
                        <a style="text-decoration:none; color: black;">
                         <div class="project-box-wrapper">
                         <div class="project-box" style="background-color: #dbf6fd;">

                         <form method="get" action="" enctype="multipart/form-data">
                         {{ csrf_field() }}
                        <div class="box-content-subheader">
                             <label for="Title_Name" class="col-sm-3 col-form-label"><b>PROJECT TITLE :</b></label>
                             <div class="input--style-5">
                                <p class="box-content-header"><?php echo $title->Title_Name; ?></p>    
                             </div>
                        </div>
                        <br>
                        <div class="box-content-subheader">
                            <label for="Title_Type" class="col-sm-3 col-form-label"><b>PROJECT TYPE :</b></label>
                            <div class="input--style-5">
                            <p class="box-content-header"><?php echo $title->Title_Type; ?></p>  
                            </select>
                            </div>
                        </div>
                        <br>
                        <div class="box-content-subheader">
                            <label for="Title_Description" class="col-sm-3 col-form-label"><b>PROJECT DESCRIPTION :</b></label>
                            <div class="input--style-5">
                            <p class="box-content-header"><?php echo $title->Title_Description; ?></p>  
                        </div>
                        <br>
                        </div>
                        <div class="box-content-subheader">
                            <label for="Required_Skill" class="col-sm-3 col-form-label"><b>SKILLS REQUIRED (SPECIFIC TO THE PROJECT) :</b></label>
                            <div class="input--style-5">
                            <p class="box-content-header"><?php echo $title->Required_Skill; ?></p> 
                        </div>
                        <div class="menu effect-12" style="height: 10px; width:100px;">        
                        <ul>
                            <li><a href="/editTitle/{{$title->Title_ID}}">Edit</a></li>
                        </ul>
                        </div>

                        <br>
                        </div>

                        

                    </form>
                    
                         </div>
                         </div>
                         
                         </a>
                        </div>

                    </div>


                    
                </div>


                <div id=viewTitle class="project-boxes jsGridView">

                    
                
            </div>
            @endforeach  
           
        </div>
    </div>

    </div>

    </div>
    </div>


    <!-- partial -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

</body>

</html>