<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Process Applicant Register">
    <meta name="keywords" content="PHP, MySql">
    <meta name="author" content="Huaxing Zhang" />
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
    <title>Validate Applicant Register</title>
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
                                <a class="nav-link" href="processRegister.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.html">Return</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <?php

        echo "<h1>Validate Applicant Signup</h1>";

        $page = basename($_SERVER['PHP_SELF']); // get basename of URL link
        
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $page == "processRegister.php") {
            header('Location: signup.html'); // redirect to signup.html page if type processRegister.php in url 
        }
        echo "<main id=\"registerbody\">";
        $check = true;
        // check username validation
        if (isset($_POST["user"])) {
            $username = $_POST["user"];
            $usernameType = "/^\w{5,10}$/";
            if ($username === "") {
                echo "<p class=\"wrong\">Username area must not be empty when registering.</p>";
                $check = false;
            } elseif (preg_match($usernameType, $username) === 0) {
                echo "<p class=\"wrong\">Username must be characters with length between 4 and 11.</p>";
                $check = false;
            }
        }
        // check password validation
        if (isset($_POST["pass"])) {
            $password = $_POST["pass"];
            $passwordType = "/^[0-9a-zA-Z]{6,10}$/";
            if ($password === "") {
                echo "<p class=\"wrong\">Password must not be empty when registering.</p>";
                $check = false;
            } elseif (preg_match($passwordType, $password) === 0) {
                echo "<p class=\"wrong\">Password must be combination of capitalized alpha, 
                    or not capitalized alpha, or digital number characters with length between 5 and 11.</p>";
                $check = false;
            }
        }
        // process applicant sign up request from front-end by connecting to database
        if ($check && isset($_POST["submit"])) {
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
        
                $createQuery = "insert into $sql_table (Username, Password) values ('$username', '$password');";
                $usernameQuery = "select Username from $sql_table where Username = '$username';";

                $userName = @mysqli_query($conn, $usernameQuery); // execute the query
        
                if (!$userName) {
                    echo "<p class=\"wrong\">Something is wrong with $usernameQuery.</p>";
                }
                if (mysqli_num_rows($userName) > 0) {
                    while ($row = mysqli_fetch_assoc($userName)) {
                        if ($row["Username"] === $username) {
                            echo "<p class=\"wrong\">Username has already existed. Please enter a new username!</p>";
                            break;
                        }
                    }
                    mysqli_free_result($userName);
                } else {
                    $create = @mysqli_query($conn, $createQuery); // execute the query
                    if (!$create) {
                        echo "<p class=\"wrong\">Something is wrong with ", $createQuery, ".</p>";
                    } else {
                        echo "<p class=\"ok\">Congratulations! Registration is Successful.</p>";
                    }
                }
                // close the database connection
                mysqli_close($conn);
            } // if successful database connection
        }
        echo "<p class=\"ok\"><a href=\"signup.html\">Applicant Register Page</a></p>";
        echo "<p class=\"ok\"><a href=\"applylogin.php\">Login Page</a></p>";
        echo "</main>";

        ?>
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