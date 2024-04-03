<?php

require_once "db_connect.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];
}


// part to delete the record
$sql = "DELETE FROM `cart` WHERE id= {$id}";

$result = mysqli_query($conn,$sql);

if($result){
    header("Location: cart.php");
}

?>