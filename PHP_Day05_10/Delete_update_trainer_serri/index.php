<?php
require_once "db_connect.php";

$sql = "SELECT * FROM `products`";

$result = mysqli_query($conn, $sql);

$layout = "";

if (mysqli_num_rows($result) == 0) {
    $layout = "No result";
} else {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // fetch assoc fetching one record only
    // fetch array fetching one record only 
    foreach ($rows as $value) {
        $layout .= "<div><div class='card' style='width: 18rem;'>
        <img src='pictures/{$value["picture"]}' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'>{$value["name"]}</h5>
          <p class='card-text'>{$value["price"]} €</p>
          <a href='details.php?id={$value["id"]}' class='btn btn-primary'>Details</a>
          <a href='delete.php?id={$value["id"]}' class='btn btn-danger'>Delete</a>
          <a href='update.php?id={$value["id"]}' class='btn btn-warning'>Update</a>
        </div>
      </div></div>";
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
        <a class="btn btn-primary" href="create.php">Create a product</a>
        <div class="row row-cols-3">
            <?= $layout ?>
        </div>
    </div>


</body>

</html>