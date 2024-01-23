<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
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
    <title>Sessional Staff Submitting Confirmation</title>
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
                                <a class="nav-link" href="sessionalManagement.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="sessionallogout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <main id="sessionalstaffprocess">
            <h2>Sessional Staff Submitting Confirmation</h2>
            <?php
            session_start();  // set up session in PHP to trace back the sessional staff ID
            $sessionalID;
            if (isset($_SESSION["sessionalID"])) {
                $sessionalID = $_SESSION["sessionalID"];
            }

            $page = basename($_SERVER['PHP_SELF']); // get basename of URL link
            
            if ($_SERVER['REQUEST_METHOD'] == 'GET' && $page == "processSessionalStaff.php") {
                header('Location: sessionallogin.php'); // redirect to sessionallogin.php page if type in processSessionalStaff.php in url 
            }

            // process the updating request to back-end
            if (isset($_POST["submit"]) && $_POST["submit"] !== "") {
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
                    echo "<h3>Submit available time and personal information update Status:</h3>";


                    $sql_table = "Sstaff_information";
                    // define sanitize function for server-side security
                    function sanitize($input)
                    {
                        $output = trim($input);
                        $output = stripslashes($output);
                        $output = htmlspecialchars($output);
                        return $output;
                    }
                    $email;
                    $phone;
                    $address;
                    $available;
                    if (isset($_POST["email"]) && $_POST["email"] !== "" && isset($_POST["phone"]) && $_POST["phone"] !== "" && isset($_POST["address"]) && $_POST["address"] !== "" && isset($_POST["time"]) && $_POST["time"] !== "") {
                        // sanitize the user input
                        $email = sanitize($_POST["email"]);  
                        $phone = sanitize($_POST["phone"]);
                        $address = sanitize($_POST["address"]);
                        $availableArray = $_POST["time"];
                        $available = implode(",", $availableArray);
                        $updateQuery = "update $sql_table set Email='$email', Phone='$phone', Address='$address', Available='$available' where Sstaff_no='$sessionalID';"; // update all inputs from user
                        $result = @mysqli_query($conn, $updateQuery);
                        if (!$result) {
                            echo "<p class=\"wrong\">Something is wrong with ", $updateQuery, ".</p>"; 
                        } else {
                            echo "<p class=\"ok\">Congratulations! Update successfully!</p>";
                        }
                    } elseif (isset($_POST["email"]) && $_POST["email"] !== "") {
                        $email = sanitize($_POST["email"]);
                        $updateQuery = "update $sql_table set Email='$email'where Sstaff_no='$sessionalID';";  // update input in case of user input
                        $result = @mysqli_query($conn, $updateQuery);
                        if (!$result) {
                            echo "<p class=\"wrong\">Something is wrong with ", $updateQuery, ".</p>";
                        } else {
                            echo "<p class=\"ok\">Congratulations! Update successfully!</p>";
                        }
                    } elseif (isset($_POST["phone"]) && $_POST["phone"] !== "") {
                        $phone = sanitize($_POST["phone"]);
                        $updateQuery = "update $sql_table set Phone='$phone' where Sstaff_no='$sessionalID';";  // update input in case of user input
                        $result = @mysqli_query($conn, $updateQuery);
                        if (!$result) {
                            echo "<p class=\"wrong\">Something is wrong with ", $updateQuery, ".</p>";
                        } else {
                            echo "<p class=\"ok\">Congratulations! Update successfully!</p>";
                        }
                    } elseif (isset($_POST["address"]) && $_POST["address"] !== "") {
                        $address = sanitize($_POST["address"]);
                        $updateQuery = "update $sql_table set Address='$address' where Sstaff_no='$sessionalID';";   // update input in case of user input
                        $result = @mysqli_query($conn, $updateQuery);
                        if (!$result) {
                            echo "<p class=\"wrong\">Something is wrong with ", $updateQuery, ".</p>";
                        } else {
                            echo "<p class=\"ok\">Congratulations! Update successfully!</p>";
                        }
                    } elseif (isset($_POST["time"]) && $_POST["time"] !== "") {
                        $availableArray = $_POST["time"];
                        $available = implode(",", $availableArray);
                        $updateQuery = "update $sql_table set Available='$available' where Sstaff_no='$sessionalID';";   // update input in case of user input
                        $result = @mysqli_query($conn, $updateQuery);
                        if (!$result) {
                            echo "<p class=\"wrong\">Something is wrong with ", $updateQuery, ".</p>";
                        } else {
                            echo "<p class=\"ok\">Congratulations! Update successfully!</p>";
                        }
                    }



                }

                mysqli_close($conn);  // close database connection
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