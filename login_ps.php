<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Pengfei Li, Huaxing Zhang, Kochapon Ussavaphark">
        <meta charset="utf-8">
        
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
    <link rel="stylesheet" href="styles/style.css">
    <title>Staff Login Page</title>
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
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="jobs.html">Vacancies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="applications.html">Applications</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login_ps.php">Staff Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="applylogin.php">Applicant Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    <div id="login_psmiddle">
        <!-- Permanent staff login portal -->
        <div class="ManagementLogin">
            <h2>Permanent Staff Login</h2>

            <a href="permanentlogin.php"><button style="width:auto; border-radius: 8px;">Login</button></a>
        </div>
        <!-- Sessional staff login portal -->
        <div class="SessionalStaffLogin">
            <h2>Sessional Staff Login</h2>
        
            <a href="sessionallogin.php"><button style="width:auto; border-radius: 8px;">Login</button></a>

        </div>
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