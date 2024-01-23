<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="Class Timetable" />
  <meta name="keywords" content="timetable" />
  <meta name="author" content="Huaxing Zhang, Claire Yue Xiao" />
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
  <title>CorpU - Allocate Class Timetable</title>
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
        <br>
    <h1>Class Timetable</h1>
    <!-- set up timetable allocation table functionality -->
    <form action="allocateconfirm.php" method="post">
      <table class="tables">

        <thead>
          <tr>
            <th>Courses</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>COS60004 <br /> Creating Web Applications</td>
            <td>COS60004 Online lecture<br />15.00-17.00<br>Gianna Williams</td>
            <td>COS60004 Tutorial<br />15.00-17.00<br><label for="cos60004">Name</label><br>  <!-- use dropdown menu to select sessional staff name-->
              <select name="cos60004" id="cos60004">
                <option value="" selected disabled hidden>Please Select</option>
                <option value="TarynClark">Taryn Clark</option>
                <option value="DanielYoung">Daniel Young</option>
                <option value="YunWong">Yun Wong</option>
                <option value="BrandenJones">Branden Jones</option>
                <option value="AyanChudal">Ayan Chudal</option>
              </select>
            </td>
            <td> </td>
            <td> </td>
            <td> </td>
          </tr>
          <tr>
            <td>COS60008 <br />Introduction to Data Science</td>
            <td> </td>
            <td> </td>
            <td>COS60008 Online lecture<br />13.00-15.00 <br />Ling Lin<br>COS60008 Tutorial<br />15.00-17.00<br><label
                for="cos60008">Name</label><br>
              <select name="cos60008" id="cos60008">  <!-- use dropdown menu to select sessional staff name-->
                <option value="" selected disabled hidden>Please Select</option>
                <option value="TarynClark">Taryn Clark</option>
                <option value="DanielYoung">Daniel Young</option>
                <option value="YunWong">Yun Wong</option>
                <option value="BrandenJones">Branden Jones</option>
                <option value="AyanChudal">Ayan Chudal</option>
              </select>
            </td>
            <td> </td>
            <td> </td>
          </tr>
          <tr>
            <td>COS60009 <br /> Data Management for the Big Data Age</td>
            <td> </td>
            <td> </td>
            <td>COS60009 Online lecture<br />13.00-15.00 <br />Kyle Piccio<br>COS60009
              Tutorial<br />15.00-17.00<br><label for="cos60009">Name</label><br>
              <select name="cos60009" id="cos60009">   <!-- use dropdown menu to select sessional staff name-->
                <option value="" selected disabled hidden>Please Select</option>
                <option value="TarynClark">Taryn Clark</option>
                <option value="DanielYoung">Daniel Young</option>
                <option value="YunWong">Yun Wong</option>
                <option value="BrandenJones">Branden Jones</option>
                <option value="AyanChudal">Ayan Chudal</option>
              </select>
            </td>
            <td> </td>
            <td> </td>
          </tr>
          <tr>
            <td>COS60010 <br /> Technology Inquiry Project</td>
            <td> </td>
            <td>COS60010 Online lecture<br />11.00-13.00<br>Ayan Chudal
            </td>
            <td> </td>
            <td> </td>
            <td>COS60010 Tutorial<br />11.00-13.00<br><label for="cos60010">Name</label><br>
              <select name="cos60010" id="cos60010">  <!-- use dropdown menu to select sessional staff name-->
                <option value="" selected disabled hidden>Please Select</option>
                <option value="TarynClark">Taryn Clark</option>
                <option value="DanielYoung">Daniel Young</option>
                <option value="YunWong">Yun Wong</option>
                <option value="BrandenJones">Branden Jones</option>
                <option value="AyanChudal">Ayan Chudal</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>COS70004 <br /> User Centred Design</td>
            <td> </td>
            <td> </td>
            <td>COS70004 Online lecture<br />13.00-15.00 <br />Parul Bhavsar<br>COS70004
              Tutorial<br />15.00-17.00<br>Parul Bhavsar</td>
            <td> </td>
            <td> </td>
          </tr>
          <tr>
            <td>COS80022 <br /> Software Quality and Testing</td>
            <td></td>
            <td>COS80022 Online lecture<br />13.00-15.00<br>Oliver Simmons</td>
            <td> </td>
            <td> </td>
            <td>COS80022Tutorial<br />9.00-11.00<br><label for="cos80022">Name</label><br>
              <select name="cos80022" id="cos80022">  <!-- use dropdown menu to select sessional staff name-->
                <option value="" selected disabled hidden>Please Select</option>
                <option value="Taryn Clark">Taryn Clark</option>
                <option value="DanielYoung">Daniel Young</option>
                <option value="YunWong">Yun Wong</option>
                <option value="BrandenJones">Branden Jones</option>
                <option value="AyanChudal">Ayan Chudal</option>
              </select>
            </td>

          </tr>
        </tbody>
      </table>
      <br>
      <input type="submit" name="submit" class="btn" value="Allocate">
    </form>
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