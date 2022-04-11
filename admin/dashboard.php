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
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <!-- include jQuery UI -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   
    </head>

    <style>
        .rightcalendar {
            position: absolute;
            right: 150px;  
            width: 200px;
            height: 120px;      
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
    <hr>
    <!--calendar -->
    <div class="rightcalendar" id="Datepicker1"><span><h2>Calendar</h2></span></div><br>

    <script type="text/javascript">
     $(function() {
    $("#Datepicker1").datepicker({
    numberOfMonths: 1
     }); 
    });
    </script>
    <!--calendar ends -->
    <h1><button><a href = "logout.php"> Logout </a>  </button>  </h1>                <!-- Logout to homepage -->
    <h1><button><a href = "manage_account.php"> Management </a><button> </h1>       <!-- Redirect to manage_account.php from further CRUD operations -->
</div>
<br><br><br><br><br>
    <div>
    <img src="../img/download.jpg" alt="New York" width="100%" height="150">
</div>
    </body>
    
</html>

<!-- PHP end here -->
<?php
    }
?>