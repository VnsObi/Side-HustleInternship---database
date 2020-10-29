<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "vnsobi";

// Creating connection for msqli method

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_error()){
    echo "Failed to connect!";
    exit();
}else{
    echo "Connection Successful!";
}




?>