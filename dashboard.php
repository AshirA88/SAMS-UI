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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
        <title>Dashboard</title>
        <link rel = "icon" href = "img/icon.png" type = "image/x-icon">
        <link rel = "stylesheet" href = "css/style.css">
        
    </head>

    <body>

    <div class="wrapper">
        
        <div class="sidebar">
           
        
        <div class="profile">
                <img src="image.jpg"alt="profile image">
                
                </div>
                
                <ul>
                
                
                <li>
                    
                        
                    <a href="attendance.php">
                    <span>Self Attendance</span> 
                    </a>
                    </a>
                </li>
                <li>
                   
                        
                    <a href="facultyinfo.php">
                    <span>Teaching Faculty</span> 
                    </a>
                    </a>
                </li>
                <li>
                   
                        
                   <a href="index.php">
                   <span>Log Out</span> 
                   </a>
                   </a>
               </li>
               
            </ul>
        </div>
        </div>
    </div>
        
        
        
    </body>
</html>


<!-- PHP end here -->
<?php
    }
?>