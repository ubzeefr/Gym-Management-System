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

$username1 = $_POST['username'];
$duration = $_POST['duration'];
$slot = $_POST['slot'];
$course = $_POST['course'];

// echo $username1;
// echo $duration;
// echo $slot;
// echo $course;

$end = "SELECT end_date FROM Member where username = '$username1' ";

$end1 = mysqli_query($conn,$end);
$end2 = $end1->fetch_assoc();

$end3 = $end2["end_date"];

// echo $end3;


$tid = "SELECT tid from ((Member natural join Trainer) natural join Category) where slot = '$slot' and c_name = '$course'";

$tid1 = mysqli_query($conn,$tid);
$tid2 = $tid1->fetch_assoc();

$tid3 = $tid2["tid"];

// echo $tid3;

if($duration=="One Month"){
    // echo "hiiii";
    $sql = "UPDATE Member set start_date = '$end3', end_date = DATE_ADD('$end3',INTERVAL 1 MONTH),duration = '$duration',tid = $tid3,status='paid' where username = '$username1'";
    //$sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 1 MONTH),'$duration',$tid3,'unpaid')";
    // $sql1 = "UPDATE users SET end_date = DATEADD(MONTH, 1, current_timestamp()";
  }
  if($duration=="Quaterly"){
      //$sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 3 MONTH),'$duration',$tid3,'unpaid')";
      $sql = "UPDATE Member set start_date = '$end3', end_date = DATE_ADD('$end3',INTERVAL 3 MONTH),duration = '$duration',tid = $tid3,status='paid' where username = '$username1'";
    

  }
  if($duration=="Half Yearly"){
    //$sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 6 MONTH),'$duration',$tid3,'unpaid')";
    $sql = "UPDATE Member set start_date = '$end3', end_date = DATE_ADD('$end3',INTERVAL 6 MONTH),duration = '$duration',tid = $tid3,status='paid' where username = '$username1'";

  }
  if($duration=="Yearly"){
    //$sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 12 MONTH),'$duration',$tid3,'unpaid')";
    $sql = "UPDATE Member set start_date = '$end3', end_date = DATE_ADD('$end3',INTERVAL 12 MONTH),duration = '$duration',tid = $tid3,status='paid' where username = '$username1'";
  }

  
  $result = mysqli_query($conn,$sql);
  // $update = mysqli_query($conn,$sql1);

  if($result){
    $showAlert = true;
  }
  if($showAlert){
    // echo 'Your account is created';
    // echo '<a href="Login.html">Click here to go to Login Page</a>';
    
    echo '<script>alert("Membership has been renewed")</script>';
    header('Refresh:1; admin-unpaid.php');
  }
  else{
    echo 'Sorry some error occured';
  }


  $conn->close();


?>