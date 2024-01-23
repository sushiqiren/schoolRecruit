<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Class Timetable" />
  <meta name="keywords" content="timetable" />
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
  <title>CorpU - Class Timetable Allocation Confirmation</title>
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

<main>
<?php

$page = basename($_SERVER['PHP_SELF']); // get basename of URL link

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $page == "allocateconfirm.php") {
header('Location: permanentlogin.php'); // redirect to apply.php page if type in logged in php in url 
}

if (isset($_POST["submit"])) {
require_once("settings.php");  // connection info
$conn = @mysqli_connect($host,
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
    $sql_table = "Sstaff_information";
    echo "<h2>Class Timetable Allocation Information</h2>";
    // Set up the SQL command to query or change data of table
      // update records from sessional table      
      if (isset($_POST["cos60004"])) {
        $case = $_POST["cos60004"];
        switch ($case) {
            // use if and switch control flow to transfer sessional staff name selected from permanent staff
            case "TarynClark":
                $query = "update $sql_table set Unit='cos60004Tutorial1Tues.15.00-17.00' where Sstaff_no='s001';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Taryn Clark has been allocated to cos60004 Tutorial successfully.</p>";                                    
                }
                break;
            case "DanielYoung":
                $query = "update $sql_table set Unit='cos60004TutorialTues.15.00-17.00' where Sstaff_no='s002';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Daniel Young has been allocated to cos60004 Tutorial successfully.</p>";
                }
                break;
            case "YunWong":
                $query = "update $sql_table set Unit='cos60004TutorialTues.15.00-17.00' where Sstaff_no='s003';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Yun Wong has been allocated to cos60004 Tutorial successfully.</p>";
                }
                break;
            case "BrandenJones":
                $query = "update $sql_table set Unit='cos60004TutorialTues.15.00-17.00' where Sstaff_no='s004';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Branden Jones has been allocated to cos60004 Tutorial successfully.</p>";
                }
                break;
            case "AyanChudal":
                $query = "update $sql_table set Unit='cos60004TutorialTues.15.00-17.00' where Sstaff_no='s005';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Ayan Chudal has been allocated to cos60004 Tutorial successfully.</p>";
                }
                break;
        }
    }
    
    if (isset($_POST["cos60008"])) {
        $case = $_POST["cos60008"];
        switch ($case) {
            
            case "TarynClark":
                $query = "update $sql_table set Unit='cos60008TutorialWed.15.00-17.00' where Sstaff_no='s001';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Taryn Clark has been allocated to cos60008 Tutorial successfully.</p>";
                }
                break;
            case "DanielYoung":
                $query = "update $sql_table set Unit='cos60008TutorialWed.15.00-17.00' where Sstaff_no='s002';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Daniel Young has been allocated to cos60008 Tutorial successfully.</p>";
                }
                break;
            case "YunWong":
                $query = "update $sql_table set Unit='cos60008TutorialWed.15.00-17.00' where Sstaff_no='s003';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Yun Wong has been allocated to cos60008 Tutorial successfully.</p>";
                }
                break;
            case "BrandenJones":
                $query = "update $sql_table set Unit='cos60008TutorialWed.15.00-17.00' where Sstaff_no='s004';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Branden Jones has been allocated to cos60008 Tutorial successfully.</p>";
                }
                break;
            case "AyanChudal":
                $query = "update $sql_table set Unit='cos60008TutorialWed.15.00-17.00' where Sstaff_no='s005';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Ayan Chudal has been allocated to cos60008 Tutorial successfully.</p>";
                }
                break;
        }                    
    }
          
    if (isset($_POST["cos60009"])) {
        $case = $_POST["cos60009"];
        switch ($case) {
            
            case "TarynClark":
                $query = "update $sql_table set Unit='cos60009TutorialWed.15.00-17.00' where Sstaff_no='s001';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Taryn Clark has been allocated to cos60009 Tutorial successfully.</p>";
                }
                break;
            case "DanielYoung":
                $query = "update $sql_table set Unit='cos60009TutorialWed.15.00-17.00' where Sstaff_no='s002';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Daniel Young has been allocated to cos60009 Tutorial successfully.</p>";
                }
                break;
            case "YunWong":
                $query = "update $sql_table set Unit='cos60009TutorialWed.15.00-17.00' where Sstaff_no='s003';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Yun Wong has been allocated to cos60009 Tutorial successfully.</p>";
                }
                break;
            case "BrandenJones":
                $query = "update $sql_table set Unit='cos60009TutorialWed.15.00-17.00' where Sstaff_no='s004';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Branden Jones has been allocated to cos60009 Tutorial successfully.</p>";
                }
                break;
            case "AyanChudal":
                $query = "update $sql_table set Unit='cos60009TutorialWed.15.00-17.00' where Sstaff_no='s005';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Ayan Chudal has been allocated to cos60009 Tutorial successfully.</p>";
                }
                break;
        }                    
    }
    
    if (isset($_POST["cos60010"])) {
        $case = $_POST["cos60010"];
        switch ($case) {
            
            case "TarynClark":
                $query = "update $sql_table set Unit='cos60010TutorialFri.11.00-13.00' where Sstaff_no='s001';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Taryn Clark has been allocated to cos60010 Tutorial successfully.</p>";
                }
                break;
            case "DanielYoung":
                $query = "update $sql_table set Unit='cos60010TutorialFri.11.00-13.00' where Sstaff_no='s002';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Daniel Young has been allocated to cos60010 Tutorial successfully.</p>";
                }
                break;
            case "YunWong":
                $query = "update $sql_table set Unit='cos60010TutorialFri.11.00-13.00' where Sstaff_no='s003';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Yun Wong has been allocated to cos60010 Tutorial successfully.</p>";
                }
                break;
            case "BrandenJones":
                $query = "update $sql_table set Unit='cos60010TutorialFri.11.00-13.00' where Sstaff_no='s004';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Branden Jones has been allocated to cos60010 Tutorial successfully.</p>";
                }
                break;
            case "AyanChudal":
                $query = "update $sql_table set Unit='cos60010TutorialFri.11.00-13.00' where Sstaff_no='s005';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Ayan Chudal has been allocated to cos60010 Tutorial successfully.</p>";
                }
                break;
        }                    
    }

    if (isset($_POST["cos80022"])) {
        $case = $_POST["cos80022"];
        switch ($case) {
            
            case "TarynClark":
                $query = "update $sql_table set Unit='cos80022TutorialFri.9.00-11.00' where Sstaff_no='s001';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Taryn Clark has been allocated to cos80022 Tutorial successfully.</p>";
                }
                break;
            case "DanielYoung":
                $query = "update $sql_table set Unit='cos80022TutorialFri.9.00-11.00' where Sstaff_no='s002';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Daniel Young has been allocated to cos80022 Tutorial successfully.</p>";
                }
                break;
            case "YunWong":
                $query = "update $sql_table set Unit='cos80022TutorialFri.9.00-11.00' where Sstaff_no='s003';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Yun Wong has been allocated to cos80022 Tutorial successfully.</p>";
                }
                break;
            case "BrandenJones":
                $query = "update $sql_table set Unit='cos80022TutorialFri.9.00-11.00' where Sstaff_no='s004';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Branden Jones has been allocated to cos80022 Tutorial successfully.</p>";
                }
                break;
            case "AyanChudal":
                $query = "update $sql_table set Unit='cos80022TutorialFri.9.00-11.00' where Sstaff_no='s005';";
                $result = @mysqli_query($conn, $query);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                } else {
                    echo "<p class=\"ok\">Ayan Chudal has been allocated to cos80022 Tutorial successfully.</p>";
                }
                break;
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
