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
                                <img src='picture/{$value["image"]}' class='card-img-top' height='55%' alt='...'>
                                <br><br>
                                <h5 class='card-text'>{$value["author_first_name"]} {$value["author_last_name"]}</h5>
                                <p class='card-text'>" . substr($value["long_des"], 0, 60) . "... more</p>
                                <a class='btn btn-warning' href='publisher.php?publisher_name={$value["publisher_name"]}'>{$value["publisher_name"]}</a>
                                <br><br>
                                <div class='card_over'>
                                    <a href='details.php?id={$value["id"]}' class='btn btn-primary'>Details</a>
                                    <button type='button' class='btn {$buttonClass}' disabled>{$value["status_del"]}</button>
                                </div>
                                    <br>
                                    <div class='card_over'>
                                            <a href='delete.php?id={$value["id"]}' class='btn btn-danger'>Delete</a>
                                            <a href='update.php?id={$value["id"]}' class='btn btn-dark'>Update</a>
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
        .foot {
    width: 100%;
    background-color: black;
    color: white;
    ul {
        padding-top: 1%;
        display: flex;
        list-style-type: none;
        justify-content: center;
        li {
            cursor: pointer;
            padding: 10px;
        }
    }
}
      .autocomplete-box {
            position: relative;
        }
        .autocomplete-results {
            position: absolute;
            background-color: #fff;
            border: 1px solid #ddd;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            z-index: 1000;
        }
        .autocomplete-item {
            padding: 5px;
            cursor: pointer;
        }
        .autocomplete-item:hover {
            background-color: #f0f0f0;
        }
    </style>
    <title>Big Library - CodeReview Backend - Jan Pawek</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary sticky-bottom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Big Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create.php">Create</a>
        </li>
      </ul>

      <!-- Suchformular -->
      <form class="d-flex" role="search" action="" method="GET">
        <div class="autocomplete-box">
          <input id="searchInput" class="form-control me-2" type="text" name="search" placeholder="Search..." aria-label="Search">
          <div class="autocomplete-results"></div>
          <button class="btn btn-outline-success" type="submit">Search</button>
        </div>
      </form>
    </div>
    </div>
  </div>
</nav>

        <h1>All products - best price!</h1>
        <br>

    <!-- Ergebnisse anzeigen -->
    <div class='row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1'>
        <?= $layout ?>
    </div>

    <a class="btn btn-primary" href="create.php">Create a product</a>
        <br>
        <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchInput').addEventListener('input', function() {
        var searchText = this.value.trim();
        if(searchText.length >= 2) {
            fetch('autocomplete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'search=' + encodeURIComponent(searchText)
            })
            .then(response => response.text())
            .then(data => {
                document.querySelector('.autocomplete-results').innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        } else {
            document.querySelector('.autocomplete-results').innerHTML = '';
        }
    });

    document.addEventListener('click', function(event) {
        if(!event.target.closest('.autocomplete-item')) {
            document.querySelector('.autocomplete-results').innerHTML = '';
        }
    });

    document.querySelector('.autocomplete-results').addEventListener('click', function(event) {
        var selectedText = event.target.textContent;
        document.getElementById('searchInput').value = selectedText;
        this.innerHTML = '';
    });
});
</script>
</body>
</html>
