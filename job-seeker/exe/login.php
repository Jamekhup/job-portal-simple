<?php

if (isset($_POST['login'])) {
    session_start();
    require_once('../db.php');
    $email = mysqli_real_escape_string($dbcon,$_POST['email']);
    $pass = mysqli_real_escape_string($dbcon,$_POST['pass']);

    $enpass = md5($pass);

    $sql = "SELECT * FROM seeker WHERE email='$email' AND password='$enpass' LIMIT 1";
    $connect = mysqli_query($dbcon,$sql);

    if(mysqli_num_rows($connect) > 0){
        //check account is verified or not
        while($com = mysqli_fetch_assoc($connect)){
            if($com['verify'] != 'verified'){
                $_SESSION['error'] = "Account not verified yet";
                header("Location:../index.php");
            }else{
                $_SESSION['seekid'] = $com['id'];
                $_SESSION['seekname'] = $com['name'];
                $_SESSION['seekemail'] = $com['email'];

                header("Location:../../index.php");
            }
        }
    }else{
        $_SESSION['error'] = "Invalid Credentail";
        header("Location:../index.php");
    }


}else{
    header("Location:../../index.php");
}


?>