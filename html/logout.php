<?php
include('./apis/SerSessionHandler.php');
  session_start();
  include_once('./apis/auth.php');
  $au= new Auth();
  if(session_destroy())
  {
    $au->logout();
    $sessionHandler = new AdminSessionHandler();
    if($sessionHandler->verifySessionKey($_SESSION['sessid']) ){
      $val = $sessionHandler->Logout();
    }
    

    header("Location: authentication-login1.php");
 
  }
?>