<?php
require_once "db_connect.php";

$id = $_GET["id"];

$sqlread = "SELECT * FROM products WHERE id = {$id}";

$resultRead = mysqli_query($conn, $sqlread);

$row = mysqli_fetch_assoc($resultRead);

if ($row["picture"] != "product.jpg") {
    unlink("pictures/{$row["picture"]}");
}

$sql = "DELETE FROM `products` WHERE id = {$id}";

$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: index.php");
}
