<?php

    require_once('../company/db.php');
    $title = mysqli_real_escape_string($dbcon,$_POST['btitle']);
    $salary = mysqli_real_escape_string($dbcon,$_POST['bsalary']);
    $description = mysqli_real_escape_string($dbcon,$_POST['bdescription']);
    $address = mysqli_real_escape_string($dbcon,$_POST['baddress']);
    $phone = mysqli_real_escape_string($dbcon,$_POST['bphone']);
    $email = mysqli_real_escape_string($dbcon,$_POST['bemail']);

    if(!$title || !$salary || !$description || !$address || !$phone ||!$email){
        echo "<p class='alert alert-danger'>All Fields are required</p>";
    }else{
        $stmt = $dbcon->prepare("INSERT INTO jobs(title,salary,description,address,phone,comemail) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$title,$salary,$description,$address,$phone,$email);

        if($stmt->execute()){
            echo "<p class='alert alert-success'>Job Post Uploaded Successfully.</p>";
        }else{
            header("Location:../index.php");
        }
    }

?>