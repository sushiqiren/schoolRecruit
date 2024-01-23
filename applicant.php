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
    <title>Applicant logged In Page</title>
</head>
<?php
// set up session to trace back applicantID and logged in status
session_start();
$applicantID = $_SESSION["applicantID"];


$logincheck = $_SESSION["applicantloggedIn"];
if ($logincheck === false) {
    header("Location: applylogin.php");
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
                                <a class="nav-link" href="applicantlogout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <br>
        <h2>Welcome to Applicant Management System</h2>

        <?php
            // set up database parameters
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
                echo "<h3>Applicant Information Review</h3>";

                $sql_table = "Applicant";
                // show applicant's detail by connection with database with select query
                $listapplicant = "select * from $sql_table where ApplyNumber='$applicantID';";
                $listresult = @mysqli_query($conn, $listapplicant);
                if (!$listresult) {
                    echo "<p class=\"wrong\">Something is wrong with ", $listapplicant, ".</p>";
                }
                if (mysqli_num_rows($listresult) > 0) {
                    echo "<table border=\"1\">";
                    echo "<table>";
                            echo "<tr>\n"
                                . "<th scope=\"col\">ApplyNumber</th>\n"
                                . "<th scope=\"col\">First Name</th>\n"
                                . "<th scope=\"col\">Last Name</th>\n"
                                . "<th scope=\"col\">Date of Birth</th>\n"
                                . "<th scope=\"col\">Gender</th>\n"
                                . "<th scope=\"col\">Street Address</th>\n"
                                . "<th scope=\"col\">Suburb/Town</th>\n"
                                . "<th scope=\"col\">State</th>\n"
                                . "<th scope=\"col\">Postcode</th>\n"
                                . "<th scope=\"col\">Email</th>\n"
                                . "<th scope=\"col\">Phone Number</th>\n"
                                . "<th scope=\"col\">Skills</th>\n"
                                . "<th scope=\"col\">Other Skills</th>\n"
                                . "<th scope=\"col\">Qualifications</th>\n"
                                . "<th scope=\"col\">Preference</th>\n"
                                . "<th scope=\"col\">Available Time</th>\n"
                                . "<th scope=\"col\">Status</th>\n"
                                . "</tr>\n";
                            // retrieve current record pointed by the result pointer

                            while ($row = mysqli_fetch_assoc($listresult)) {
                                echo "<tr>";
                                echo "<td>", $row["ApplyNumber"], "</td>\n";
                                echo "<td>", $row["FirstName"], "</td>\n";
                                echo "<td>", $row["LastName"], "</td>\n";
                                echo "<td>", $row["DateofBirth"], "</td>\n";
                                echo "<td>", $row["Gender"], "</td>\n";
                                echo "<td>", $row["Address"], "</td>\n";
                                echo "<td>", $row["Suburb"], "</td>\n";
                                echo "<td>", $row["State"], "</td>\n";
                                echo "<td>", $row["Postcode"], "</td>\n";
                                echo "<td>", $row["Email"], "</td>\n";
                                echo "<td>", $row["Phone"], "</td>\n";
                                echo "<td>", $row["Skills"], "</td>\n";
                                echo "<td>", $row["OtherSkills"], "</td>\n";
                                echo "<td>", $row["Qualification"], "</td>\n";
                                echo "<td>", $row["Preference"], "</td>\n";
                                echo "<td>", $row["Availability"], "</td>\n";
                                echo "<td>", $row["Status"], "</td>\n";
                                echo "</tr>";
                            }
                            echo "</table>\n";
                            // Frees up the memory, after using the result pointer
                            mysqli_free_result($listresult);
            }
            mysqli_close($conn);   // close database connection
        }
        ?>
        <br>
        <br>
        <!-- set up form to update applicant information -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="applicantupdateform">
            <fieldset>
                <legend>Update Personal Information</legend>
                <table>
                    <tr>
                        <td>Phone Number: <input type="text" name="phone" id="phone" size="20"></td>
                        <td>Address: <input type="text" name="address" id="address" size="20"></td>
                        <td>Email: <input type="text" name="email" id="email" size="20"></td>
                    </tr>
                </table>
            </fieldset>
            <fieldset id="preference" class="applyUnits">
                <legend>Preferred Units</legend>
                <div class="units">
                    <p>
                        <label for="webapp">COS60004 Creating Web Applications</label>
                        <input type="checkbox" id="webapp" name="units[]" value="webapp">
                    </p>
                    <p>
                        <label for="datasci">COS60008 Introduction to Data Science</label>
                        <input type="checkbox" id="datasci" name="units[]" value="datasci">
                    </p>
                </div>
            </fieldset>
            <fieldset id="sessionAvail" class="sessionalAvailable">
                <legend>Availability Time</legend>
                <table>
                    <thead>
                        <th>Timetable</th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th>9:00-11:00</th>
                            <td><label for="Monday9-11">select</label>
                                <input type="checkbox" id="Monday9-11" name="time[]" value="Monday9-11">
                            </td>
                            <td><label for="Tuesday9-11">select</label>
                                <input type="checkbox" id="Tuesday9-11" name="time[]" value="Tuesday9-11">
                            </td>
                            <td><label for="Wednesday9-11">select</label>
                                <input type="checkbox" id="Wednesday9-11" name="time[]" value="Wednesday9-11">
                            </td>
                            <td><label for="Thursday9-11">select</label>
                                <input type="checkbox" id="Thursday9-11" name="time[]" value="Thursday9-11">
                            </td>
                            <td><label for="Friday9-11">select</label>
                                <input type="checkbox" id="Friday9-11" name="time[]" value="Friday9-11">
                            </td>
                        </tr>
                        <tr>
                            <th>11:00-13:00</th>
                            <td><label for="Monday11-13">select</label>
                                <input type="checkbox" id="Monday9-11" name="time[]" value="Monday11-13">
                            </td>
                            <td><label for="Tuesday11-13">select</label>
                                <input type="checkbox" id="Tuesday11-13" name="time[]" value="Tuesday11-13">
                            </td>
                            <td><label for="Wednesday11-13">select</label>
                                <input type="checkbox" id="Wednesday11-13" name="time[]" value="Wednesday11-13">
                            </td>
                            <td><label for="Thursday11-13">select</label>
                                <input type="checkbox" id="Thursday11-13" name="time[]" value="Thursday11-13">
                            </td>
                            <td><label for="Friday11-13">select</label>
                                <input type="checkbox" id="Friday11-13" name="time[]" value="Friday11-13">
                            </td>
                        </tr>
                        <tr>
                            <th>13:00-15:00</th>
                            <td><label for="Monday13-15">select</label>
                                <input type="checkbox" id="Monday13-15" name="time[]" value="Monday13-15">
                            </td>
                            <td><label for="Tuesday11-13">select</label>
                                <input type="checkbox" id="Tuesday13-15" name="time[]" value="Tuesday13-15">
                            </td>
                            <td><label for="Wednesday13-15">select</label>
                                <input type="checkbox" id="Wednesday13-15" name="time[]" value="Wednesday13-15">
                            </td>
                            <td><label for="Thursday13-15">select</label>
                                <input type="checkbox" id="Thursday13-15" name="time[]" value="Thursday13-15">
                            </td>
                            <td><label for="Friday13-15">select</label>
                                <input type="checkbox" id="Friday13-15" name="time[]" value="Friday13-15">
                            </td>
                        </tr>
                        <tr>
                            <th>15:00-17:00</th>
                            <td><label for="Monday15-17">select</label>
                                <input type="checkbox" id="Monday15-17" name="time[]" value="Monday15-17">
                            </td>
                            <td><label for="Tuesday11-13">select</label>
                                <input type="checkbox" id="Tuesday15-17" name="time[]" value="Tuesday15-17">
                            </td>
                            <td><label for="Wednesday15-17">select</label>
                                <input type="checkbox" id="Wednesday15-17" name="time[]" value="Wednesday15-17">
                            </td>
                            <td><label for="Thursday13-15">select</label>
                                <input type="checkbox" id="Thursday15-17" name="time[]" value="Thursday15-17">
                            </td>
                            <td><label for="Friday13-15">select</label>
                                <input type="checkbox" id="Friday15-17" name="time[]" value="Friday15-17">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <input type="submit" value="Submit" name="submit" class="btn">
        </form>
        <br>
        <?php        
        // update applicant information by PHP backend coding
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
                echo "<h3>Submit available time and personal information update Status</h3>";

                $sql_table = "Applicant";
                // function to sanitize the user input for security reason
                function sanitize($input)
                {
                    $result = trim($_POST[$input]);
                    $result = stripslashes($result);
                    $result = htmlspecialchars($result);
                    return $result;
                }

                $email = sanitize("email");
                $phone = sanitize("phone");
                $address = sanitize("address");
                $units = '';
                $available = '';
                if (isset($_POST["units"])) {
                    $unitsArray = $_POST["units"];
                    $units = implode(",", $unitsArray);                    
                }
                if (isset($_POST["time"])) {
                    $availableArray = $_POST["time"];
                    $available = implode(",", $availableArray);
                }
                // set up update query using update command
                $updateQuery = "update $sql_table set Email='$email', Phone='$phone', Address='$address', Preference='$units', Availability='$available' where ApplyNumber='$applicantID';";
                $result = @mysqli_query($conn, $updateQuery);
                if (!$result) {
                    echo "<p class=\"wrong\">Something is wrong with ", $updateQuery, ".</p>";
                } else {

                    echo "<p class=\"ok\">Congratulations! Update successfully!</p>";

                }
            }
            mysqli_close($conn);  // close database connection
        }
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