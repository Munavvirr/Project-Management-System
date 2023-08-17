<?php
include_once 'dbcon.php';
$sql = "DELETE FROM emp WHERE user_id='" . $_GET["userid"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
header('location: employeemanage.php');
?>