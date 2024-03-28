<?php

session_start();

if (!isset($_SESSION["admin"]) && !isset($_SESSION["user"])) {
    header("Location: login.php");
}

if (isset($_SESSION["admin"])) {
    header("Location: dashboard.php");
}

require_once "db_connect.php";

$sql = "SELECT * from users WHERE id = {$_SESSION["user"]}";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello <?= $row["first_name"] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="pictures/<?= $row["picture"] ?>" alt="Bootstrap" width="30" height="24">
            </a>
            <a class="navbar-brand" href="updateprofile.php">
                Update profile
            </a>

            <a class="navbar-brand" href="logout.php?logout">
                Logout
            </a>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>