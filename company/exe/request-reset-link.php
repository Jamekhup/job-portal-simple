<?php

    require_once('../db.php');
    $email = mysqli_real_escape_string($dbcon,$_POST['bemail']);

    $sql = "SELECT * FROM company WHERE email='$email' LIMIT 1";
    $connect = mysqli_query($dbcon,$sql);
    if(mysqli_num_rows($connect) > 0){
        while($com = mysqli_fetch_assoc($connect)){
            if($com['verify'] == 'verified'){
                //generate reset pass key
                $resetkey = md5($email . time());

                //insert reset pass key
                $update = "UPDATE company SET resetpass='$resetkey' WHERE email='$email' LIMIT 1";
                if(mysqli_query($dbcon,$update)){
                    //send password reset link

                    $to = $email;
                    $subject = "Reset Your Password";
                    $message = "
                                <h2>Reset Your Password</h2>
                                <p>Click the link below to reset your password</p>
                                <a href='http://localhost/job-portal/company/exe/update-pass.php?resetpasskey=$resetkey'>Click Here to Reset your Password</a>
                            ";

                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: info@example.com" . "\r\n";

                    mail($to, $subject, $message, $headers);
                }else{
                    echo "Failed to process";   
                }

               
            }else{
            echo "<p class='alert alert-danger'>Your account hasn't been verified yet.</p>";
            }
        }
    }else{
        echo "<p class='alert alert-danger'>Email Not Found.</p>";
    }

?>