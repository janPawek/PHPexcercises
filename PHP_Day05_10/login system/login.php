<?php
session_start();

if (isset($_SESSION["admin"])) {
    header("Location: dashboard.php");
}

if (isset($_SESSION["user"])) {
    header("Location: home.php");
}

require_once "db_connect.php";
require_once "functions.php";

$error = false;
$email = $emailError = $passError = "";

if (isset($_POST["login"])) {
    $email = cleanInput($_POST["email"]);
    $password = cleanInput($_POST["password"]);

    # email validation

    if (empty($email)) {
        $error = true;
        $emailError = "You can't leave this input empty!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please type a valid email!";
    }

    if (empty($password)) {
        $error = true;
        $passError = "You can't leave this input empty!";
    }

    if (!$error) {
        $password = hash("sha256", $password);

        $sql = "SELECT * FROM `users` WHERE email = '{$email}' and password = '{$password}'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);

        if ($count == 1) {
            if ($row["status"] == "adm") {
                $_SESSION["admin"] = $row["id"];
                header("Location: dashboard.php");
            } else {
                $_SESSION["user"] = $row["id"];
                header("Location: home.php");
            }
        }
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
        <h1>Login page</h1>

        <form method="post">
            <input type="email" placeholder="Type your email!" class="form-control" name="email" value="<?= $email ?>">
            <p class="text-danger"><?= $emailError ?></p>
            <input type="password" placeholder="Type your password" class="form-control" name="password">
            <p class="text-danger"><?= $passError ?></p>
            <input type="submit" value="Login now" class="btn btn-primary" name="login">
        </form>
    </div>
</body>

</html>