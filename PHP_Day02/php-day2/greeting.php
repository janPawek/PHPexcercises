<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$age = $_POST['age'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Welcome <?= $firstName . ' ' . $lastName ?></h2>
    <p>You are <?= $age ?> years old</p>
</body>

</html>