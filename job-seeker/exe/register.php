<?php

    require_once('../db.php');


    $name = mysqli_real_escape_string($dbcon,$_POST['bname']);
    $email = mysqli_real_escape_string($dbcon,$_POST['bemail']);
    $pass = mysqli_real_escape_string($dbcon,$_POST['bpass']);

    if($name =="" || $email == "" || $pass == ""){
        echo "<p class='alert alert-danger'>All fields are required</p>";
    }else{
        $sql = "SELECT email FROM seeker WHERE email='$email' LIMIT 1";
        $connect = mysqli_query($dbcon,$sql);
        if($connect->num_rows > 0){
            echo "<p class='alert alert-danger'>Email already exist</p>";
        }else{
            $vkey = md5($email . time());
            $enpass = md5($pass);
            $stmt = $dbcon->prepare("INSERT INTO seeker(name,email,password,verify) VALUES(?,?,?,?)");
            $stmt->bind_param('ssss', $name, $email, $enpass, $vkey);

            if ($stmt->execute()) {
                echo "<p class='alert alert-success'>Check your mail to confirm your account</p>";
                //send confirmation email
                $to = $email;
                $subject = "Verify Your Account";
                $message = "
                        <h2>Verify Your Account</h2>
                        <p>Click the link below to confirm your account</p>
                        <a href='http://localhost/job-portal/job-seeker/exe/verify.php?confirmkey=$vkey'>Confirm Your Account</a>
                    ";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: info@example.com" . "\r\n";

                mail($to,$subject,$message,$headers);

            } else {
                echo "<p class='alert alert-danger'>Failed to register</p>";
            }
        }
    }

?>