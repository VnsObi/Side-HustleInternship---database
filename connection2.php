<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "vnsobi";

// Creating connection using pdo method

try{
    $con = new PDO("mysql:host=$serverName;dbName=$dbName", $userName, $password);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection Successful!";
}
catch(PDOException $e){
    echo "Error in Connection!" .$e->getMessage();
}



?>