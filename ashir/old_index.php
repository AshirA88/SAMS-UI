<!-- PHP Session to verify login with error handling -->
<?php
    session_start();
    include('includes/config.php');
    if(isset($_POST['login']))
    {
        $user=$_POST['username'];
        $password=($_POST['password']);
        $sql ="SELECT UserName,Password FROM ashir WHERE UserName=:user and Password=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':user', $user, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
            // To Check who is logging in A, T or S
            $_SESSION['alogin']=$_POST['username'];
            $checkType = "SELECT UserName,UserType FROM ashir";
            $query= $dbh -> prepare($checkType);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {   
                foreach($results as $result)
                {
                    if($result->UserName == $user)
                    {
                        if($result->UserType == 'A')        //For Admin Loggin
                        {
                            echo "<script type='text/javascript'> document.location = 'admin/dashboard.php'; </script>";
                        }
                        if($result->UserType == 'S')        //For Student Loggin
                        {
                            echo "<script type='text/javascript'> document.location = 'student/dashboard.php'; </script>";
                        }
                        if($result->UserType == 'T')        //For Teacher Loggin
                        {
                            echo "<script type='text/javascript'> document.location = 'teacher/dashboard.php'; </script>";
                        }
                    }
                }
                
            }
        } 
        else
        {
            echo "<script>alert('Invalid Details');</script>"; //Error handling
        }
    }
?>

<!-- CSS and JS -->
<!-- https://getbootstrap.com/docs/4.1/getting-started/introduction/ -->
<!-- Used for Form -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>





<!doctype html>
<html lang="en">
    
    <head>
        <title>Smart Attendance Management System Using Raspberry PI</title>
        <link rel = "icon" href = "img/logo.png" type = "image/x-icon">
    </head>

    <body>
        <br>
        <br>
        <div  class="container">
            <div  class="mb-3">
                <form method="post">
                    <label>Your Username </label>
                    <input type="text" placeholder="Username" name="username"><br><br>
                    <label>Password</label>
                    <input type="password" placeholder="Password" name="password"><br>
                    <button name="login" type="submit">LOGIN</button>
                </form>
            </div>
        </div>
    </body>
</html>
