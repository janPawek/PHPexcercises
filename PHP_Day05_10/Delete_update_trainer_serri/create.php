<?php
require "db_connect.php";
require "./file_upload.php";

if (isset($_POST["create"])) {
    $name = $_POST["name"];
    $price = $_POST["price"];
    $picture = fileUpload($_FILES["picture"]);

    $sql = "INSERT INTO `products`(`name`, `price`, `picture`) VALUES ('{$name}','{$price}','{$picture[0]}')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success' role='alert'>
        New product has been created!, {$picture[1]}
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
        <form method="post" enctype="multipart/form-data">
            <input type="text" class="form-control" placeholder="Product name" name="name">
            <input type="number" class="form-control" placeholder="Product price" name="price">
            <input type="file" class="form-control" placeholder="Product image url" name="picture">
            <input class="btn btn-primary" type="submit" value="Create product" name="create">
        </form>
    </div>

</body>

</html>