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



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // echo "This is request method";
 
    // if (empty($user_name)) {
    //   echo "Name is empty";
    // }
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $duration=$_POST['duration'];
    $slot=$_POST['slot'];
    $course=$_POST['course'];

    // var_dump($_POST);
}

  // echo $duration;

    $tid = "SELECT tid FROM Trainer natural join Category where c_name = '$course' and slot ='$slot'";
    
    $tid1 = mysqli_query($conn,$tid);

      $tid2 = $tid1->fetch_assoc();
  //   $tid1 = $conn->query($tid);

    // echo "The tid id:" .$tid2["tid"];

    $tid3 = $tid2["tid"];

    if($duration=="One Month"){
      // echo "hiiii";
      $sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 1 MONTH),'$duration',$tid3,'paid')";
      // $sql1 = "UPDATE users SET end_date = DATEADD(MONTH, 1, current_timestamp()";

    }
    if($duration=="Quaterly"){
      $sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 3 MONTH),'$duration',$tid3,'paid')";

      // $sql1 = "UPDATE users SET end_date = DATEADD(MONTH, 3, current_timestamp()";
    //   echo "hiiii22";
    }
    if($duration=="Half Yearly"){
      $sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 6 MONTH),'$duration',$tid3,'paid')";
      // $sql1 = "UPDATE users SET end_date = DATEADD(MONTH, 6, current_timestamp()";
      // echo "hiiii33";
    }
    if($duration=="Yearly"){
      $sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 12 MONTH),'$duration',$tid3,'paid')";
      // $sql1 = "UPDATE users SET end_date = DATEADD(MONTH, 12, current_timestamp()";
      // echo "hiiii44";
    }

    
    $result = mysqli_query($conn,$sql);
    // $update = mysqli_query($conn,$sql1);

    if($result){
      $showAlert = true;
    }
    if($showAlert){
      echo '<script>alert("Account has been created")</script>';
      header('Refresh:1; admin-register.html');
    }
    else{
      echo 'Sorry some error occured';
    }
 
    $conn->close();
  // if ($conn->query($sql) === TRUE) {
  //     echo "record inserted successfully";
  // } else {
  //     echo "Error: " . $sql . "<br>" . $conn->error;
  // }

?>

