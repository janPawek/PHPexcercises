<?php

require "./PHP03_db_connect.php";

$id = $_GET["id"];

$sql = "SELECT * FROM `products` WHERE id = {$id}";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$layout = "<p>{$row["name"]}</p>
<p>{$row["price"]}</p>
<img src='{$row["picture"]}'>";
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

    <a class="btn-btn-danger" href="PHP03_live_index.php">Back</a>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>