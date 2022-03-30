<!-- First skeleton made by Ashir for creating the main framework of the UI -->

<!-- PHP Session to verify login with error handling -->
<?php
    session_start();
    include('includes/config.php');
    if(isset($_POST['login']))
    {
        $email=$_POST['username'];
        $password=($_POST['password']);
        $sql ="SELECT UserName,Password FROM login WHERE UserName=:email and Password=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR);
        $query-> execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
            $_SESSION['alogin']=$_POST['username'];
            echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
        } 
        else
        {
            echo "<script>alert('Invalid Details');</script>";
        }
    }
?>

<!-- HTML Code to take input from user -->
<!doctype html>
<html lang="en">
    
    <head>
        <title>Smart Attendance Management System Using Raspberry PI</title>
        <link rel = "icon" href = "img/icon.png" type = "image/x-icon">
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
        <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
    <!-- 
        This templete is taken from my previous project so style accordingly do not change the content part
        in <form> which is from line 50 to 62 rest everything is supposed to be beautified 
     -->
    <div id="header-wrapper">
	    <div id="header">
		    <div id="logo">
			    <h1><a>SMART ATTENDANCE MANAGEMENT SYSTEM</a>
            </h1>
		    </div>
        </div>
    </div>
  <!--Middle page-->  
<div id="wrapper">
	<div id="page-wrapper">
		<div id="page">
		   <div id="wide-content">
    <div class="login-page bk-img" style="background-image: url(img/banner.png);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">LOGIN</h1><br>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">

									<label for="" class="text-uppercase text-sm">Your Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb"><br><br>

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb"><br>



									<button class="button-style a:hover" name="login" type="submit">LOGIN</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div id="footer" class="container">
</div>
    </body>
</html>
