

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style-css-login.css">
    <style>
        body{
            background-image:url(login.png);
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
            background-size: cover;
        }
        
    </style>
</head>
  <body>
    <div class="wrapper">
        <header>Create Password</header>
        <form action="forgot-password-2.php" method="POST">  
          <div class="field password">
            <div class="input-area">
              <input type="password" placeholder="New Password" name="newpassword">
              <i class="icon fa fa-lock"></i>
              <i class="error error-icon bi bi-exclamation-circle"></i>
            </div>
            <div class="error error-txt">Password can't be blank</div>
          </div>
          <div class="field password">
            <div class="input-area">
              <input type="password" placeholder="Confirm Password" name="cpassword">
              <i class="icon fa fa-lock"></i>
              <i class="error error-icon bi bi-exclamation-circle"></i>
            </div>
            <div class="error error-txt">Password can't be blank</div>
          </div>
          <input type="submit" value="Login">
        </form>
      </div>

    
      <script src="script-login.js"></script>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<?php

session_start();

$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "Gym";  
  
$conn = mysqli_connect($host, $user, $password, $db_name); 
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}

if(isset($_POST['OTP']))
{
    $otp=$_POST['OTP'];
    if(strlen((string)$otp)!=6){
        echo "less";
    }
    else{
        if($_SESSION['otp']!=$otp){
            echo "no";
        }
        else{
            echo "yes";
        }
    }
}

// if(isset($_POST['ResendOtp']))
// {
//     $num=0;
//     while(strlen((string)$num)!=6)
//     {
//         $num*=10;
//         $num+=rand(0,9);
//     }
//     $_SESSION['otp']=$num;
//     include "Php/mail.php";
// }


if(isset($_POST['newpassword']))
{
    $email=$_SESSION['email'];
    $password=$_POST["Password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql="UPDATE `user` SET `pwd` = '$hashed_password' WHERE email = '$email'";

    $res=mysqli_query($db,$sql);

    if(!$res)
    {
        echo "no";
    }
}
?>