<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author"      content="Huaxing Zhang" />
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>Applicant Login</title>

    <!-- CSS add 05/05/2023 -->
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
    <script src="script/applications.js"></script>
</head>

<?php
session_start(); // set up session
// use session to trace applicant login status and related ID number and error message
if (!isset($_SESSION["applicantloggedIn"])) {
    $_SESSION["applicantloggedIn"] = false;
}
if (!isset($_SESSION["applicantID"])) {
    $_SESSION["applicantID"] = "";
}

if (!isset($_SESSION["Applicanterror"])) {
    $_SESSION["Applicanterror"] = "";
}

if (isset($_POST["submit"])) {
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
        $sql_table = "Applicant_login";

        $username = trim($_POST["user"]);
        $username = stripslashes($username);
        $username = htmlspecialchars($username);

        $password = trim($_POST["pass"]);
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
                header('Location: applicant.php'); // allow valid username and password input to login
                $_SESSION['applicantloggedIn'] = true;
                $_SESSION["applicantID"] = $row->Applicant_no;
            } else {
                $_SESSION["Applicanterror"] = "Password wrong. Please try again."; // invalid password message
            }

        } else {            
            $_SESSION["Applicanterror"] = "Username does not exist. Please go to Applicant Signup Page."; // invalid username message
        }        
        // close the database connection
        mysqli_close($conn);
    } // if successful database connection
}
?>

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
        <main>
                <!-- Main applicant login page part -->
                <div class="centered-container">                    
                    <h2>Applicant Login</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="loggedForm">                   
                    <?php
                        if (isset($_SESSION["Applicanterror"])) {
                            echo "<p class=\"wrong\">", $_SESSION["Applicanterror"], "</p>"; // show invalid input error message
                        }
                        unset($_SESSION["Applicanterror"]); 
                    ?>
                        <label for="user"><b>Username</b></label>
                        <input type="text" placeholder="Enter Username" name="user" id="user" required>

                        <label for="pass"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="pass" id="pass" required>

                        <button type="submit" name="submit" style="display: block; margin: 0 auto; width: auto; border-radius: 8px;">Login</button>                      
                    </form>
                
                    <br>
                    <!-- sign up hyperlink -->
                    <p><strong>Not have an account?</strong></p>
                    <div id="other-signup">
                        <a href="signup.html" style="color: black;"><u>Sign Up</u></a>
                    </div>
                </div> 
        </main>
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