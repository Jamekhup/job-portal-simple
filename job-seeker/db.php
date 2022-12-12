<?php

$dbcon = new mysqli('localhost','root','','php_jobportal');
if($dbcon->connect_error){
    echo "Failed to connect database" . $dbcon->connect_error;
    die();
}


?>