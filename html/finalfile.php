<?php 

session_start(); 


$message = ''; 

  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
 
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
 
    // check if file has one of the following extensions
    // $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','pdf');
 
    if (true)
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = 'files/';
      $dest_path = $uploadFileDir . $newFileName;
 
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
    
      }
      else
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
        
        echo $message;
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
      echo $message;
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    echo $message;
  }
include "dbcon.php";


$taskid = $_POST['taskid'];
$date = date("Y/m/d");
          $sql2 = "UPDATE task SET submittedfileaddress='$dest_path' WHERE task_id='$taskid'";
          
          $sql3 = "UPDATE task SET task_status='Completed', task_afterstatus = '1' WHERE task_id='$taskid'";
           $sql4 = "UPDATE task SET task_finaltime='$date' WHERE task_id='$taskid'";
          

if ($conn->query($sql2) === TRUE) {
    if ($conn->query($sql3) === TRUE) {
        if ($conn->query($sql4) === TRUE) {
  $message =  "New record created successfully";
  echo $message;
    }
    }
} else {
  $msssage =  "Error: " . $sql2 . "<br>" . $conn->error;
  echo $message;
}
$_SESSION['message'] = $message;

echo "<script type='text/javascript'>alert('$message');</script>";


header("Location: employeepage.php");




?>