<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Huaxing Zhang, Pengfei Li, Kochapon Ussavaphark" />
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
    <title>Request Recruitment Information from Backend</title>
</head>

<body>
    <div class="container">
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

        <!-- recruitment form for requesting and listing applicant details   -->

        <main id="recruitmentbody">
            <br>
            <h1>Information of Job Application</h1>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <fieldset id="listquery">
                    <p>
                        <label for="all">Show All Applicants Details</label>
                        <input type="radio" id="all" name="allquery" value="all">
                    </p>
                </fieldset>
                <p><input type="submit" value="List" class="btn" name="submit" /></p>
            </form>
            <?php

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
                    $sql_table = "Applicant";

                    // Set up the SQL command to query or change data of table
                    if (isset($_POST["allquery"])) { // retrieve all records from table
                        echo "<h2>List All Applicants</h2>";

                        $allQuery = "select * from $sql_table;";

                        $allResult = @mysqli_query($conn, $allQuery); // execute the query
                        if (!$allResult) {
                            echo "<p class=\"wrong\">Something is wrong with $allQuery.</p>"; // show error message if query is wrong
                        }
                        if (mysqli_num_rows($allResult) > 0) {
                            // Display the retrieved records in the form of table
                            echo "<table id=\"recruitmenttable\">";
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

                            while ($row = mysqli_fetch_assoc($allResult)) {
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
                                echo "<td>", '<a href="mailto:' . $row["Email"] . '">' . $row["Email"], "</td>\n";
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
                            mysqli_free_result($allResult);
                        } else {
                            echo "<p class=\"ok\">There is no result!</p>";
                        }
                    }
                    // close the database connection
                    mysqli_close($conn);
                } // if successful database connection
            }
            ?>

            <br><br>
            <!-- Approve an application -->
            <Form id="applyChange" class="applyChange" method="post" action="applyChange.php" novalidate="novalidate">
                <fieldset>
                    <legend>Approval of Application:</legend>
                    <p><label for="applyNumber">For Apply Number: </label><br>
                        <input type="text" ID="applyNumber" name="applyNumber" style="width: 500px;">
                    </p>
                    <p>
                        <label for="applyStatus">Change Status to:</label><br>
                        <select name="applyStatus" id="applyStatus" required>
                            <option value="" selected disabled hidden>Please Select</option>
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </p>
                    <button type="submit" name="change" class="btn" style="width: auto;">Confirm</button>
                </fieldset>
            </Form>



            <!-- Delete an application -->
            <br><br>
            <form id="deleteForm" class="deleteForm" method="post" action="applyDelete.php" novalidate="novalidate">
                <fieldset>
                    <legend>Delete Applications</legend>
                    <p><label for="applyDelete">Application Number: </label><br>
                        <input type="text" ID="applyDelete" name="applyDelete" style="width: 500px;">
                    </p>
                    <button type="submit" name="delete" class="btn" style="width: auto;">Delete Application</button>
                </fieldset>
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