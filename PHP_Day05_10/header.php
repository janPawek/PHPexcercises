<?php
    require_once "db_connect.php";
    

    // Initialisiere die Suchanfrage
    $search = "";
    if(isset($_GET['search'])) {
        $search = $_GET['search'];
    }

    // Erstelle die SQL-Anfrage unter Berücksichtigung der Suchanfrage
    $sql = "SELECT * FROM `inventory` WHERE `title` LIKE '%$search%' OR `author_first_name` LIKE '%$search%' OR `author_last_name` LIKE '%$search%' OR `ISBN` LIKE '%$search%' OR `short_des` LIKE '%$search%' OR `long_des` LIKE '%$search%' OR `type` LIKE '%$search%'  OR `publisher_name` LIKE '%$search%' OR `publisher_address` LIKE '%$search%' OR `status_del` LIKE '%$search%' OR `publish_date` LIKE '%$search%'";

    $result = mysqli_query($conn, $sql);

    function my_header(){
        echo '<!DOCTYPE html>
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
        <main>';
        }
?>
