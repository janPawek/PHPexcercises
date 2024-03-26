<?php
require "./db_connect.php";

$id = $_GET["id"];

$sql = "SELECT * FROM `products` WHERE id = {$id}";


$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$layout = "<p>{$row["name"]}</p>
<p>{$row["price"]}</p>
<img src='pictures/{$row["picture"]}'>";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <?= $layout ?>

    </div>
    <a class="btn btn-danger" href="index.php">Back</a>
</body>

</html>