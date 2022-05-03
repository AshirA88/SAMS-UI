<?php

//import.php

if(isset($_POST["student_name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=student", "root", "");
 $student_name = $_POST["student_name"];
 $student_phone = $_POST["student_phone"];
 for($count = 0; $count < count($student_name); $count++)
 {
  $query .= "
  INSERT INTO student(student_name, student_phone) 
  VALUES ('".$student_name[$count]."', '".$student_phone[$count]."');
  
  ";
 }
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>

