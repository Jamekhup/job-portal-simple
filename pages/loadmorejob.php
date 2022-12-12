<?php

    require_once('../company/db.php');
    $lastid = mysqli_real_escape_string($dbcon,$_POST['blastid']);

    $select = "SELECT * FROM jobs WHERE id < '$lastid' ORDER BY id DESC LIMIT 3";
    $connect = mysqli_query($dbcon,$select);
    sleep(1);

    $output = "";
    $newlastid = "";

   if(mysqli_num_rows($connect) > 0){
    while ($morejob = mysqli_fetch_assoc($connect)) {
        $newlastid = $morejob['id'];
        $output .= '
            <div class="col">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">' . $morejob['title'] . '</h5> &nbsp;&nbsp;
                <p>' . $morejob['address'] . '</p>
                <p class="card-text">Description -<br>
                    ' . substr($morejob['description'], 0, 120) . '
                </p>
                <a href="detail.php?postid=' . $morejob["id"] . '">View Detail</a>
            </div>
            </div>
        </div>

        
        ';
        
    }
    $output .= '<button class="btn btn-secondary" data-id="' . $newlastid . '" id="morejob">Load More Job</button>';
    

    echo $output;
   }


?>