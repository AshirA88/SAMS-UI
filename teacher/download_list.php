<?php
session_start();
//error_reporting(0);
session_regenerate_id(true);
include('../includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{
	header("Location: index.php"); //
	}
	else{?>
<table border="1">
									<thead>
										<tr>
										<th>#</th>
											<th>ID</th>
											<th>Class Attended</th>
											<th>Total Classes</th>
											<th>Attendance Percentage</th>
										</tr>
									</thead>

<?php
$filename="Attendance list";
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


echo '
<tr>
<td>'.$cnt.'</td>
<td>'.$m_id.'</td>
<td>'.$count= $result->a_counter.'</td>
';
$get_total = "SELECT * FROM total";
$query2 = $dbh -> prepare($get_total);
$query2->execute();
$tots=$query2->fetchAll(PDO::FETCH_OBJ);
if($query2->rowCount() > 0)
{
    foreach($tots as $tot)
    {				

        echo '<td>'.$toCount= $tot->total_count.'</td>';
        $percent = ($result->a_counter)/($tot->total_count) * 100;
        echo '<td>'.$percent.'%</td>

        </tr>
';
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=".$filename."-report.xls");
header("Pragma: no-cache");
header("Expires: 0");
			$cnt++;
			}
	}
}}}
?>

</table>
<?php }} ?>