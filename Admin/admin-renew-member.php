<?php

$host = "localhost";  
$user = "root";  
$password = '';
$db_name = "Gym";  
  
$conn = mysqli_connect($host, $user, $password, $db_name); 
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}

$username = $_GET['username'];

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

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }
    .card-registration .select-arrow {
        top: 13px;
    }



  </style>
  <body>
   
   
    <section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="register-img.webp"
                alt="Sample photo" class="img-fluid"
                style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase">Renewal form</h3>


                <!-- form start -->
                <form action="renew-confirm.php" method="POST">
                <div class="form-outline mb-4">
                <input class="form-control" id="disabledInput" type="text" name="username" value="<?php echo $username ?>" readonly="">
                  <label class="form-label" for="disabledInput">Username</label>
                </div>

                <div class="form-outline mt-4">
                <select class="form-select form-control form-control-lg text-center" aria-label="Default select example" name="duration">
                <option selected>-------Select Duration-------</option>
            <option value="One Month">One Month</option>
            <option value="Quaterly">Quaterly</option>
            <option value="Half Yearly">Half Yearly</option>
            <option value="Yearly">Yearly</option>
                </select>
                </div>

                <div class="form-outline mt-4">
                <select class="form-select form-control form-control-lg text-center" aria-label="Default select example" name="slot">
                <option selected>-------Select Time Slot-------</option>
            <option value="Morning">Morning</option>
            <option value="Evening">Evening</option>
                </select>
                </div>

                <div class="form-outline mt-4">
                <select class="form-select form-control form-control-lg text-center" aria-label="Default select example" name="course">
                <option selected>--------Select Course--------</option>
            <option value="Cardio Training">Cardio Training</option>
            <option value="Strength Training">Strength Training</option>
            <option value="Aerobics">Aerobics</option>
                </select>
                </div>
               

 
                <div class="d-flex justify-content-end pt-3 my-4">
                  <button type="reset" class="btn btn-light btn-lg mx-2 border">Reset all</button>
                  <button type="submit" class="btn btn-warning btn-lg ms-2 border">Renew Membership</button>
                </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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

