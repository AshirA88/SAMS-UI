<!-- First skeleton made by Ashir for creating the main framework of the UI -->

<!-- PHP Session to verify if the user has logged in, if not redirect to log in page -->
<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');
    if(strlen($_SESSION['alogin'])==0)
    {
        header('location:index.php');
    }
    else
    {
        //main logic
?>

<!-- main logic -->
<!doctype html>
<html lang="en">
    
    <head>
        <title>Smart Attendance Management System Using Raspberry PI</title>
        <link rel = "icon" href = "img/icon.png" type = "image/x-icon">
    </head>

    <body>
        <h1>Hello, World!</h1>
        <p> To logout press <a href="logout.php">here</a></p>
    </body>
</html>

<!-- PHP end here -->
<?php
    }
?>