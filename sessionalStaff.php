<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Claire Yue Xiao, Huaxing Zhang, Kochapon Ussavaphark" />
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
    <script src="script/staff_details.js"></script>
    <title>Sessional Staff</title>
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
        <div class="sessional-staff">
            <br>
        <h2>Sessional Staff</h2>
        <!-- form for sessional staff information listing -->
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" name="sessionalStaff" id="sessionalStaff" method="post">
            <fieldset id="listquery">
                <legend>Sessional Staff List Menu</legend>
                    <p> 
                        <input type="radio" id="all" name="query" value="all">
                        <label for="all">All Sessional Staff</label>
                        <br>
                        <input type="radio" id="ID1" name="query" value="TarynClark">
                        <label for="ID1">Taryn Clark</label>
                        <br>
                        <input type="radio" id="ID2" name="query" value="DanielYoung">
                        <label for="ID2">Daniel Young</label>
                        <br>
                        <input type="radio" id="ID3" name="query" value="YunWong">
                        <label for="ID3">Yun Wong</label>
                        <br>
                        <input type="radio" id="ID4" name="query" value="BrandenJones">
                        <label for="ID4">Branden Jones</label>
                        <br>
                        <input type="radio" id="ID5" name="query" value="AyanChudal">
                        <label for="ID5">Ayan Chudal</label>
                    </p>
            </fieldset>
            <p><input type="submit" class="btn" value="List" name="submit"></p>            
        </form>   
        
    <?php        
            // process the sessional staff information listing request from front-end to back-end 
            // connect to database once list button is clicked
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

                    // Set up the SQL command to query or change data of table
                    if (isset($_POST["query"])) {  // retrieve all records from table
                        if ($_POST["query"] === "all") {
                            $allQuery = "select * from $sql_table;";

                            $allResult = @mysqli_query($conn, $allQuery);  // execute the query
                            if (!$allResult) {
                                echo "<p class=\"wrong\">Something is wrong with $allQuery.</p>";                                    
                            }
                            if (mysqli_num_rows($allResult) > 0) {
                                // Display the retrieved records
                                echo "<h4>List All Sessional Staff</h4>";
                                echo "<table id=\"sessionalstafftable\">";
                                echo "<tr>\n"
                                    ."<th scope=\"col\">SessionalID</th>\n"
                                    ."<th scope=\"col\">First Name</th>\n"
                                    ."<th scope=\"col\">last Name</th>\n"
                                    ."<th scope=\"col\">Gender</th>\n"
                                    ."<th scope=\"col\">Date of Birth</th>\n"
                                    ."<th scope=\"col\">Address</th>\n"                                
                                    ."<th scope=\"col\">Email</th>\n"
                                    ."<th scope=\"col\">Phone Number</th>\n"                                                               
                                    ."<th scope=\"col\">Teaching Courses</th>\n"
                                    ."<th scope=\"col\">Available Time</th>\n"                                                          
                                    ."</tr>\n";
                                // retrieve current record pointed by the result pointer
                                
                                while ($row = mysqli_fetch_assoc($allResult)){
                                    echo "<tr>";
                                    echo "<td>",$row["Sstaff_no"],"</td>\n";
                                    echo "<td>",$row["Sfirst_name"],"</td>\n";
                                    echo "<td>",$row["Slast_name"],"</td>\n";
                                    echo "<td>",$row["Gender"],"</td>\n";
                                    echo "<td>",$row["DateofBirth"],"</td>\n";
                                    echo "<td>",$row["Address"],"</td>\n";                                
                                    echo "<td>",$row["Email"],"</td>\n";
                                    echo "<td>",$row["Phone"],"</td>\n";                                
                                    echo "<td>",$row["Unit"],"</td>\n";                               
                                    echo "<td>",$row["Available"],"</td>\n";                               
                                    echo "</tr>";
                                }
                                echo "</table>\n";
                                // Frees up the memory, after using the result pointer
                                mysqli_free_result($allResult);
                            } else {
                                echo "<p class=\"ok\">There is no result!</p>";
                            }
                        }
                        
                        // use if conditional flow to list specific sessional staff detail
                        if ($_POST["query"] === "TarynClark") {

                            $query1 = "select * from $sql_table where Sstaff_no='s001';"; 
                            $result1 = @mysqli_query($conn, $query1);
                            if (!$result1) {
                                echo "<p class=\"wrong\">Something is wrong with $query1.</p>";                                    
                            }
                            if (mysqli_num_rows($result1) > 0) {
                                $row = mysqli_fetch_object($result1);                                
                                echo "<h4>Detail of Taryn Clark</h4>";
                                echo "<ul>
                                    <li><button id=\"show-button-6\" class=\"show-button\">
                                    <image src=\"\" alt=\"\">Taryn Clark</button>
                                        <div id=\"staff-details-taryn\" class=\"staff\">

                                        <img src=\"images/staff/employee6_taryn.jpg\" width=\"300\" height=\"200\"><br>

                                            Name: $row->Sfirst_name $row->Slast_name<br />
                                            Gender: $row->Gender<br />
                                            Date of Birth: $row->DateofBirth<br />
                                            Address: $row->Address<br />
                                            Email: $row->Email<br />
                                            Phone Number: $row->Phone<br />
                                            Teaching Courses: $row->Unit<br />                    
                                            Available Time: $row->Available<br /> 

                                            <button id=\"close-button-6\" class=\"close-button\">Close</button> <br />


                                        </div>
                                    </li>
                                </ul>";
                            }
                        }

                        if ($_POST["query"] === "DanielYoung") {

                            $query1 = "select * from $sql_table where Sstaff_no='s002';";
                            $result1 = @mysqli_query($conn, $query1);
                            if (!$result1) {
                                echo "<p class=\"wrong\">Something is wrong with $query1.</p>";                                    
                            }
                            if (mysqli_num_rows($result1) > 0) {
                                $row = mysqli_fetch_object($result1);                                
                                echo "<h4>Detail of Daniel Young</h4>";
                                echo "<ul>
                                    <li><button id=\"show-button-6\" class=\"show-button\"><image src=\"\" alt=\"\">Daniel Young</button>
                                    <div id=\"staff-details-taryn\" class=\"staff\">

                                    <img src=\"images/staff/employee7_daniel.jpg\" width=\"300\" height=\"200\"><br>

                                            Name: $row->Sfirst_name $row->Slast_name<br />
                                            Gender: $row->Gender<br />
                                            Date of Birth: $row->DateofBirth<br />
                                            Address: $row->Address<br />
                                            Email: $row->Email<br />
                                            Phone Number: $row->Phone<br />
                                            Teaching Courses: $row->Unit<br />                    
                                            Available Time: $row->Available<br />  
                                            
                                            <button id=\"close-button-6\" class=\"close-button\">Close</button> <br />
                                        </div>
                                    </li>
                                </ul>";
                            }
                        }

                        if ($_POST["query"] === "YunWong") {

                            $query1 = "select * from $sql_table where Sstaff_no='s003';";
                            $result1 = @mysqli_query($conn, $query1);
                            if (!$result1) {
                                echo "<p class=\"wrong\">Something is wrong with $query1.</p>";                                    
                            }
                            if (mysqli_num_rows($result1) > 0) {
                                $row = mysqli_fetch_object($result1);                                
                                echo "<h4>Detail of Yun Wong</h4>";
                                echo "<ul>
                                    <li><button id=\"show-button-6\" class=\"show-button\"><image src=\"\" alt=\"\">Yun Wong</button>
                                        <div id=\"staff-details-taryn\" class=\"staff\">

                                        <img src=\"images/staff/employee8_yun.JPG\" width=\"300\" height=\"200\"><br>

                                            Name: $row->Sfirst_name $row->Slast_name<br />
                                            Gender: $row->Gender<br />
                                            Date of Birth: $row->DateofBirth<br />
                                            Address: $row->Address<br />
                                            Email: $row->Email<br />
                                            Phone Number: $row->Phone<br />
                                            Teaching Courses: $row->Unit<br />                    
                                            Available Time: $row->Available<br /> 
                                            <button id=\"close-button-6\" class=\"close-button\">Close</button> <br /> 
                                        </div>
                                    </li>
                                </ul>";
                            }
                        }

                        if ($_POST["query"] === "BrandenJones") {

                            $query1 = "select * from $sql_table where Sstaff_no='s004';";
                            $result1 = @mysqli_query($conn, $query1);
                            if (!$result1) {
                                echo "<p class=\"wrong\">Something is wrong with $query1.</p>";                                    
                            }
                            if (mysqli_num_rows($result1) > 0) {
                                $row = mysqli_fetch_object($result1);                                
                                echo "<h4>Detail of Branden Jones</h4>";
                                echo "<ul>
                                    <li><button id=\"show-button-6\" class=\"show-button\"><image src=\"\" alt=\"\">Branden Jones</button>
                                        <div id=\"staff-details-taryn\" class=\"staff\">
                                        
                                        <img src=\"images/staff/employee9_branden.JPG\" width=\"300\" height=\"200\"><br>
                                        
                                            Name: $row->Sfirst_name $row->Slast_name<br />
                                            Gender: $row->Gender<br />
                                            Date of Birth: $row->DateofBirth<br />
                                            Address: $row->Address<br />
                                            Email: $row->Email<br />
                                            Phone Number: $row->Phone<br />
                                            Teaching Courses: $row->Unit<br />                    
                                            Available Time: $row->Available<br />  
                                            <button id=\"close-button-6\" class=\"close-button\">Close</button> <br />
                                        </div>
                                    </li>
                                </ul>";
                            }
                        }

                        if ($_POST["query"] === "AyanChudal") {

                            $query1 = "select * from $sql_table where Sstaff_no='s005';";
                            $result1 = @mysqli_query($conn, $query1);
                            if (!$result1) {
                                echo "<p class=\"wrong\">Something is wrong with $query1.</p>";                                    
                            }
                            if (mysqli_num_rows($result1) > 0) {
                                $row = mysqli_fetch_object($result1);                                
                                echo "<h4>Detail of Ayan Chudal</h4>";
                                echo "<ul>
                                    <li><button id=\"show-button-6\" class=\"show-button\"><image src=\"\" alt=\"\">Ayan Chudal</button>
                                        <div id=\"staff-details-taryn\" class=\"staff\">

                                        <img src=\"images/staff/employee10_ayan.JPG\" width=\"300\" height=\"200\"><br>
                                            
                                            Name: $row->Sfirst_name $row->Slast_name<br />
                                            Gender: $row->Gender<br />
                                            Date of Birth: $row->DateofBirth<br />
                                            Address: $row->Address<br />
                                            Email: $row->Email<br />
                                            Phone Number: $row->Phone<br />
                                            Teaching Courses: $row->Unit<br />                    
                                            Available Time: $row->Available<br />  
                                            <button id=\"close-button-6\" class=\"close-button\">Close</button> <br />
                                        </div>
                                    </li>
                                </ul>";
                            }
                        }
                        
                    }                 
                    // close the database connection
                    mysqli_close($conn);
                } // if successful database connection
            } 
        ?>
               
        
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
    </div>
    
</body>
</html>