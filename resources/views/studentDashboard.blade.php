<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
                <button class="notification-btn">
                    <a href="{{ url('logout') }}">Logout</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-bell">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                        <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                    </svg>
                </button>
                <!-- Profile Button -->
                <button class="profile-btn" onclick="location.href='{{ url('studentProfile') }}'">
                    <img src="https://assets.codepen.io/3306515/IMG_2025.jpg" /> &nbsp
                    <span>{{ Auth::user()->name }}</span>
                </button>
            </div>
        </div>

        <!-- SIDE BAR -->
        <div class="app-content">
            <div class="app-sidebar">
                <a href="studentDashboard" class="app-sidebar-link active">
                    <img src="assets/home.png" alt="" height="25" width="25">
                </a>
                <a href="supervisorList" class="app-sidebar-link">
                    <img src="assets/supervisor.png" alt="" height="30" width="30">
                </a>
                <a href="viewTitle" class="app-sidebar-link">
                    <img src="assets/proposal.png" alt="" height="25" width="25">
                </a>
                <a href="logbook" class="app-sidebar-link">
                    <img src="assets/book.png" alt="" height="25" width="25">
                </a>
            </div>


            <div class="projects-section">

                <div class="projects-section-line">
                    <div class="projects-status">
                        <div class="item-status">
                            <span class="status-type" style="font-size: x-large;">Dashboard</span>
                        </div>
                    </div>
                </div>
                <br>

                <div class="grid-container">
                    <div class="item1">
                        <div class="welcome">
                            <div class="greeting">
                                <h3>Hi&nbsp;<span>{{ Auth::user()->name }}</span>,</h3>
                            </div>
                            <h1>Welcome to PSMMS</h1>
                            <h3>Don't forget to do your homework</h3>
                            <div>
                                <img src="" alt="">
                            </div>
                        </div>

                        <br>

                        <div class="welcome">

                            <div>
                                <h2>Chapter 1 submission</h2>
                                <div class="countdown-container">
                                    <div class="cont-el days-c">
                                        <p class="big-text" id="days">0</p>
                                        <span>days</span>
                                    </div>
                                    <div class="cont-el hours-c">
                                        <p class="big-text" id="hours">0</p>
                                        <span>hours</span>
                                    </div>
                                    <div class="cont-el mins-c">
                                        <p class="big-text" id="mins">0</p>
                                        <span>mins</span>
                                    </div>
                                    <div class="cont-el secondss-c">
                                        <p class="big-text" id="seconds">0</p>
                                        <span>seconds</span>
                                    </div>
                                </div>
                            </div>
                            <div style="visibility: hidden;">
                                <input type="date" class="date" id="date">
                            </div>
                        </div>
                    </div>
                    <div class="item2">
                        <ul class="timeline">

                            <!-- Item 1 -->
                            <li>
                                <div class="direction-r">
                                    <div class="flag-wrapper">
                                        <span class="flag">Freelancer</span>
                                        <span class="time-wrapper"><span class="time">2013 - present</span></span>
                                    </div>
                                    <div class="desc">My current employment. Way better than the position before!</div>
                                </div>
                            </li>

                            <!-- Item 2 -->
                            <li>
                                <div class="direction-l">
                                    <div class="flag-wrapper">
                                        <span class="flag">Apple Inc.</span>
                                        <span class="time-wrapper"><span class="time">2011 - 2013</span></span>
                                    </div>
                                    <div class="desc">My first employer. All the stuff I've learned and projects I've
                                        been working on.</div>
                                </div>
                            </li>

                            <!-- Item 3 -->
                            <li>
                                <div class="direction-r">
                                    <div class="flag-wrapper">
                                        <span class="flag">Harvard University</span>
                                        <span class="time-wrapper"><span class="time">2008 - 2011</span></span>
                                    </div>
                                    <div class="desc">A description of all the lectures and courses I have taken and my
                                        final degree?</div>
                                </div>
                            </li>

                        </ul>
                    </div>


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
        //for the countdown
        var newYears = '2 Jan 2022'
        const dayEl = document.getElementById('days')
        const hourEl = document.getElementById('hours')
        const minsEl = document.getElementById('mins')
        const secondeEl = document.getElementById('seconds')
        const changeDate = document.getElementById('date')
        changeDate.addEventListener('change', myChange)
        function countdown() {
            const newYearsDate = new Date(newYears)
            const currentDate = new Date()
            const totalsecond = (newYearsDate - currentDate) / 1000
            const days = Math.floor(totalsecond / 3600 / 24)
            const hours = Math.floor(totalsecond / 3600) % 24
            const minutes = Math.floor(totalsecond / 60) % 60
            const second = Math.floor(totalsecond % 60)
            dayEl.innerHTML = time(days);
            hourEl.innerHTML = time(hours);
            minsEl.innerHTML = time(minutes);
            secondeEl.innerHTML = time(second);
        }
        function time(time) {
            if (time < 10) {
                return `0${time}`
            } else {
                return time
            }
        }
        function myChange() {
            const change = document.getElementById('date').value
            newYears = change
            console.log(change)
        }
        //countdown ();
        setInterval(countdown, 1000)
    </script>

</body>

</html>