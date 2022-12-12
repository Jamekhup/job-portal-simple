<?php

    if(isset($_GET['confirmkey'])){
        session_start();
        require_once('../db.php');
        $key = $_GET['confirmkey'];

        $sql="SELECT * FROM company WHERE verify='$key' LIMIT 1";
        $connect = mysqli_query($dbcon,$sql);
        if(mysqli_num_rows($connect) > 0){

            $up = "UPDATE company SET verify='verified' WHERE verify='$key' LIMIT 1";
            $query = mysqli_query($dbcon,$up);
            if($query){
                $_SESSION['success'] = "Account Verified. You can login now";
                header('Location:../index.php');
            }

        }else{
            echo "Link Expired or Not Valid";
        }

    }else{
        header("Location:../../index.php");
    }

?>