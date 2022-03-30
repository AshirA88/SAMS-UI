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
            $username=$_POST['username'];
            $mobile=$_POST['mobileno'];
            $email=$_POST['emailid'];
            $age=$_POST['age'];
            $gender=$_POST['gender'];
            $blodgroup=$_POST['bloodgroup'];
            $address=$_POST['address'];
            $message=$_POST['message'];
            $status=1;
            $sql="INSERT INTO ashir(username,MobileNumber,EmailId,Age,Gender,BloodGroup,Address,Message,status) VALUES(:username,:mobile,:email,:age,:gender,:blodgroup,:address,:message,:status)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':username',$username,PDO::PARAM_STR);
            $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
            $query->bindParam(':email',$email,PDO::PARAM_STR);
            $query->bindParam(':age',$age,PDO::PARAM_STR);
            $query->bindParam(':gender',$gender,PDO::PARAM_STR);
            $query->bindParam(':blodgroup',$blodgroup,PDO::PARAM_STR);
            $query->bindParam(':address',$address,PDO::PARAM_STR);
            $query->bindParam(':message',$message,PDO::PARAM_STR);
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
    <link rel = "icon" href = "img/logo.png" type = "image/x-icon">
    <title>Smart Attendance Management System Using Raspberry PI</title>
</head>

    <body>
        
        <h2>&emsp;Add New Account Details</h2>

        <form name="add_account" method = "post">&emsp;
            <label for="Username:">Username:</label><br>&emsp;
            <input type="text" id="Username:" name="Username:" value=""><br>&emsp;
            <label for="Password:">Password:</label><br>&emsp;
            <input type="text" id="Password:" name="Password:" value=""><br>&emsp;
            <label for="UserType">UserType"</label><br>&emsp;
            <input type="text" id="UserType" name="UserType" value=""><br>&emsp;<br>&emsp;
            <input type="submit" value="Add">&emsp;
        </form> 


    </body>
</html>







<!-- PHP end here -->
<?php
    }
?>