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

    <body>
        
    <h2>&emsp;Add New Account Details</h2>

        <form action="#">&emsp;
        <label for="fname">First name:</label><br>&emsp;
        <input type="text" id="fname" name="fname" value=""><br>&emsp;
        <label for="lname">Last name:</label><br>&emsp;
        <input type="text" id="lname" name="lname" value=""><br>&emsp;
        <label for="prn">PRN number</label><br>&emsp;
        <input type="text" id="prn" name="prn" value=""><br>&emsp;
        <label for="Year">Passing Batch Year</label><br>&emsp;
        <input type="text" id="year" name="year" value=""><br><br>&emsp;
        <input type="submit" value="Submit">&emsp;
        </form> 

        

</body>
</html>







<!-- PHP end here -->
<?php
    }
?>