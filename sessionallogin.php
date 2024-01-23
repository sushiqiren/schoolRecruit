<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Pengfei Li and Huaxing Zhang">
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

<?php
    // set up session to trace back sessional staff login status and sessional ID and error message
    session_start();
    if (!isset($_SESSION["sessionalloggedIn"])) {
        $_SESSION["sessionalloggedIn"] = false;
    }
    if (!isset($_SESSION["sessionalID"])) {
        $_SESSION["sessionalID"] = "";
    }
    if (!isset($_SESSION["sessionalError"])) {
        $_SESSION["sessionalError"] = "";
    }    

    

if (isset($_POST["sessionalsubmit"])) {
    require_once("settings.php"); // connection info
    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );
    // checks if connection is successful
    if (!$conn) {
        // Display an error message
        echo "<p>Database connection failure</p>";
    } else {
        // upon successful connection
        $sql_table = "Sstaff_login";

        $username = trim($_POST["sessionaluser"]);
        $username = stripslashes($username);
        $username = htmlspecialchars($username);

        $password = trim($_POST["sessionalpass"]);
        $password = stripslashes($password);
        $password = htmlspecialchars($password);

        // Set up the SQL command to query or add data into the table 
        $usernamePwdQuery = "select * from $sql_table where Username = '$username';";

        $result = @mysqli_query($conn, $usernamePwdQuery); // execute the query
        if (!$result) {
            echo "<p class=\"wrong\">Something is wrong with $usernamePwdQuery.</p>";
        }

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_object($result);
            if ($password === $row->Password) { // check password match
                header('Location: sessionalManagement.php'); // allow valid username and password input to login
                $_SESSION["sessionalloggedIn"] = true;
                $_SESSION["sessionalID"] = $row->Sstaff_no;
            } else {
                $_SESSION["sessionalError"] = "Password wrong. Please try again."; // invalid password message
            }

        } else {            
            $_SESSION["sessionalError"] = "Username does not exist. Please try again."; // invalid username message
        }        
        // close the database connection
        mysqli_close($conn);        
        } // if successful database connection
    }
?>
    <!-- sessional staff login portal -->
    <div class="SessionalStaffLogin">
        <h2>Sessional Staff Login</h2>
            
            <form class="modal-content animate" action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = "POST">
                <div class="imgcontainer">
                    <img src="images/CorpU.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <?php
                    if (isset($_SESSION["sessionalError"])) {
                        echo "<p class=\"wrong\">", $_SESSION["sessionalError"], "</p>"; // show invalid input error message
                    }
                    unset($_SESSION["sessionalError"]); 
                    ?>
                    <label for="sessionaluser"><b>Sessional Staff Username</b></label>
                    <input type="text" placeholder="Enter Username" name="sessionaluser" id="sessionaluser" required>
    
                    <label for="sessionalpass"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="sessionalpass" id="sessionalpass" required>
    
                    <input type="submit" class= "btn" value = "Login" name="sessionalsubmit">
                </div>    
                
            </form>
        
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
