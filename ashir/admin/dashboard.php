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

<!-- main logic -->
<!doctype html>
<html lang="en">
    
    <head>
        <title>Smart Attendance Management System Using Raspberry PI</title>
        <link rel = "icon" href = "../img/logo.png" type = "image/x-icon">
    </head>

    <body>
    <h1><a href = "logout.php"> Logout </a> </h1>                   <!-- Logout to homepage -->
    <h1><a href = "manage_account.php"> Management </a> </h1>       <!-- Redirect to manage_account.php from further CRUD operations -->
    
    
    </body>
</html>

<!-- PHP end here -->
<?php
    }
?>