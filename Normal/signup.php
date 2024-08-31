<?php
          $showAlert = false;

            //create a connection
            $conn = new mysqli('localhost','root','','Gym'); 
            //die if connection was not successful
            if(!$conn){
                die("Sorry failed to connect: ". mysqli_connect_error());
            }
            else{
                // echo "connection was successful<br>";
            }

            
        
          if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if(!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['duration']) || !isset($_POST['slot']) || !isset($_POST['course'])){
              echo '<script>alert("Please fill all the details")</script>';
              header('Refresh:1; signup.html');
            }
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
                $sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 1 MONTH),'$duration',$tid3,'unpaid')";
                // $sql1 = "UPDATE users SET end_date = DATEADD(MONTH, 1, current_timestamp()";

              }
              if($duration=="Quaterly"){
                $sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 3 MONTH),'$duration',$tid3,'unpaid')";

                // $sql1 = "UPDATE users SET end_date = DATEADD(MONTH, 3, current_timestamp()";
                // echo "hiiii22";
              }
              if($duration=="Half Yearly"){
                $sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 6 MONTH),'$duration',$tid3,'unpaid')";
                // $sql1 = "UPDATE users SET end_date = DATEADD(MONTH, 6, current_timestamp()";
                // echo "hiiii33";
              }
              if($duration=="Yearly"){
                $sql="INSERT INTO Member ( username, email, password ,start_date, end_date ,duration,tid,status) VALUES ('$username', '$email', '$password',CURRENT_DATE,DATE_ADD(CURRENT_DATE,INTERVAL 12 MONTH),'$duration',$tid3,'unpaid')";
                // $sql1 = "UPDATE users SET end_date = DATEADD(MONTH, 12, current_timestamp()";
                // echo "hiiii44";
              }

              
              $result = mysqli_query($conn,$sql);
              // $update = mysqli_query($conn,$sql1);

              if($result){
                $showAlert = true;
              }
              if($showAlert){
                // echo 'Your account is created';
                // echo '<a href="Login.html">Click here to go to Login Page</a>';
                echo '<script>alert("Account has been created")</script>';
                header('Refresh:1; login.html');
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

        