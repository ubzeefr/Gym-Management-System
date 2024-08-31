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

$category = $_POST['category'];
$exercise1 = $_POST['exercise'];
$exercise2 = $_POST['exercise2'];
$exercise3 = $_POST['exercise3'];
$exercise4 = $_POST['exercise4'];
$exercise5 = $_POST['exercise5'];
$exercise6 = $_POST['exercise6'];
$exercise7 = $_POST['exercise7'];
$exercise8 = $_POST['exercise8'];
$exercise9 = $_POST['exercise9'];
$exercise10 = $_POST['exercise10'];

    $sql = "UPDATE Workout set exercise1 = '$exercise1',exercise2 = '$exercise2',exercise3 = '$exercise3',exercise4 = '$exercise4',exercise5 = '$exercise5',exercise6 = '$exercise6',exercise7 = '$exercise7',exercise8 = '$exercise8',exercise9 = '$exercise9',exercise10 = '$exercise10' where category='$category'";
    $result = mysqli_query($conn, $sql);


  if($result){
    $showAlert = true;
  }
  if($showAlert){
    // echo 'Your account is created';
    // echo '<a href="Login.html">Click here to go to Login Page</a>';
    
    echo '<script>alert("workout have been updated")</script>';
    header('Refresh:1; admin-workout.php');
  }
  else{
    echo 'Sorry some error occured';
  }


  $conn->close();


?>