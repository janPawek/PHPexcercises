<?php

require_once "db_connect.php";
require_once "file_upload.php";

$id = $_GET["id"];

$sql = "SELECT * FROM `products` WHERE id = {$id}";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

if (isset($_POST["update"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $picture = fileUpload($_FILES["picture"]);

    if ($_FILES["picture"]["error"] == 4) {
        $sqlUpdate = "UPDATE `products` SET `name`='{$name}',`price`='{$price}' WHERE id = {$id}";
    } else {
        $sqlUpdate = "UPDATE `products` SET `name`='{$name}',`price`='{$price}',picture = '{$picture[0]}' WHERE id = {$id}";
    }

    $result = mysqli_query($conn, $sqlUpdate);

    if ($result) {
        echo "<div class='alert alert-success' role='alert'>
        Product has been updated!, {$picture[1]}
      </div>";
        header("refresh: 3; url= index.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>
        Something went wrong, please try again later!
      </div>";
    }
}

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
        <div class="text-center">
            <img src="pictures/<?= $row["picture"] ?>" alt="" width="150">
        </div>

        <form method="post" enctype="multipart/form-data">
            <input type="text" class="form-control" placeholder="Product name" name="name" value="<?= $row["name"] ?>">
            <input type="number" class="form-control" placeholder="Product price" name="price" value="<?= $row["price"] ?>">
            <input type="file" class="form-control" placeholder="Product image url" name="picture">
            <input class="btn btn-primary" type="submit" value="Update product" name="update">
        </form>
    </div>

</body>

</html>