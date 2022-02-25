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
    </head>

    <body>
    <!-- 
        This templete is taken from my previous project so style accordingly do not change the content part
        in <form> which is from line 50 to 62 rest everything is supposed to be beautified 
     -->
    <div class="login-page bk-img" style="background-image: url(img/banner.png);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Smart Attendance Management System Log in</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">

									<label for="" class="text-uppercase text-sm">Your Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">



									<button class="btn btn-primary btn-block" name="login" type="submit">LOGIN</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    </body>
</html>
