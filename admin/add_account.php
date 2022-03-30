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

        // To add data to database
        if(isset($_POST['submit']))             // calling the form
        {
            $UserName=$_POST['UserName'];
            $Password=$_POST['Password'];
            $UserType=$_POST['UserType'];
            $status=1;
            $sql="INSERT INTO  users(UserName,Password,UserType,status) VALUES(:UserName,:Password,:UserType,:status)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':UserName',$UserName,PDO::PARAM_STR);
            $query->bindParam(':Password',$Password,PDO::PARAM_STR);
            $query->bindParam(':UserType',$UserType,PDO::PARAM_STR);
            $query->bindParam(':status',$status,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbh->lastInsertId();
            if($lastInsertId)
            {
                $msg="Your info submitted successfully";
            }
            else
            {
                $error="Something went wrong. Please try again";
            }
        }

?>

<!doctype html>
<html lang="en">
<head>
    <link rel = "icon" href = "../img/logo.png" type = "image/x-icon">
    <title>Smart Attendance Management System Using Raspberry PI</title>
</head>

    <body>
        
        <h2>&emsp;Add New Account Details</h2>
        
        <?php 
            if($error)
                {
                    ?> <div><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php 
                }
            else if($msg)
                {   
                    ?> <div><strong><img src="../img/success.gif" alt="" >SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php 
                }
        ?>

        <form name="add_account" method = "post">&emsp;
            <label for="UserName">UserName:<span style="color:red">*</span></label><br>&emsp;
            <input type="text" id="UserName" name="UserName" placeholder="UserName"><br>&emsp;
            <label for="Password">Password:<span style="color:red">*</span></label><br>&emsp;
            <input type="password" id="Password" name="Password" placeholder="Password"><br>&emsp;
            <label for="UserType">UserType"<span style="color:red">*</span></label><br>&emsp;
            <input type="text" id="UserType" name="UserType" placeholder="User Type S/T/A"><br>&emsp;<br>&emsp;
            <!-- <select name="UserType" id="UserType">
                <option value="">----Select----</option>
                <option value="S">S</option>
                <option value="T">T</option>
                <option value="A">A</option>
            </select> <br><br> -->
            <input name="submit" type="submit" value="Add">&emsp;
        </form> 


    </body>
</html>







<!-- PHP end here -->
<?php
    }
?>