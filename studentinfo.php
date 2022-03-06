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
        <title>Student Details</title>
        <link rel = "icon" href = "img/icon.png" type = "image/x-icon">
    </head>

    <body>
    hello student

        <table>
            <!-- Header of Table -->
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>E-Mail</th>
                    <th>PRN</th>
                    <th>Mobile Number</th>
                </tr>
            </thead>
            
            <!-- PHP handle to SELECT data from "studentinfo" table -->
            <?php $sql = "SELECT * from  studentinfo "; //Conected the table here
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
                    <td><?php echo htmlentities($result->Email);?></td>
                    <td><?php echo htmlentities($result->PRN);?></td>
                    <td><?php echo htmlentities($result->Mobile);?></td> <!-- Chnaged the name of coloumn name pls keep it one word only -->
                </tr>
                <!-- To count number of rows just like a counter -->
                <?php $cnt=$cnt+1; 
                    }
                } 
                ?>
            </tbody>
        </table>

    </body>
</html>

<!-- PHP end here -->
<?php
    }
?>