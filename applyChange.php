<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pengfei Li" />
    <!-- bootstrap css style-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- bootstrap collapse menu button style-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!--self created css style-->
    <link rel="stylesheet" href="styles/style.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sacramento&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=VT323&display=swap" rel="stylesheet">
    <title>Application Approval</title>
</head>

<body>

    <div id="title">
        <div class="container-fluid">

            <!-- Navigation Bar -->

            <nav class="navbar navbar-expand-lg navbar-dark">

                <a class="navbar-brand" href="index.html"><img src="images/CorpU.png" alt="CorpU Logo" class="corpuLogo">CorpU</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

    <h1>Application Approval / Rejection</h1>


<!-- php code to connect database and change the application status -->
    <?php

    // to connect the database
    require_once("settings.php");
    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );

    // to sanitise the input data
    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    // to change application status
    if (!$conn) {
        // if database cannot be connected, error message shown
        echo "<p>Database connection failure</p>"; 
    } else {
        // if database connected successfully, execute below
        $sql_table = "Applicant";

        
        
        if (empty($_POST["applyNumber"])) {
            echo "<p>Please sepecify the EOI Number you want to change.</p>"; //if application number is not specified, show server errer message
        } elseif (isset($_POST["applyNumber"]) && isset($_POST["applyStatus"])) { // if application is correct, execute below code
            $applyNumber = trim($_POST["applyNumber"]);
            $applyNumber = sanitise_input($applyNumber);

            $applyStatus = trim($_POST["applyStatus"]);
            $applyStatus = sanitise_input($applyStatus);

            $query = "UPDATE $sql_table SET status = '$applyStatus' WHERE ApplyNumber = '$applyNumber'";

            //below code to check if the input application number exists
            $notExist = "SELECT * FROM $sql_table WHERE ApplyNumber ='$applyNumber'";
            $existQuery = mysqli_query($conn, $notExist);
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($existQuery)<=0) {

                echo "<p style=\"background-color:red;\">Error: Apply Number does not exist.</p>"; // if application number does not exist, show the error message
            }
            elseif (!$result) {
                echo "<p>Something is wrong with \"| $query |\"</p>";
            } else {   // if application number exist and is correct, show application status is changed
                echo "<p>Application " . $applyNumber . " has been " . $applyStatus . ".</p>";
            }
            mysqli_close($conn);
            }
        }
    
    ?>


    <div class="bottom-container">
        <footer>
            <p class="copyright-declaration">© CorpU</p>
            <a class="footer-link" href="contact.html">Contact Us</a>
        </footer>
    </div>

</body>

</html>