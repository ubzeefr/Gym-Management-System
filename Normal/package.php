<?php
        $host = "localhost";  
        $user = "root";  
        $password = '';  
        $db_name = "Gym";  
          
        $conn = mysqli_connect($host, $user, $password, $db_name); 
        if(mysqli_connect_errno()) {  
            die("Failed to connect with MySQL: ". mysqli_connect_error());  
        }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <title>GYMSTER</title>
  </head>
  <style>
    .logo {
      width: 15%;
      height: auto;
      margin-right: 15%;
    }
    img {
      width: 100%;
      height: 100%;
    }
    .navbar {
      background-color: rgba(217, 217, 217);
    }
    .collapse.navbar-collapse.itemcolor ul li a {
      color: black;
      font-weight: 600;
      font-size: medium;
      /* word-spacing: 30%; */
      padding-top: 13px;
      /* float: left; */
    }
    .collapse.navbar-collapse.itemcolor ul li {
      margin-left: 20px;
      margin-right: 20px;
    }
    .collapse.navbar-collapse.itemcolor ul li a:hover {
      color: rgb(158, 153, 153);
    }
    .collapse.navbar-collapse.itemcolor ul .nav-item.active a {
      color: rgb(0, 0, 0);
      font-weight: 600;
      /* color: rgb(50, 44, 44); */
      /* background-color: aliceblue; */
      /* font-size: small; */
    }
  
  </style>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div
        class="collapse navbar-collapse itemcolor"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav mr-auto">
          <div class="logo">
            <img src="GymLogo2.png" alt="logo" />
          </div>

          <li class="nav-item">
            <a class="nav-link" href="Home.html"
              >HOME <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="facility.html">FACILITIES</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="package.html">PACKAGES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">CONTACT US</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="login.html">LOGIN</a>
          </li>

          <!-- <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-toggle="dropdown"
              aria-expanded="false"
            >
              TOPICS
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">C</a>
              <a class="dropdown-item" href="#">C++</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">java</a>
            </div>
          </li> -->
        </ul>
      </div>
    </nav>

    <div class="membership mt-3" style="text-align: center;font-size: 20px;">
        <b>MEMBERSHIP PLANS</b>
    </div>
    
    <div class="mx-5 my-5">        <!--row justify-content-center -->
      
    
    <table class="table table-hover table-dark text-center">
         <thead> <!--  table-fit -->
          <tr>
              <th>DURATION</th>
              <th>CARDIO TRAINING</th>
              <th>STRENGTH TRAINING</th>
              <th>AEROBICS</th>
      </tr>
          </thead>
           <!-- PHP CODE TO FETCH DATA FROM ROWS -->

          <tbody>

          <?php 
    
            $query = "SELECT * FROM Prices";

            if ($result = mysqli_query($conn,$query)) { 
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                    echo '<tr> 
                            <td>' . $row["duration"] . '</td>
                            <td>' . $row["cardio"] . '</td>
                            <td>' . $row["strength"] . '</td>
                            <td>' . $row["aerobics"] . '</td>

                          </tr>';

              echo "<tr>";

              }
                mysqli_free_result($result);
            } 

            ?>
        </tbody>
      </table>

       
</div>
    

    <div style="margin: 50px;">
      <p><b>NOTE:</b></p>
      <p>All rates are in Indian Rupees</p>
      <p>General rates are applicable for per person basis</p>
      <p>Morning Shift is between 5:00 am to 10:00 am</p>
      <p>Evening Shift is between 4:00 pm to 10:00 pm</p>
    </div>

    <footer class="mx-2">
      <div class="row">
        <div class="col-md-6">
          <p>@2022 Gymster's Gym.in. All Rights Reserved.</p>
        </div>
        <!-- <div class="col-sm-2 col-xs-6"></div>
        <div class="col-sm-2 col-xs-6"></div> -->
        <div class="col-md-6" style="text-align: right;">
          <a href="#"
            >Terms &amp; Conditions</a
          >
          |<a href="#"> Privacy Policy</a>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
