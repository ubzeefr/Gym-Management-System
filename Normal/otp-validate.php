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

$email = $_POST['email'];
        if(empty($email))
        {
            echo 'empty';
        }
        else{
            $sql="SELECT * FROM `Member` WHERE `email` = '$email'";
    
            $res=mysqli_query($conn,$sql);
    
            if(mysqli_num_rows($res)==0)
            {
                echo "no";
            }else{
                $num=0;
                while(strlen((string)$num)!=6)
                {
                    $num*=10;
                    $num+=rand(0,9);
                }
                $_SESSION['otp']=$num;
                $_SESSION['email']=$email;
            }
        }
?>



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
        /* .btn1{
            height: 40px;
            width: 15%;
            border-radius: 10px;
            font-weight: 600;
            background-color: rgb(224, 98, 19);
        } */
        /* .loginbox{
            background-color: rgba(240, 255, 255, 0.772);
            margin-top: 15%;
        } */
        
    </style>
</head>
  <body>
    <div class="wrapper">
        <header style="font-size: 25px;">OTP VERIFY</header>
        <form action="forgot-password-2.php" method="POST">
          <div class="field user">
            <div class="input-area">
              <input required type="text" placeholder="OTP" name="OTP">
              <i class="icon fa fa-inbox" aria-hidden="true"></i>
              <i class="error error-icon bi bi-exclamation-circle"></i>
            </div>
            <div class="error error-txt">OTP can't be blank</div>
          </div>
          <input type="submit" name="submit" value="submit">
        </form>
      </div>

    
      <script src="script-login.js"></script>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>


