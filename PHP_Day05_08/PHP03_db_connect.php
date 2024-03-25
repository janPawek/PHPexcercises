<?php


$userName = "root";

$hostName = "127.0.0.1"; // or "localhost"

$password = "";

$databaseName = "crud_app";

$conn = mysqli_connect($hostName, $userName, $password, $databaseName );

if(!$conn){
    die("Connection failed");
}
?>