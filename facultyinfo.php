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
<html>
<head>
<title>Faculty Info</title>
<link rel = "icon" href = "img/icon.png" type = "image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
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
			    <h1><a href="#">Faculty Info</a></h1>
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
  <th>Faculty Name </th>
  <th>Faculty Subject</th>
  <th>Faculty Contact </th>
  </tr>
  <tr>
  <td>Peter Swan</td>
  <td>Software Modeling</td>
  <td>9878976793</td>
  </tr>
  <tr>
  <td>Lucky Champman</td>
  <td>Computer Automation</td>
  <td>7813688961</td>
  </tr>
  <tr>
  <td>Joe  Kinley</td>
  <td>UI/UX Designing</td>
  <td>9878234122</td>
  </tr>
  <tr>
  <td>Cleveland Brown</td>
  <td>Security and Privacy in Media</td>
  <td>7785467812</td>
  </tr>
</table>
</div>
    </div>
    </div>
    </div>
    </div>
    <div id="footer" class="container">
	<p>&copy; All rights reserved <a href="http://templated.co" rel="nofollow">@PROJECT</p>
</div>
</body>
</html>



<!-- PHP end here -->
<?php
    }
?>