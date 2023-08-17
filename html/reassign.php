<?php 
session_start();
include "dbcon.php";
$taskid = $_POST['taskid'];


$sql = "UPDATE task SET employee_assigned ='Yet to be Assigned' WHERE task_id=$taskid";
if ($conn->query($sql) === TRUE) {
   
  echo "Record updated successfully";
   header('location: assigntask1.php');
    
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

