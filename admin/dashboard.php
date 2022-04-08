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

    <style>
        body {
                /* background-image: url('../img/download.jpg');         hate this whoever made this shitty thing */
             }
        div
        {
            max-height: 700px
        }
    </style>            

    <body>
    
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="../img/carousel1.jpg" alt="Los Angeles" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
        <img src="../img/carousel2.jpg" alt="Chicago" class="d-block" style="width:100%">
    </div>
    <div class="carousel-item">
        <img src="../img/carousel3.jpg" alt="New York" class="d-block" style="width:100%">
    </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    </button>
    </div>

    <h1><a href = "logout.php"> Logout </a> </h1>                   <!-- Logout to homepage -->
    <h1><a href = "manage_account.php"> Management </a> </h1>       <!-- Redirect to manage_account.php from further CRUD operations -->
    
    </body>
</html>

<!-- PHP end here -->
<?php
    }
?>