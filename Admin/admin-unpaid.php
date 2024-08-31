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
            <a class="nav-link" href="admin-home.html"
              >HOME <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-members.php">MEMBERS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-register.html">REGISTER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-package.php">PACKAGES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-workout.php">WORKOUTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin-trainer.php">TRAINERS</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="admin-unpaid.php">UNPAID</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>


    <div class="mx-5 my-5">    <!--row justify-content-center -->
      <table class="table table-hover table-dark"> 
        <thead> <!--  table-fit -->
          <tr>
              <th>Username</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Duration</th>
              <th>Shift</th>
              <th>Course</th>
              <th>Membership</th>
              <th>Action</th>
          </tr>
          </thead>
          <!-- PHP CODE TO FETCH DATA FROM ROWS -->

          <tbody>

          <?php  

          
    
            $query = "SELECT * FROM ((Member natural join Trainer) natural join Category) where end_date < CURRENT_DATE";

            if ($result = mysqli_query($conn,$query)) {
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    
                   

                    // End Date finding
                            // if($row['duration']=="One Month"){
                            //     $end_date=$row['start_date'] + 30;
                            //     //$field3name = date_diff($end_date,$row['start_date']);
                                
                            // }
                            // if($row['duration']=="Quaterly"){
                            //     // $end_date = strtotime("+3 months",$row['start_date']);
                            //     // $end_date = strftime ( 'Y/m/d' , $end_date );
                            //     $end_date = date('m/d/y H:i:s', strtotime($row['start_date'] . "+3 months") );
                            //     $start_date =  date("m/d/y H:i:s", strtotime($row['start_date'] . "+0 months"));
                            //     // $end_date = date("d F Y", $end_date);
                            //     $field3name = date_diff($end_date,$start_date);
                            // }
                            // if($row['duration']=="Half Yearly"){
                            //     $end_date=$row['start_date'] + 180;
                            // }
                            // if($row['duration']=="Yearly"){
                            //     $end_date=$row['start_date'] + 365;
                            // }
                    $field1name = $row["username"];
                    $field2name = $row["start_date"];
                    $field3name = $row["end_date"];
                    $field4name = $row["duration"]; 
                    $field5name = $row["slot"]; 
                    $field6name = $row["c_name"];
                    $field7name = "Expired";
                    
            
                    echo '<tr> 
                              <td>'.$field1name.'</td> 
                              <td>'.$field2name.'</td> 
                              
                              <td>'.$field3name.'</td> 
                              <td>'.$field4name.'</td> 
                              
                              <td>'.$field5name.'</td> 
                              <td>'.$field6name.'</td> 
                              <td>'.$field7name.'</td> 

                              <td><a href="admin-renew-member.php?username='.$row['username'].'"><button class="btn btn-sm btn-success">
                            renew</button></td>

                          </tr>';
                }
                $result->free();
            } 

            ?>
          </tbody>
        </table>
   

    
    <footer class="mx-2 fixed-bottom">
      <div class="row">
        <div class="col-md-6">
          <p>@2022 Gymster's Gym.in. All Rights Reserved.</p>
        </div>
        <!-- <div class="col-sm-2 col-xs-6"></div>
        <div class="col-sm-2 col-xs-6"></div> -->
        <div class="col-md-6" style="text-align: right;">
          <a href=""
            >Terms &amp; Conditions</a
          >
          |<a href=""> Privacy Policy</a>
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
