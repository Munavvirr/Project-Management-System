<?php 
session_start();
include "dbcon.php";
$taskid = $_POST['taskid'];
$cost = $_POST['cost'];

$sql = "UPDATE task SET task_cost='$cost', employee_assigned ='Yet to be Assigned' WHERE task_id=$taskid";
$sql2 = "UPDATE task SET task_status='Cost Submitted' WHERE task_id=$taskid";
if ($conn->query($sql) === TRUE) {
    if ($conn->query($sql2) === TRUE) {
  echo "Record updated successfully";
   header('location: adminpanel.php');
    }
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

