<?php

require "./db_connect.php";

$id = $_GET["id"];

$sql = "SELECT * FROM `inventory` WHERE id = {$id}";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$layout = "<p><h4>{$row["title"]}</h4></p>
<img src='{$row["image"]}'>
<p><h5>{$row["author_first_name"]} {$row["author_last_name"]}</h5></p>
<p>{$row["long_des"]}</p>
<p>{$row["ISBN"]}</p> 
<p>{$row["type"]}</p>
<p>{$row["publisher_name"]}</p>
<p>{$row["publisher_address"]}</p>
<p>{$row["publish_date"]}</p>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <br>
    <div class="container">
            <?= $layout ?>
    </div>

    <a class="btn btn-danger" href="index.php">Back</a>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>