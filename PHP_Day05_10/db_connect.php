<?php


$userName = "root";

$hostName = "127.0.0.1"; // or "localhost"

$password = "";

$databaseName = "cr4_with_file_upload";

$conn = mysqli_connect($hostName, $userName, $password, $databaseName);

if(!$conn){
    die("Connection failed");
}
?>

<!-- $title, $image, $ISBN, $short_des, $long_des, $type, $author_first_name, $author_last_name, $publisher_name, $publisher_address, $publish_date -->