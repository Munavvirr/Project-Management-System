<?php
 session_start();
 $connect = new PDO("mysql:host=localhost;u506548348_japrojects	", "u506548348_japrojects", "Project@90012");

 if(!isset($_SESSION['username']))
  {
       header("Location: adminlogin.php");
  }else if($_SESSION['username']!='admin')
  {
   header("Location: adminlogin.php");
  }
  
 
// Load the database configuration file 
include_once 'dbcon.php'; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM task 
  WHERE task_timeline >= '".$_POST["start_date"]."' 
  AND task_timeline <= '".$_POST["end_date"]."' 
  ORDER BY task_timeline DESC
  "); 
 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "members-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array("Task Id", "user_name", "Project Name", "Employee Assigned", "Task Status", "Task Deadline","fileaddress","COST");
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['task_id'], $row['user_name'], $row['proj_name'], $row['employee_assigned'], $row['task_status'], $row['task_deadline'], $row['fileaddress'], $row['task_cost']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>


