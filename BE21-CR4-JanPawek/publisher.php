<?php
require_once "./db_connect.php";
$publisher_name = $_GET["publisher_name"];
$sql = "SELECT * FROM `inventory` WHERE publisher_name = '{$publisher_name}'";
$result = mysqli_query($conn, $sql);
    // var_dump($result);
    $layout =" ";
    if(mysqli_num_rows($result) == 0){
        $layout = "No result";
    }else{
        $rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
        foreach ($rows as $value) {
            $buttonClass = (strpos($value["status_del"], "available") !== false) ? "btn-light" : "btn-danger";
        $layout .= "<div class='card'>
                        <div class='card-body'>
                            <h3 class='card-title'>{$value["title"]}</h3>
                            <img src='{$value["image"]}' class='card-img-top' height='65%' alt='...'>
                            <br><br>
                            <h5 class='card-text'>{$value["author_first_name"]} {$value["author_last_name"]}</h5>
                            <p class='card-text'>{$value["short_des"]}</p>
                            <a class='btn btn-warning' href='publisher.php?publisher_name={$value["publisher_name"]}'>{$value["publisher_name"]}</a>
                            <br><br>
                            <div class='card_over'>
                                <a href='details.php?id={$value["id"]}' class='btn btn-primary'>Details</a>
                                <button type='button' class='btn {$buttonClass}' disabled>{$value["status_del"]}</button>
                            </div>
                        </div>
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
    <style>
        *{margin: 0;}
        .card_over{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    </style>
</head>
<body>
<div class="container-fluid">
<div class='row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1'>
       <?= $layout ?>
</div>
<a class="btn btn-danger" href="index.php">Back</a>

    </div>