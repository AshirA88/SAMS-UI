<!-- First skeleton made by Ashir for creating the main framework of the UI -->

<!-- 
    This is the templete 
 -->



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
        <title>Faculty Details</title>
        <link rel = "icon" href = "img/icon.png" type = "image/x-icon">
    </head>

    <body>
    Faculty Inforamtion
    </body>
</html>

<!-- PHP end here -->
<?php
    }
?>