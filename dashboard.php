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
        <title>Dashboard</title>
        <link rel = "icon" href = "img/icon.png" type = "image/x-icon">
    </head>

    <body>
        <a href="studentinfo.php">Student Details</a>
        <br>
        <a href="attendance.php">Attendance Details</a>
        <br>
        <a href="facultyinfo.php">Facultiy Details</a>
        
        
    </body>
</html>


<!-- PHP end here -->
<?php
    }
?>