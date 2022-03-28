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
    <link rel = "icon" href = "img/logo.png" type = "image/x-icon">
    <title>Smart Attendance Management System Using Raspberry PI</title>
</head>

    <body>
        
    <h2>&emsp;Add New Account Details</h2>

        <form action="#">&emsp;
        <label for="Username:">Username:</label><br>&emsp;
        <input type="text" id="Username:" name="Username:" value=""><br>&emsp;
        <label for="Password:">Password:</label><br>&emsp;
        <input type="text" id="Password:" name="Password:" value=""><br>&emsp;
        <label for="UserType">UserType"</label><br>&emsp;
        <input type="text" id="UserType" name="UserType" value=""><br>&emsp;<br>&emsp;
        <input type="submit" value="Submit">&emsp;
        </form> 


</body>
</html>







<!-- PHP end here -->
<?php
    }
?>