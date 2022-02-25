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
    <table style="width:100%">
  <tr>
    <th>Faculty Name</th>
    <th>Faculty Subject</th>
    <th>Faculty Contact</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Software Management</td>
    <td>967378491</td>
  </tr>
  <tr>
    <td>Mary Kom</td>
    <td>Automation and Hardware</td>
    <td>967378422</td>
  </tr>
</table>
    </body>


<!-- PHP end here -->
<?php
    }
?>