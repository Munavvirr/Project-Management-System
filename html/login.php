<?php 

session_start(); 

include "dbcon.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: login");

        exit();

    }else if(empty($pass)){

        header("Location: login");

        exit();

    }else{

        $sql = "SELECT * FROM teamtable WHERE t_username='$uname' AND t_password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['t_username'] === $uname && $row['t_password'] === $pass) {

                echo "Logged in!";
                
                  $teamname = $_SESSION['t_teamname'];
               
              
            
            sleep(3);
                $_SESSION['ppd_count']= $ppd_count;
                $_SESSION['t_username'] = $row['t_username'];
                $_SESSION['t_teamname'] = $row['t_teamname'];

                $_SESSION['t_logo'] = $row['t_logo'];

                $_SESSION['t_tc'] = $row['t_tc'];

                header("Location: index");

                exit();

            }else{

                 echo "Not Valid!";

                exit();

            }

        }else{

            echo "Not Valid!";

            exit();

        }

    }

}else{

    header("Location: login");

    exit();

}