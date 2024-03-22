<?php
    require "db_connect.php";

    // Initialisiere die Suchanfrage
    $search = "";
    if(isset($_GET['search'])) {
        $search = $_GET['search'];
    }

    // Erstelle die SQL-Anfrage unter Berücksichtigung der Suchanfrage
    $sql = "SELECT * FROM `inventory` WHERE `title` LIKE '%$search%' OR `author_first_name` LIKE '%$search%' OR `author_last_name` LIKE '%$search%' OR `ISBN` LIKE '%$search%' OR `short_des` LIKE '%$search%' OR `long_des` LIKE '%$search%' OR `type` LIKE '%$search%'  OR `publisher_name` LIKE '%$search%' OR `publisher_address` LIKE '%$search%' OR `status_del` LIKE '%$search%' OR `publish_date` LIKE '%$search%'";

    $result = mysqli_query($conn, $sql);

    $layout = "";

    if(mysqli_num_rows($result) == 0){
        $layout = "No result";
    } else {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card_over {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="row row-cols-lg-2">
        <h1>All products - best price!</h1>
        <br>

        <!-- Suchformular -->
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>
    <!-- Ergebnisse anzeigen -->
    <div class='row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1'>
        <?= $layout ?>
    </div>

    <a class="btn btn-primary" href="create.php">Create a product</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
