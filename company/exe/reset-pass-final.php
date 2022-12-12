<?php

 if (isset($_POST['submit'])) {
     session_start();
     require_once('../db.php');

     $pass = mysqli_real_escape_string($dbcon,$_POST['pass']);
     $cpass = mysqli_real_escape_string($dbcon,$_POST['cpass']);
     $key = mysqli_real_escape_string($dbcon,$_POST['key']);

      if(!$pass || !$cpass || !$key || $pass != $cpass){
          echo "Something Went Wrong";
      } else{
          //check key
          $check = "SELECT * FROM company WHERE resetpass='$key' LIMIT 1";
          $connect = mysqli_query($dbcon,$check);
          if(mysqli_num_rows($connect) > 0){

            while($com = mysqli_fetch_assoc($connect)){
                if($com['resetpass'] == $key){

                    //encrypt passowrd
                    $enpass = md5($pass);

                    $update = "UPDATE company SET password='$enpass',resetpass='0' WHERE resetpass='$key' LIMIT 1 ";
                    if(mysqli_query($dbcon,$update)){
                        $_SESSION['success'] = "Password Reset success";
                        header('Location:../index.php');
                    }else{
                        echo "Failed to process";
                    }
                }else{
                    echo "Access Denied";
                }
            }

          }else{
              echo "Access Denied";
          }
      } 

 }else{
     header("Location:../../index.php");
 }

?>