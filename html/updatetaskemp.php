<?php 
session_start();
include "dbcon.php";
$taskid = $_POST['taskid'];
$employee = $_POST['item'];

$sql = "UPDATE task SET employee_assigned='$employee' WHERE task_id=$taskid";
$sql2 = "UPDATE task SET task_status='Work in Progress' WHERE task_id=$taskid";
if ($conn->query($sql) === TRUE) {
    if ($conn->query($sql2) === TRUE) {
  echo "Record updated successfully";
   header('location: assigntask1.php');
    }
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

