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
        include('../includes/header_teacher.php');
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
        <h2>&ensp;Attendance Record</h2>
        <br>
        &ensp;<button onclick="location.href='download_list.php'">Download Attendance List </button>
        <br>
        <br>
        <!-- Table starts here -->
        <table id="data" cellspacing="0" width="100%" class="table">
            <!-- Header of table -->
            <thead class="thead-dark">
                <tr class="table-dark">
                    <th scope="row">#</th>
                    <th scope="row">ID</th>
                    <th>Class Attended</th>
                    <th>Total Classes</th>
                    <th>Percentage</th>
                </tr>
            </thead>
            
            <!-- Footer of table -->
            <tfoot class="thead-light">
                <tr class="table-secondary">
                    <th scope="row"></th>
                    <th scope="row">ID</th>
                    <th>Class Attended</th>
                    <th>Total Classes</th>
                    <th>Percentage</th>
                </tr>
            </tfoot>

            <tbody>
                <?php 
                    // PHP handle to SELECT all the data
                    
                    
                    $t_count = "SELECT id FROM fpstore";
                    $query3 = $dbh -> prepare($t_count);
                    $query3->execute();
                    $cnt = 1;                                       // to start the counter
                    $m_results=$query3->fetchAll(PDO::FETCH_OBJ);
                    if($query3->rowCount() > 0)
                    {
                        foreach($m_results as $m_result)
                        {				
                            ?>
                <?php 
                    // PHP handle to SELECT all the data
                    
                    $m_id = $m_result->id;
                    $a_count = "SELECT SUM(attendee) AS a_counter FROM record WHERE id = $m_id";
                    $query = $dbh -> prepare($a_count);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount() > 0)
                    {
                        foreach($results as $result)
                        {				
                            ?>
                                <tr>
                                    <th scope="row"><?php echo htmlentities($cnt);?></th>       <!-- to print counter -->
                                    <th scope="row"><?php echo htmlentities($m_id);?></th>       <!-- to print counter -->
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