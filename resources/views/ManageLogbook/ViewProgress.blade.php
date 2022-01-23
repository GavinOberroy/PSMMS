<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Logbook Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
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
/For the count down/
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
        th, td {
        padding: 30px;
        }
        
        tr:first-of-type {
        border-bottom: 1px solid black;
        }

        td{
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
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

        .grid-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 20px;
        height: 80px;
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
                <button class="profile-btn">
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
                <a href="dashboard" class="app-sidebar-link">
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

                <div class="projects-section">
            <br>
                <div class="projects-section-line">
                    <div class="projects-status">
                    
           
                        <div class="item-status">
                            <span class="status-number">View Logbook </span>
                            
                        <br>    
                        <a style="text-decoration:none; color: black;">
                         <div class="project-box-wrapper">
                         <div class="project-box" style="background-color: #dbf6fd;">
                         
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    
                                    <!--<th scope="col">ID</th>-->
                                    <th scope="col">Week</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Current Progress</th>
                                    <th scope="col">Upcoming Progress</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Student ID</th>
                                    <th scope="col">Student Email</th>
                                   
                                </tr>


                <div id=ViewProgress class="project-boxes jsListView">

        

                    @foreach($logbooks as $row)
                                    <tr>
                                        <!--<td>{{$row->Logbook_ID}}</td>-->
                                        <td>{{$row->Logbook_Week}}</td>
                                        <td>{{$row->Logbook_Date}}</td>
                                        <td>{{$row->Logbook_Time}}</td>
                                        <td>{{$row->Current_Progress}}</td>
                                        <td>{{$row->Upcoming_Progress}}</td>
                                        <td>{{$row->Student_Name}}</td>
                                        <td>{{$row->Student_ID}}</td>
                                        <td>{{$row->Student_Email}}</td>
                                        
                                        <td><div class="menu effect-12" style="height: 10px; width:100px;">        
                                        <ul>
                                        <li><a href="/editProgress/{{$row->Logbook_ID}}">Edit</a></li>
                                        </ul>
                                        </div></td>
                                    </tr>
                   
                    </div>
                </div>
            </div>
            @endforeach 

                    


                   
                </div>

                    

        </div>
    </div>
            
</body>
</html>