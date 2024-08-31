<?php

$host = "localhost";  
$user = "root";  
$password = '';
$db_name = "Gym";  
  
$conn = mysqli_connect($host, $user, $password, $db_name); 
if(mysqli_connect_errno()) {  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}

$showAlert = false;

$duration = $_POST['duration'];
$cardio = $_POST['cardio'];
$strength = $_POST['strength'];
$aerobics = $_POST['aerobics'];


    $sql = "UPDATE Prices set cardio = '$cardio', strength = '$strength',aerobics = '$aerobics' where duration='$duration'";
    $result = mysqli_query($conn, $sql);


  if($result){
    $showAlert = true;
  }
  if($showAlert){
    // echo 'Your account is created';
    // echo '<a href="Login.html">Click here to go to Login Page</a>';
    
    echo '<script>alert("Prices have been updated")</script>';
    header('Refresh:1; admin-package.php');
  }
  else{
    echo 'Sorry some error occured';
  }


  $conn->close();


?>