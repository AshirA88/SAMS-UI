<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{
header('location:index.php');
}
else{
// Code for change password
if(isset($_POST['submit']))
	{
$password=($_POST['password']);
$newpassword=($_POST['newpassword']);
$uid=$_SESSION['ID'];
$sql ="SELECT Password FROM users WHERE id=:uid and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uid', $uid, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update users set Password=:newpassword where id=:uid";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':uid', $uid, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is not valid.";
}
}
?>

<!doctype html>
<html lang="en" class="no-js">

<head>

	<title>Smart Attendance Management System Using Raspberry PI</title>

<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>


</head>

<body>
	<?php include('../includes/header_student.php');?>
	<div class="ts-main-content">
			<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Change Password</h2>
						<div class="row">
							<div class="col-md-10">
								<div class="panel panel-default">
									
									<div class="panel-body">
										<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">


  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
											<div class="form-group">
												<label class="col-sm-4 control-label">Current Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="password" id="password" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label">New Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="newpassword" id="newpassword" required>
												</div>
											</div>
											<div class="hr-dashed"></div>

											<div class="form-group">
												<label class="col-sm-4 control-label">Confirm Password</label>
												<div class="col-sm-8">
													<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
												</div>
											</div>
											<div class="hr-dashed"></div>



											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-4">
                                                <br>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>
                                            
										</form>
                                        <br>
                                        <button class="btn btn-primary" name="cancel" type="submit" onclick="location.href='dashboard.php'">Go Back</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<?php } ?>