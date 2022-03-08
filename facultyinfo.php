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
<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2>Faculty Record</h2></th> 
		</tr> 
			  <th>Sr </th> 
			  <th> Name </th> 
			  <th> Subject </th> 
			  <th> Contact </th> 
			  
		</tr> 
    <?php $sql = "SELECT * from  faculty "; //Conected the table here
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1; //counter
                if($query->rowCount() > 0)
                {
                foreach($results as $result) //for loop
                    {				?>
            
            <!-- Body of Table -->
            <tbody>
                <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php echo htmlentities($result->Name);?></td>
                    <td><?php echo htmlentities($result->Subject);?></td>
                    <td><?php echo htmlentities($result->Contact);?></td>
                     <!-- Chnaged the name of coloumn name pls keep it one word only -->
                </tr>
                <!-- To count number of rows just like a counter -->
                <?php $cnt=$cnt+1; 
                    }
                } 
                ?>
            </tbody>
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

		
	

</body>
</html>



<!-- PHP end here -->
<?php
    }
?>