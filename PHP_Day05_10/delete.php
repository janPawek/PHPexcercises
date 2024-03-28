<?php

require_once "db_connect.php";
require_once "./file_upload.php";
require_once "header.php";
require_once "footer.php";
require_once "functions.php";

if(!isset($_SESSION["user"]) && !isset($_SESSION["admin"])) {
    header(("Location: login.php"));
}

if (isset($_SESSION["user"])) {
    header("Location: index.php");
}

$id = $_GET["id"];

// part to delete the image too from the following file which would be deleted

$sqlread = "SELECT * FROM inventory WHERE id = {$id}";

$resultread = mysqli_query($conn, $sqlread);

$row = mysqli_fetch_assoc($resultread);

// every image will be deleted except the default image for products e.g. "image" is from Mysql and "picture" is the folder at e.g. vsc, where the uploaded-pictures are inside
if($row["image"] !="default_product.jpg"){
    unlink("picture/{$row["image"]}");
};


// part to delete the record
$sql = "DELETE FROM `inventory` WHERE id= {$id}";

$result = mysqli_query($conn,$sql);

if($result){
    header("Location: index.php");
}

?>