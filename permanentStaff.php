<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Claire Yue Xiao, Huaxing Zhang, and Kochapon Ussavaphark" />
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
  <link rel="icon" href="images/favicon.ico">
    <!-- bootstrap css style-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- bootstrap collapse menu button style-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <!--self created css style-->
    <link rel="stylesheet" href="styles/style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sacramento&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=VT323&display=swap"
        rel="stylesheet">
    <script src="script/staff_details.js"></script>
    <title>Permanent Staff</title>
</head>
<body>
    
    <div class="container">
        <div id="title">
            <div class="container-fluid">

                <!-- Navigation Bar -->

                <nav class="navbar navbar-expand-lg navbar-dark">

                    <a class="navbar-brand" href="index.html"><img src="images/CorpU.png" alt="CorpU Logo"
                            class="corpuLogo">CorpU</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="staff_details.php">Home</a>
                            </li>                                                       
                            <li class="nav-item">
                                <a class="nav-link" href="permanentlogout.php">Logout</a>
                            </li>                            
                        </ul>
                    </div>
                </nav>                
            </div>
        </div>
        <!-- permanent staff detail listing part --> 
        <div class="permanent-staff-show">
            <h2>Permanent Staff</h2>        
            <ul class="permanent-staff-list">
                <li><button id="show-button-1" class="show-button"><image src="" alt="">Oliver Simmons</button>
                    <div id="staff-details-oliver" class="staff">
                        <image src="images/staff/employee1_oliver.JPG" width="300" height="200"><br>
                            Name: Oliver Simmons<br />
                            Gender: M <br />
                            Date of Birth: 11/06/2001<br />
                            Address: 42 Smith Street, Fitzroy, VIC 3065<br />
                            Email: p001@gmail.com<br />
                            Phone Number: 04560998998<br />
                            Teaching Courses: cos80022<br />
                        <button id="close-button-1" class="close-button">Close</button> <br />
                    </div>
                </li>
                <li><button id="show-button-2" class="show-button"><image src="" alt="">Gianna Williams</button>
                    <div id="staff-details-gianna" class="staff">
                    <image src="images/staff/employee2_gianna.JPG" width="300" height="200"><br>
                        Name: Gianna Williams<br />
                        Gender: F <br />
                        Date of Birth: 31/01/1990<br />
                        Address: 17 High Street, Prahran, VIC 3181<br />
                        Email: p002@gmail.com<br />
                        Phone Number: 0450887887<br />
                        Teaching Courses: cos60004<br />
                        <button id="close-button-2" class="close-button">Close</button> <br />
                    </div>
                </li>
                <li><button id="show-button-3" class="show-button"><image src="" alt="">Ling Lin</button>
                    <div id="staff-details-ling" class="staff">
                    <image src="images/staff/employee3_ling.JPG" width="300" height="200"><br>    
                        Name: Ling Lin<br />
                        Gender: M <br />
                        Date of Birth: 23/06/1985<br />
                        Address: 91 Elizabeth Street, Melbourne, VIC 3000<br />
                        Email: p003@gmail.com<br />
                        Phone Number: 0450776776<br />
                        Teaching Courses: cos60008<br />
                        <button id="close-button-3" class="close-button">Close</button> <br />
                    </div>
                </li>
                <li><button id="show-button-4" class="show-button"><image src="" alt="">Parul Bhavsar</button>
                    <div id="staff-details-parul" class="staff">
                    <image src="images/staff/employee4_parul.JPG" width="300" height="200"><br>    
                        Name: Parul Bhavsar<br />
                        Gender: F <br />
                        Date of Birth: 13/10/1995<br />
                        Address: 28 Brunswick Road, Brunswick East, VIC 3057<br />
                        Email: p004@gmail.com<br />
                        Phone Number: 0450665665<br />
                        Teaching Courses: cos70004<br />
                        <button id="close-button-4" class="close-button">Close</button> <br />
                    </div>
                </li>             
                <li><button id="show-button-5" class="show-button"><image src="" alt="">Kyle Piccio</button>
                    <div id="staff-details-kyle" class="staff">
                    <image src="images/staff/employee5_kyle.JPG" width="300" height="200"><br>    
                        Name: Kyle Piccio<br />
                        Gender: M <br />
                        Date of Birth: 10/12/1992<br />
                        Address: 6 Station Street, Fairfield, VIC 3078<br />
                        Email: p005@gmail.com<br />
                        Phone Number: 0450554554<br />
                        Teaching Courses: cos60009<br />
                        <button id="close-button-5" class="close-button">Close</button> <br />
                    </div>
                </li>
                </ul>
        </div>
        <!-- footer -->        
        <div class="bottom-container">
            <footer>
                <p class="copyright-declaration">© CorpU</p>
                <a class="footer-link" href="contact.html">Contact Us</a>        
            </footer>
        </div>
    </div>
    
</body>
</html>