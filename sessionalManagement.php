<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Huaxing Zhang, Kochapon Ussavaphark" />
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
    <title>Sessional Management</title>
</head>
<?php
session_start();
if (isset($_SESSION["sessionalloggedIn"])) {
    $logincheck = $_SESSION["sessionalloggedIn"];
    if ($logincheck === false) {
        header("Location: login_ps.html");
    }
}
$sessionId = $_SESSION["sessionalID"];
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
                                <a class="nav-link" href="sessionallogout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <main>
            <br>
            <h1>Welcome to Sessional Management System</h1>
            <br>
            <h3>Personal and Class Information Review</h3>
            <?php
            // set up parameters to connect to database
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
                $sql_table = "Sstaff_information";

                // Set up the SQL command to query or change data of table
                // retrieve all records from table
            
                $query = "select Sstaff_no, Sfirst_name, Slast_name, Gender, DateofBirth, Address, Email, Phone, Unit from $sql_table where Sstaff_no='$sessionId';";

                $allResult = @mysqli_query($conn, $query); // execute the eoiNumber query
                if (!$allResult) {
                    echo "<p class=\"wrong\">Something is wrong with $query.</p>";
                }
                if (mysqli_num_rows($allResult) > 0) {
                    // Display the retrieved records
            
                    echo "<table border=\"1\">";
                    echo "<tr>\n"
                        . "<th scope=\"col\">SessionalID</th>\n"
                        . "<th scope=\"col\">Name</th>\n"
                        . "<th scope=\"col\">Gender</th>\n"
                        . "<th scope=\"col\">Date of Birth</th>\n"
                        . "<th scope=\"col\">Address</th>\n"
                        . "<th scope=\"col\">Email</th>\n"
                        . "<th scope=\"col\">Phone Number</th>\n"
                        . "<th scope=\"col\">Teaching Courses</th>\n"
                        . "</tr>\n";
                    // retrieve current record pointed by the result pointer
            
                    while ($row = mysqli_fetch_assoc($allResult)) {
                        echo "<tr>";
                        echo "<td>", $row["Sstaff_no"], "</td>\n";
                        echo "<td>", $row["Sfirst_name"], " ", $row["Slast_name"], "</td>\n";
                        echo "<td>", $row["Gender"], "</td>\n";
                        echo "<td>", $row["DateofBirth"], "</td>\n";
                        echo "<td>", $row["Address"], "</td>\n";
                        echo "<td>", $row["Email"], "</td>\n";
                        echo "<td>", $row["Phone"], "</td>\n";
                        echo "<td>", $row["Unit"], "</td>\n";
                        echo "</tr>";
                    }
                    echo "</table>\n";
                    // Frees up the memory, after using the result pointer
                    mysqli_free_result($allResult);
                } else {
                    echo "<p class=\"ok\">There is no result!</p>";
                }
                // close the database connection
                mysqli_close($conn);
            } // if successful database connection
            
            ?>
            <hr>
            <!-- sessional staff information update management  -->
            <form action="processSessionalStaff.php" method="post" name="sessionalManagement" id="sessionalStaff">
                <h3>Class Availability Time and Personal Information Update</h3>
                <!-- timetable update -->
                <fieldset id="sessionAvail" class="sessionalAvailable">
                    <legend>Availability Time</legend>
                    <table class="availability_table">
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
                                <td><label for="Monday9-11"></label>
                                    <input type="checkbox" id="Monday9-11" name="time[]" value="Monday9-11">
                                </td>
                                <td><label for="Tuesday9-11"></label>
                                    <input type="checkbox" id="Tuesday9-11" name="time[]" value="Tuesday9-11">
                                </td>
                                <td><label for="Wednesday9-11"></label>
                                    <input type="checkbox" id="Wednesday9-11" name="time[]" value="Wednesday9-11">
                                </td>
                                <td><label for="Thursday9-11"></label>
                                    <input type="checkbox" id="Thursday9-11" name="time[]" value="Thursday9-11">
                                </td>
                                <td><label for="Friday9-11"></label>
                                    <input type="checkbox" id="Friday9-11" name="time[]" value="Friday9-11">
                                </td>
                            </tr>
                            <tr>
                                <th>11:00-13:00</th>
                                <td><label for="Monday11-13"></label>
                                    <input type="checkbox" id="Monday9-11" name="time[]" value="Monday11-13">
                                </td>
                                <td><label for="Tuesday11-13"></label>
                                    <input type="checkbox" id="Tuesday11-13" name="time[]" value="Tuesday11-13">
                                </td>
                                <td><label for="Wednesday11-13"></label>
                                    <input type="checkbox" id="Wednesday11-13" name="time[]" value="Wednesday11-13">
                                </td>
                                <td><label for="Thursday11-13"></label>
                                    <input type="checkbox" id="Thursday11-13" name="time[]" value="Thursday11-13">
                                </td>
                                <td><label for="Friday11-13"></label>
                                    <input type="checkbox" id="Friday11-13" name="time[]" value="Friday11-13">
                                </td>
                            </tr>
                            <tr>
                                <th>13:00-15:00</th>
                                <td><label for="Monday13-15"></label>
                                    <input type="checkbox" id="Monday13-15" name="time[]" value="Monday13-15">
                                </td>
                                <td><label for="Tuesday11-13"></label>
                                    <input type="checkbox" id="Tuesday13-15" name="time[]" value="Tuesday13-15">
                                </td>
                                <td><label for="Wednesday13-15"></label>
                                    <input type="checkbox" id="Wednesday13-15" name="time[]" value="Wednesday13-15">
                                </td>
                                <td><label for="Thursday13-15"></label>
                                    <input type="checkbox" id="Thursday13-15" name="time[]" value="Thursday13-15">
                                </td>
                                <td><label for="Friday13-15"></label>
                                    <input type="checkbox" id="Friday13-15" name="time[]" value="Friday13-15">
                                </td>
                            </tr>
                            <tr>
                                <th>15:00-17:00</th>
                                <td><label for="Monday15-17"></label>
                                    <input type="checkbox" id="Monday15-17" name="time[]" value="Monday15-17">
                                </td>
                                <td><label for="Tuesday11-13"></label>
                                    <input type="checkbox" id="Tuesday15-17" name="time[]" value="Tuesday15-17">
                                </td>
                                <td><label for="Wednesday15-17"></label>
                                    <input type="checkbox" id="Wednesday15-17" name="time[]" value="Wednesday15-17">
                                </td>
                                <td><label for="Thursday13-15"></label>
                                    <input type="checkbox" id="Thursday15-17" name="time[]" value="Thursday15-17">
                                </td>
                                <td><label for="Friday13-15"></label>
                                    <input type="checkbox" id="Friday15-17" name="time[]" value="Friday15-17">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
                <!-- personal information update -->
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

                <input type="submit" value="Submit" name="submit" class="btn">
            </form>

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