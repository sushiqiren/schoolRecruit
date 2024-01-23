<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author"  content="Huaxing Zhang" />   
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
    <title>Adding Applicants to Database</title>
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
                                <a class="nav-link" href="processApply.php">Home</a>
                            </li>                                                        
                            <li class="nav-item">
                                <a class="nav-link" href="applications.html">Return</a>
                            </li>                            
                        </ul>
                    </div>
                </nav>                
            </div>
        </div>
        <main id="processapplymain">
        <h1>Adding Information to Job Application</h1>
    
<?php

$page = basename($_SERVER['PHP_SELF']); // get basename of URL link

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $page == "processApply.php") {
    header('Location: applications.html'); // redirect to applications.html page if type processApply.php in url 
}

$check = true;
// connect skill list options and other skill textarea
if (isset($_POST["SkillList"]) && isset($_POST["OtherSkills"])) {
    $otherSkills = $_POST["OtherSkills"];
    if (in_array("Other", $_POST["SkillList"]) && $otherSkills == "") {
        echo "<p class=\"wrong\">The other skills textarea must be filled when other skill checkbox is selected.</p>";
        $check = false;
    }
}

// connect to database after clicking on application submit button
if ($check && isset($_POST["Apply"])) {
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
        echo "<p class=\"wrong\">Database connection failure</p>";
    } else {
        // upon successful connection
        $sql_table = "Applicant";

        $fieldDefinition = "ApplyNumber INT AUTO_INCREMENT PRIMARY KEY, FirstName VARCHAR(20) not null, LastName VARCHAR(20) not null, DateofBirth VARCHAR(20) not null, Gender VARCHAR(10) NOT NULL, Address VARCHAR(40) not null, Suburb VARCHAR(40) NOT NULL, State VARCHAR(20) NOT NULL, Postcode VARCHAR(4) NOT NULL, Email VARCHAR(40) NOT NULL, Phone VARCHAR(12) NOT NULL, Skills VARCHAR(50), OtherSkills VARCHAR(50), Qualification VARCHAR(60), Preference VARCHAR(30) NOT NULL, Availability VARCHAR(150) NOT NULL, Status VARCHAR(10) NOT NULL";

        // check: if table does not exist, create it
        $sqlString = "show tables like '$sql_table'";

        $result = @mysqli_query($conn, $sqlString);
        // checks if any tables of this name
        if (mysqli_num_rows($result) === 0) {
            echo "<p class=\"ok\">Table does not exist - create table $sql_table</p>"; // Might not show in a production script 
            $sqlString = "create table " . $sql_table . "(" . $fieldDefinition . ");";
            $result2 = @mysqli_query($conn, $sqlString);
            // checks if the table was created
            if ($result2 === false) {
                echo "<p class=\"wrong\">Unable to create Table $sql_table." . mysqli_errno($conn) . ":" . mysqli_error($conn) . " .</p>"; //Would not show in a production script 
            } else {
                // display an operation successful message
                echo "<p class=\"ok\">Applicant Lists created OK.</p>"; //Would not show in a production script 
            } // if successful query operation

        } 
        
        // sanitize all inputs
        function sanitize($input) {
            $result = trim($_POST[$input]);
            $result = stripslashes($result);
            $result = htmlspecialchars($result);
            return $result;
        }

        $firstName = sanitize("FirstName");

        $lastName = sanitize("LastName");

        $dob = sanitize("DateOfBirth");

        $gender = $_POST["gender"];

        $address = sanitize("StreetAddress");

        $suburb = sanitize("SurburbTown");

        $state = sanitize("State");

        $postcode = sanitize("PostCode");

        $email = sanitize("email");

        $phone = sanitize("PhoneNumber");

        $otherSkills = sanitize("OtherSkills");

        $qualification = sanitize("qualification");

        

        // Set up the SQL command to query or add data into the table

        $query;
        $skills = implode(",", $_POST["SkillList"]);

        $preference = implode(",", $_POST["units"]);

        $available = implode(",", $_POST["time"]);
        
        if (in_array("Other", $_POST["SkillList"])) {
            $query = "insert into $sql_table (FirstName, LastName, DateofBirth, Gender, Address, Suburb, State, Postcode, Email, Phone, Skills, OtherSkills, Qualification, Preference, Availability, Status) values ('$firstName', '$lastName', '$dob', '$gender', '$address', '$suburb', '$state', '$postcode', '$email', '$phone', '$skills', '$otherSkills', '$qualification', '$preference', '$available', 'New');";
        } else {
            $query = "insert into $sql_table (FirstName, LastName, DateofBirth, Gender, Address, Suburb, State, Postcode, Email, Phone, Skills, Qualification, Preference, Availability, Status) values ('$firstName', '$lastName', '$dob', '$gender', '$address', '$suburb', '$state', '$postcode', '$email', '$phone', '$skills', '$qualification', '$preference', '$available', 'New');";
        }

        $result = @mysqli_query($conn, $query); // execute the query

        if (!$result) {
            echo "<p class=\"wrong\">Something is wrong with ", $query, ".</p>";
        } else {
            $applyNumberQuery = "select ApplyNumber, FirstName, LastName from $sql_table where Status='New';";
            $applyNumber = @mysqli_query($conn, $applyNumberQuery); // execute the eoiNumber query
            if (!$applyNumber) {
                echo "<p class=\"wrong\">Something is wrong with $applyNumberQuery.</p>";
            }
            if (mysqli_num_rows($applyNumber) > 0) {
                while ($row = mysqli_fetch_assoc($applyNumber)) {
                    // show message of submitting application successfully
                    echo "<p class=\"ok\">Congratulations. " . $row["FirstName"] . " " . $row["LastName"] . " have successfully submitted new application. Application number is " . $row["ApplyNumber"] . ".</p>";
                    // update applicant status
                    $updateQuery = "update $sql_table set Status='Current' where ApplyNumber=" . $row["ApplyNumber"] . ";";
                    @mysqli_query($conn, $updateQuery);
                }
                mysqli_free_result($applyNumber);
            }
        }
        // close the database connection
        mysqli_close($conn);
    } // if successful database connection
}
?>
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