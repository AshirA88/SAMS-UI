<?php
    session_start();
    error_reporting(0);
    include('../includes/config.php');
    if(strlen($_SESSION['alogin'])==0)
    {
        header('location:index.php');
    }
    else
    {
        //main logic
        include('../includes/header_student.php');
        $id_session = $_SESSION['ID'];
        
    
?>
<!--html code --->
<html lang="en">
    
    <head>
        <title>Smart Attendance Management System Using Raspberry PI</title>
        <link rel = "icon" href = "img/icon.png" type = "image/x-icon">
    </head>

    <body>
        <br>
        <h2>Attendance Record</h2>
        <br>
        <!-- Table starts here -->
        <table id="data" cellspacing="0" width="100%" class="table">
            <!-- Header of table -->
            <thead class="thead-dark">
                <tr class="table-dark">
                    <th scope="row">#</th>
                    <th>Class Attended</th>
                    <th>Total Classes</th>
                    <th>Percentage</th>
                </tr>
            </thead>
            
            <!-- Footer of table -->
            <tfoot class="thead-light">
                <tr class="table-secondary">
                    <th scope="row">#</th>
                    <th>Class Attended</th>
                    <th>Total Classes</th>
                    <th>Percentage</th>
                </tr>
            </tfoot>

            <tbody>
                <?php 
                    // PHP handle to SELECT all the data
                    

                    $a_count = "SELECT SUM(attendee) AS a_counter FROM record WHERE id = $id_session";
                    $query = $dbh -> prepare($a_count);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;                                       // to start the counter
                    if($query->rowCount() > 0)
                    {
                        foreach($results as $result)
                        {				
                            ?>
                                <tr>
                                    <th scope="row"><?php echo htmlentities($cnt);?></th>       <!-- to print counter -->
                                    <td><?php echo htmlentities($result->a_counter);?></td>           <!-- to print classes atteded -->
                                    
                                    <?php
                                    $get_total = "SELECT * FROM total";
                                    $query2 = $dbh -> prepare($get_total);
                                    $query2->execute();
                                    $tots=$query2->fetchAll(PDO::FETCH_OBJ);
                                    if($query2->rowCount() > 0)
                                    {
                                        foreach($tots as $tot)
                                        {				

                                    ?>
                                    
                                    <td><?php echo htmlentities($tot->total_count);?></td>           <!-- to print total count -->
                                
                                <?php 
                                        }
                                    }
                                    $percent = ($result->a_counter)/($tot->total_count) * 100;
                                ?>
                                    <td><?php echo $percent; ?>%</td>
                                </tr>
                            <?php 
                                // increment counter
                                $cnt += 1; 
                                }
                        } 
                            ?>

            </tbody>
        </table>


    </body>
</html>






<?php
    }
?>