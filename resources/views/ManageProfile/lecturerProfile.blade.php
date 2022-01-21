<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ Auth::user()->name }} Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/timelines.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <style>
        @font-face {
            font-family: dmsanR;
            src: url('font/dmsansRegular.ttf');
        }

        .welcome {
            height: 200px;
            width: 100%;
            background-color: #DBF6fd;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            padding-top: 1px;
        }

        .item2 {
            height: auto;
            width: 100%;
            background-color: #DBF6fd;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            padding-top: 1px;
            margin: 0 auto;
            padding: 10px;
        }


        .item2 h1 {
            padding-left: 20px;
            font-family: dmsanR;
        }


        .welcome h1,
        h2,
        h3 {
            padding-left: 20px;
            font-family: dmsanR;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 800px 800px;
            gap: 20px;
        }

        .grid-content {
            grid-template-columns: 800px 800px;
            gap: 20px;
        }



        /*For the count down*/
        .countdown-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .big-text {
            font-weight: bold;
            font-size: 4rem;
            line-height: 1;
            margin: 0 2rem;
        }

        .cont-el {
            text-align: center;
            width: 140px;
            margin: 0 15px;
        }

        .cont-el span {
            font-size: 1.3rem;
        }

        .date {
            margin: 85px 0 0 0;
            padding: 10px 25px;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }

        td{
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .biography{
            padding: 0px 20px;
            text-align: justify;
            line-height: 1.5;
        }
        .tab {
            overflow: hidden;
            background-color: #beeffb;
            border-radius: 10px;
            width: 100%;
            float:left;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 35px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: rgb(117, 189, 238);
        }
        
        /* Create an active/current tablink class */
        .tab button.active {
            background-color: rgb(117, 189, 238);
        }

        .edit-icon{
            background-color: #c5f0fb;
            border: none;
            border-radius: 10px;
            padding: 7px;
            font-size: 15px;
            text-align: center;
            float: right;
        }
        .item4{
            display: grid;
            grid-template-columns: auto auto auto auto;
            height: auto;
            width: 100%;
            background-color: #DBF6fd;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            padding-top: 1px;
            margin: 0 auto;
            padding: 10px;
        }

        .column-supervision{
            background-color: hsla(0, 0%, 98%, 0.548);
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            margin-right: 10px;
            text-align: center;
            margin-top: 20px;

        }

        .button-select{
            background-color: #b1ebfa;
            border: none;
        }

        .button-add{
            background-color: #d3f3fb;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .button-edit{
            background-color: #4ea6ee;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .button-delete{
            background-color: #ee4e83;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .button-add:hover,
        .button-add:focus,
        .button-delete:hover,
        .button-delete:focus,
        .button-edit:hover,
        .button-edit:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
        .modal{
            display: none; 
            position: fixed; 
            z-index: 1; 
            padding-top: 100px; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            align-content: center;
        }

        .modal-editProfile{
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
            align-content: center;
            border-radius: 30px;
        }

        /* Modal Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        input[type=text]{
            width: 100%;
            padding: 12px 20px;
            box-sizing: border-box;
            border: none;
        }
        textarea{
            width: 100%;
            height: 85px;
            box-sizing: border-box;
            border: none;
            line-height: 1.5;
            padding: 12px 20px;
        }

        .item2 textarea{
            background-color: #ffffff77;
            border-radius: 10px;
        }


        @media screen and (max-width: 767px) {
            h1 {
                font-size: 3rem;
                padding: 20px;
            }

            .countdown-container {
                flex-wrap: wrap;
            }

        }
    </style>

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
                <button class="add-btn" title="Add New Project">
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
                @foreach($lecturers as $lecturer)
                <button class="profile-btn">
                    <img src="{{ asset('/assets/img/avatars/'.$lecturer->Lecturer_Image) }}" /> &nbsp
                    <span>{{ Auth::user()->name }}</span>
                </button>
                @endforeach
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
                <a href="lecturerDashboard" class="app-sidebar-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                </a>
                <a href="main" class="app-sidebar-link active">
                    <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="feather feather-pie-chart" viewBox="0 0 24 24">
                        <defs />
                        <path d="M21.21 15.89A10 10 0 118 2.83M22 12A10 10 0 0012 2v10z" />
                    </svg>
                </a>
                <a href="viewTitle" class="app-sidebar-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-calendar">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                        <line x1="16" y1="2" x2="16" y2="6" />
                        <line x1="8" y1="2" x2="8" y2="6" />
                        <line x1="3" y1="10" x2="21" y2="10" />
                    </svg>
                </a>
                <a href="logbook" class="app-sidebar-link">
                    <svg class="link-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="feather feather-settings" viewBox="0 0 24 24">
                        <defs />
                        <circle cx="12" cy="12" r="3" />
                        <path
                            d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z" />
                    </svg>
                </a>
            </div>


            <div class="projects-section">
                <br>
                <div class="projects-section-line">
                    <div class="projects-status">
                        @foreach($lecturers as $lecturer)
                        <div class="item-status">
                            <img style="border-radius: 50%;" width="120" height="120" src="{{ asset('/assets/img/avatars/'.$lecturer->Lecturer_Image) }}" />
                        </div>
                        <div class="item-status">
                            <span class="status-number">{{$lecturer->Lecturer_Name}}</span>
                            <span class="status-email">{{$lecturer->Lecturer_Email}}</span>
                            <span class="status-faculty">Faculty of Computing</span>
                        </div>
                    </div>

                    
                </div>
                <br><br>
                <div class="projects-section-line">
                    
                    <div class="tab">
                        <button class="tablinks active" onclick="openTab(event, 'profile')">Profile</button>
                        <button class="tablinks" onclick="openTab(event, 'supervision')">Supervision</button>
                    </div>
                </div>
               
                <div style="" class="grid-content" id="profile">
                    
                    <div class="item2">
                        <div class="view-actions-edit" id="lecturerEdit">
                            <button class="edit-icon" title="Edit Profile" id="btnEditLec">
                                <img src="assets/edit.png" alt="" height="15" width="15"> Edit Profile
                            </button>
                        </div>
                        <form>
                            
                            <table>
                                <tr>
                                    <td>Name</td>
                                    <td>{{$lecturer->Lecturer_Name}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{$lecturer->Lecturer_Email}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Office Number</td>
                                    <td>{{$lecturer->Lecturer_OfficeNo}}</td>
                                </tr>
                                
                            </table>
                           <br>
                        </form>
                    </div>
                    <div class="item2">
                        <div class="view-actions-edit" id="lecturerEdit">
                            <button class="edit-icon" title="Edit Education" id="editEdu" onclick="editEducation()">
                                <img src="assets/edit.png" alt="" height="15" width="15"> Edit Education
                            </button>
                        </div>
                        
                            <div>
                                <p class="biography">Education</p>
                            </div>
                            @foreach ($educations as $education)
                            <div>
                                
                                <ul>
                                    <li class="biography">{{$education->Education_Info}} </li>  
                                </ul>
                            </div>
                            @endforeach
                            
  
                    </div>
                    <div class="item2">
                        <form>
                            <div>
                                <p class="biography">Biography</p>
                            </div>
                            <div>
                                <p class="biography">{{$lecturer->Lecturer_Biography}}</p>
                            </div>
                            
                            @endforeach 
                        </form> 
                    </div>

                    <!-- Edit Education -->
                    <div style="display: none;" class="item2" id="education">
                        @foreach ($educations as $education)
                        <form>
                            <table>
                                <tr>
                                    <td><textarea class="education-field">{{$education->Education_Info}}</textarea></td>
                                    <td><input class="button-edit" type="submit" value="Edit">
                                        <input class="button-delete" type="submit" value="Delete">
                                    </td>
                                </tr>
                            </table>    
                        </form>
                        @endforeach
                    </div>
                    <br>
                    <br>
                </div>

                

                <!-- Supervision Tab -->
                <div style="display: none; grid-template-columns: auto;" class="grid-content" id="supervision">
                    <div class="item4">
                        @foreach($supervisions as $supervision)
                        <div class="column-supervision">
                            <span><img style="border-radius: 50%;" width="120" height="120" src="{{ asset('/assets/img/avatars/'.$supervision->Student_Image) }}"></span>
                            <br>
                            <span class="box-content-header">{{$supervision->Student_Name}}</span>
                            <span class="box-content-subheader">{{$supervision->Student_ID}}</span>
                            <span class="box-content-subheader">{{$supervision->Student_Email}}</span>
                            <span>
                                <a style="text-decoration: none; font-size: 18px; color:#5f9ef0" href=""><b>view profile</b></a>
                            </span>
                        </div>
                        
                        @endforeach
                    </div>
                    
                    
                </div>

                <!-- End of Supervision Tab -->
            </div>


            <!-- Edit Profile Details Modal -->
            <div class="modal" id="editModal">
                <div class="modal-editProfile">
                    <span class="close">&times;</span>
                    <!--<img style="border-radius: 50%; align: center;" width="170" height="170" src="{{ asset('/assets/img/avatars/'.$lecturer->Lecturer_Image) }}" /> -->
                    <form action="{{ route('editProfile') }}" method="POST">@csrf
                    <table style="width: 100%;">
                        <tr>
                            <td><b>Profile Details</b></td>
                            <td><input type="hidden" name="lecturerID" value="{{$lecturer->Lecturer_ID}}"></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><input name="lecturerName" type="text" value="{{$lecturer->Lecturer_Name}}"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input name="lecturerEmail" type="text" value="{{$lecturer->Lecturer_Email}}"></td>
                        </tr>
                        <tr>
                            <td>Office Number</td>
                            <td><input name="lecturerOfficeNo" type="text" value="{{$lecturer->Lecturer_OfficeNo}}"></td>
                        </tr>
                        <tr>
                            <td>Biography</td>
                            <td><textarea name="lecturerBiography">{{$lecturer->Lecturer_Biography}}</textarea></td>
                        </tr>
                        <tr>
                            <td><input class="button-add" name="editLecturerprofile" type="submit" value="Update Profile"></td>
                            <td></td>
                        </tr>
                    </table>
                    </form>
                   
                </div>
            </div> 
             
        </div>
    </div>

    </div>

    </div>
    </div>


    <!-- partial -->
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script>
        document.getElementById("profile").style.display = "grid";
        document.getElementById("lecturerEdit").style.display = "none";

        var role;
        role = {{ Auth::user()->role }};

        if(role==1){
            document.getElementById("lecturerEdit").style.display = "block";
        }

        // Function open tab in the profile
        function openTab(evt, tabName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("grid-content");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(tabName).style.display = "grid";
          evt.currentTarget.className += " active";
        }

        // Function to open tab edit education
        function editEducation(){
           var q = document.getElementById("education");
             if (q.style.display == "none"){
                 q.style.display = "grid";
            } else {
                 q.style.display = "none";
            }
        }

        // Get the modal
        var modalEdit = document.getElementById("editModal");

        // Get the button that opens the modal
        var editBtn = document.getElementById("btnEditLec");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        editBtn.onclick = function() {
            modalEdit.style.display = "block";
        }

        //close the modal
        span.onclick = function() {
            modalEdit.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modalEdit) {
                modalEdit.style.display = "none";
            }
        }

    </script>
           

</body>
</html>