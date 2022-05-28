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
        include('../includes/header_student.php');
?>

<!-- main logic -->
<!doctype html>
<html lang="en">
    
    <head>
        <title>Smart Attendance Management System Using Raspberry PI</title>
        <link rel = "icon" href = "img/icon.png" type = "image/x-icon">
    </head>

    <body>
        <!-- Carousel -->
        <div id="carousel_slide" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel_slide" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carousel_slide" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carousel_slide" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../img/carousel1.jpg" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item">
            <img src="../img/carousel2.jpg" class="d-block" style="width:100%"> 
        </div>
        <div class="carousel-item">
            <img src="../img/carousel3.jpg" class="d-block" style="width:100%">
        </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel_slide" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel_slide" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        </button>
        </div>
        <br>

    </body>
</html>

<!-- PHP end here -->
<?php
    }
?>