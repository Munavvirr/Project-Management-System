<?php 

session_start(); 

include_once('./apis/auth.php');
$au = new Auth();
$au->requireLoginClient();

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
    // $allowedfileExtensions = array('docx','SQL','jpeg','jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc','pdf');
 
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
        die($message);
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
      die($message);  
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    die($message);
  }
include "dbcon.php";

$username = $_SESSION['username'];
$useremail = $_SESSION['useremail'];
$projname = $_POST['projname'];
$datedeadline = $_POST['deadline'];
$userphone =  $_SESSION['userphone'];

          $sql2 = "INSERT INTO task (user_name, proj_name, user_phone,task_deadline,fileaddress)
VALUES ('$username', '$projname','$userphone', '$datedeadline','$dest_path')";

if ($conn->query($sql2) === TRUE) {
  $message =  "New record created successfully";
} else {
  $msssage =  "Error: " . $sql2 . "<br>" . $conn->error;
}
$_SESSION['message'] = $message;

echo "<script type='text/javascript'>alert('$message');</script>";


header("Location: index.php");




?>