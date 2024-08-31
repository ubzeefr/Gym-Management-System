<?php

    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "Gym";  
      
    $conn = mysqli_connect($host, $user, $password, $db_name); 
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    $username = $_POST['username'];  
    $password = $_POST['password'];

    
    //Admin Part
    $admin = "admin";
    $pass = "9322667354";

    // Sessions
    session_start();

    $_SESSION['admin'] = $admin;
    $_SESSION['username'] = $username;


if ($username == $admin && $password == $pass) {

    if(!isset($_SESSION['admin'])){
        header("Location: ../Normal/login.html");
    }
    else{
        header("Location: ../Admin/admin-home.html");
    }
    
} else {
    
    //User Part

    //to prevent from mysqli injection  
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "select * from Member where username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // echo "<h1><center> Login successful </center></h1>";
        // $_SESSION['username'] = $username;

        if(!isset($_SESSION["username"])){
            header("Location: ../Normal/login.html");
        }
        else{
           
                header("Location: ../User/user-home.html");
        }

        // header("Location: ../User/check.php");
        // header("Location: ../User/user-home.html");
    }
    if ($count == null) {
        echo "USER NOT FOUND";
        echo "<p>PLEASE LOGIN TO CONTINUE</p>";
        echo "<button onclick=\"location.href='login.html'\">LOGIN</button>";
        //header("Location:login.html");
    } else {
        echo "<h1> Login failed. Invalid username or password.</h1>";
    }

    // mysqli_close($con);
}
?>