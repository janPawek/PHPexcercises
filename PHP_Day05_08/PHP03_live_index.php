<?php
    require "PHP03_db_connect.php"; //include is the other oppertunity

    $sql = "SELECT * FROM `products`";


    $result = mysqli_query($conn, $sql); // it is like clicking GO-Button

    $layout = "";

    if(mysqli_num_rows($result) == 0){
        $layout = "No result";
    } else {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //fetch assoc fetching one record only
        //fetch array fetching one record only
        foreach ($rows as $value) {
            $layout .= "<div><div class='card' style='width: 18rem;'>
            <img src='pictures/{$value["picture"]}' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>{$value["name"]}</h5>
              <p class='card-text'>{$value["price"]} €</p>
              <a href='PHP03_details.php?id={$value["id"]}' class='btn btn-primary'>Details</a>
            </div>
            </div>
          </div>";
        }
        // var_dump($rows);
    }


    // only for deveoloping and debugging
    var_dump($result);


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
  <h1>Hello world!</h1>
    <br>
    <div class="container">
        <a class="btn btn-primary" href="PHP03_create.php">Create a product</a>
        <div class="row row-column-3">
            <?= $layout ?>
        </div>
    </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



