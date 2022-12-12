<?php

    require_once('../company/db.php');
    $value = mysqli_real_escape_string($dbcon,$_POST['bvalue']);

    if(!$value){
        echo "No Result Found";
    }else{
        $search = "SELECT * FROM jobs WHERE title LIKE '%$value%'";
        $connect = mysqli_query($dbcon,$search);
        if(mysqli_num_rows($connect) > 0){
            while($found = mysqli_fetch_assoc($connect)){
                echo '<a href="detail.php?jobid='.$found['id'].'">'.$found['title'].'</a> <br>';
            }
        }else{
            echo "No Result Found";
        }
    }

?>