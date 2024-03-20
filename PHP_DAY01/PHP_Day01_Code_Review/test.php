<?php require_once "var.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Document</title>
</head>


<body>
    <h1>Hello <?= $arr["name"]?></h1>

    <div class="container">
        <div class="row row-cols-3">
            <div>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $people["John"]["lname"] ?></h5>
                        <p class="card-text"><?= implode(", ", $people["John"]["hobbies"]) ?></p>
                        <p class="card-text"><?= $people["John"]["age"] ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</body>

</html>