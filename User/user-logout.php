<?php

session_start();
session_unset(); //unset all the variables
session_destroy();  //destroys the session;

header('Location: ../Normal/login.html');

?>