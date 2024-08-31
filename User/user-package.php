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
      width: 10%;
      height: auto;
      margin-right: 20%;
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
      padding-top: 10px;
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

    /* table.table-fit {
    width: auto !important;
    table-layout: auto !important;
    }
    table.table-fit thead th, table.table-fit tfoot th {
        width: auto !important;
    }
    table.table-fit tbody td, table.table-fit tfoot td {
        width: auto !important;
    } */




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
            <a class="nav-link" href="user-home.html"
              >HOME <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user-workout.php">WORKOUT</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="user-package.php">PACKAGE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user-about.html">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user-contact.html">CONTACT US</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="user-logout.php">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>

    

    <section class="bg-danger mx-2">
      <h1 class="text-center my-5 bg-success"><span>Membership Details</span></h1>
      <!-- TABLE CONSTRUCTION -->
      <div class="mx-5">    <!--row justify-content-center -->
      <table class="table table-hover table-dark"> 
        <thead> <!--  table-fit -->
          <tr>
              <th>Username</th>
              <th>Email</th>
              
              <th>Start Date</th>
              <th>End Date</th>
              <th>Duration</th>
              <th>Trainer Name</th>
              <th>Shift</th>
              <th>Course</th>
          </tr>
          </thead>
          <!-- PHP CODE TO FETCH DATA FROM ROWS -->
          <?php

            session_start();
            $username = $_SESSION['username'];  

            $sql = "select * from ((Member natural join Trainer) natural join Category) where username = '$username'";

            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

              //fetching for slot
            // $trainer = $row['tid'];

            // $sql1 = "select * from Trainer where tid = $trainer";

            // $result1 = mysqli_query($conn, $sql1);
            // $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

            // //fetching for course from Category
            // $course = $row1['cid'];

            // $sql2 = "select * from Category where cid = $course";

            // $result2 = mysqli_query($conn, $sql2);
            // $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

              
          ?>

          <tbody>
          <tr>
              <!-- FETCHING DATA FROM EACH
                  ROW OF EVERY COLUMN -->
              <td><?php echo $row['username'];?></td>
              <td><?php echo $row['email'];?></td>
              
              <td><?php echo $row['start_date'];?></td>
              <td><?php echo $row['end_date'];?></td>
              <td><?php echo $row['duration'];?></td>
              <td><?php echo $row['t_name'];?></td>     
              <td><?php echo $row['slot'];?></td>
              <td><?php echo $row['c_name'];?></td>

            <!-- <?php// To propmt whether package active or not
            // echo "date("Y-m-d")";
            // if($row['end_date']<date("Y-m-d")){
            //     echo '<script>alert("Please Renew your Membership")<script>';
            //     // echo '<script>alert("Account has been created")</script>';
            // }
            ?> -->
              
          </tr>
          </tbody>
          <!-- <?php
              // }
          ?> -->
      </table>
      </div>
  </section>

    

    <footer class="mx-2 fixed-bottom">
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
