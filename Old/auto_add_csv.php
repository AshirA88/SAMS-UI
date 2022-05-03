<?php

$db = new mysqli('localhost', 'root', '', 'sams'); //connect to database

// Checking connection
if ($db->connect_errno) {
echo "Failed " . $db->connect_error;
exit();
}
?>


<table align="center" width="800" border="1" style="border-collapse: collapse; border:1px solid #ddd;" cellpadding="5" cellspacing="0">

	<thead>
		<tr bgcolor="#FFCC00">
			<th>
				<center>PRN</center>
			</th>
			<th>
				<center>Student Email</center>
			</th>
			<th>
				<center>Student Name</center>
			</th>
			<th>
				<center>Subject Code</center>
			</th>
			<th>
				<center>Attendance</center>
			</th>

		</tr>
	</thead>
	<tbody>
		<?php
$table_name = date("Y-m-d");
echo $table_name;
// $table_name = "table1";
		// Get csv file
		if(($handle = fopen("demo.csv","r")) !== FALSE) {
			$n = 1;
			while(($row = fgetcsv($handle))!== FALSE) {		//if we are inside the file
				$db->query('INSERT INTO table1 VALUES ("'.$row[0].'","'.$row[1].'","'.$row[2].'","'.$row[3].'","'.$row[4].'")'); 		// "'.$row[n].'" no of rows we want to add
				if($n>1) {
				?>
				<tr>
					<td>
						<center>
							<?php echo $row[0];?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[1];?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[2];?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[3];?>
						</center>
					</td>
					<td>
						<center>
							<?php echo $row[4];?>
						</center>
					</td>
				</tr>
					<?php
				}
			
				// Increment records
				$n++;
			}
			
		// Closing the file
		fclose($handle);
	}
	?>
	</tbody>
</table>

<a href = "add_attendance.php"> Go back </a>