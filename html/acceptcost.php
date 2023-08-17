<?php 
session_start();
include "dbcon.php";
$taskid = $_GET['userid'];


$sql = "UPDATE task SET task_status='Cost Accepted' WHERE task_id='$taskid'";

if ($conn->query($sql) === TRUE) {
     
  echo "Record updated successfully";
   header('location: index.php');
    
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>

