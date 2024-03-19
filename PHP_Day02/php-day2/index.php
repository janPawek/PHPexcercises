<?php
//  echo "Hello";

// $name = "John";
// $lastName = "Doe";
// $GLOBALS['fullName'] = $name . ' ' . $lastName;

// echo $GLOBALS['fullName'];
// $test = 'test';

// function greeting()
// {
//     global $test;
//     echo $test;
//     echo "<br> Hello " . $GLOBALS['fullName'];
// }
// greeting();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        FirstName: <input type="text" name="firstname">
        LastName: <input type="text" name="lastname">
        Age: <input type="text" name="age">
        <input type="submit" name="submit">
    </form>
    <a href="index.php">Reset</a>
    <br>
    $_POST
    <?php
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    if (isset($_POST['submit'])) {

        if ($_POST['firstname'] && $_POST['lastname'] && $_POST['age']) {
            echo "<br> Hello " . $_POST['firstname'] . ' ' . $_POST['lastname'];
            echo "<br>You are " . $_POST['age'] . ' years old';
        }
    }
    ?>

</body>

</html>