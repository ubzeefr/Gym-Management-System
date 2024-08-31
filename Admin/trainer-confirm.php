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

$tid = $_POST['tid'];
$tname = $_POST['name'];

    $sql = "UPDATE Trainer set t_name = '$tname' where tid='$tid'";
    $result = mysqli_query($conn, $sql);


  if($result){
    $showAlert = true;
  }
  if($showAlert){
    // echo 'Your account is created';
    // echo '<a href="Login.html">Click here to go to Login Page</a>';
    
    echo '<script>alert("Trainer have been updated")</script>';
    header('Refresh:1; admin-trainer.php');
  }
  else{
    echo 'Sorry some error occured';
  }


  $conn->close();


?>