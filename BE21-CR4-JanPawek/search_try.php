<?php
    require "db_connect.php";

    // Initialisiere die Suchanfrage
    $search = "";
    if(isset($_GET['search'])) {
        $search = $_GET['search'];
    }




    $sql = "SELECT DISTINCT `title` FROM `inventory` WHERE `title` LIKE '%$search%' LIMIT 5";

    $result = mysqli_query($conn, $sql);

    $suggestions = array();

    while($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = $row['title'];
    }

    echo json_encode($suggestions);




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
                                <img src='{$value["image"]}' class='card-img-top' height='55%' alt='...'>
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
    <h1>All products - best price!</h1>
    <br>

    <!-- Suchformular mit Vorschlägen -->
    <form action="" method="GET">
        <input type="text" name="search" id="search" placeholder="Search...">
        <div id="suggestions"></div> <!-- Container für Suchvorschläge -->
        <button type="submit">Search</button>
    </form>

    <!-- Ergebnisse anzeigen -->
    <div class='row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1' id="searchResults">
        <!-- Ergebnisse werden hier dynamisch eingefügt -->
    </div>

    <a class="btn btn-primary" href="create.php">Create a product</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Funktion zur Aktualisierung der Suchergebnisse
        function updateSearchResults(searchQuery) {
            fetch('search.php?search=' + searchQuery)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('searchResults').innerHTML = data;
                });
        }

        // Event-Listener für das Eingabefeld
        document.getElementById('search').addEventListener('input', function() {
            const searchQuery = this.value;
            if(searchQuery.length > 0) {
                // Suche aktualisieren, wenn Eingabe vorhanden ist
                updateSearchResults(searchQuery);
            } else {
                // Wenn das Eingabefeld leer ist, alle Produkte anzeigen
                updateSearchResults('');
            }
        });

        // Funktion zur Anzeige von Suchvorschlägen
        function showSuggestions(suggestions) {
            const suggestionsContainer = document.getElementById('suggestions');
            suggestionsContainer.innerHTML = ''; // Clear previous suggestions
            suggestions.forEach(suggestion => {
                const suggestionElement = document.createElement('div');
                suggestionElement.textContent = suggestion;
                suggestionElement.classList.add('suggestion');
                suggestionElement.addEventListener('click', function() {
                    document.getElementById('search').value = this.textContent;
                    updateSearchResults(this.textContent);
                    suggestionsContainer.innerHTML = ''; // Clear suggestions after selection
                });
                suggestionsContainer.appendChild(suggestionElement);
            });
        }

        // Event-Listener für das Eingabefeld zur Anzeige von Suchvorschlägen
        document.getElementById('search').addEventListener('input', function() {
            const searchQuery = this.value;
            if(searchQuery.length > 0) {
                fetch('suggest.php?search=' + searchQuery)
                    .then(response => response.json())
                    .then(data => {
                        showSuggestions(data);
                    });
            } else {
                document.getElementById('suggestions').innerHTML = ''; // Clear suggestions if input is empty
            }
        });
    </script>

</body>
</html>
