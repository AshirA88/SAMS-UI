<!-- PHP Session to verify if the user has logged in, if not redirect to log in page -->
<?php
    session_start();
    error_reporting(0);
    include('../includes/config.php');
    if(strlen($_SESSION['alogin'])==0)
    {
        header('location:../index.php');
    }
    else
    {
        //main logic
        include('../includes/header.php');      // header
?>

<!doctype html>
<html lang="en">
    
    <head>
        <title>Smart Attendance Management System Using Raspberry PI</title>
        <link rel = "icon" href = "../img/logo.png" type = "image/x-icon">
    </head>

</html>







<!-- PHP end here -->
<?php
    }
?>