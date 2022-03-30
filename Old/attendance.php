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
        <title>Attendance Details</title>
        <link rel = "icon" href = "img/icon.png" type = "image/x-icon">
        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
        <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #D6EEEE;
}
</style>
<body>
<div id="header-wrapper">
	    <div id="header">
		    <div id="logo">
        <h1><a href="javascript:history.back()"><-</a> 
			    <a>Attendance details</a></h1>
		    </div>
      </div>
  </div>
    <div id="wrapper">
	<div id="page-wrapper">
		<div id="page">
		   <div id="wide-content">
<div id= "table">
<table>
  <tr>
  <th>Sr. No </th>
  <th> Subject</th>
  <th>Attendance </th>
  </tr>
  <tr>
  <td>1</td>
  <td>Software Modeling</td>
  <td>78%</td>
  </tr>
  <tr>
  <td>2</td>
  <td>Computer Automation</td>
  <td>82%</td>
  </tr>
  <tr>
  <td>3</td>
  <td>UI/UX Designing</td>
  <td>91%</td>
  </tr>
  <tr>
  <td>4</td>
  <td>Security and Privacy in Media</td>
  <td>90%</td>
  </tr>
</table>
</div>
    </div>
    </div>
    </div>
    </div>
    <div id="footer" class="container">
</div>
</body>
</html>



<!-- PHP end here -->
<?php
    }
?>