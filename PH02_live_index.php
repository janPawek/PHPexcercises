<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Day 02</title>
</head>
<body>
    <?php
    // methods
    echo"Hello";

    $name = "John";
    $lastName = "Doe";
    $GLOBALS['fullName'] = $name . ' ' . $lastName;
    
    echo $GLOBALS['fullName'];
    $test = 'test';

    function greeting()
    {
        global$test;
        echo $test;
        echo "<br> Hello " . $GLOBALS['fullName'];
    }
    greeting();
    ?>
<form action="PHP02_live_greeting.php" method="GET">
FirstName: <input type="text" name="firstname">
LastName: <input type="text" name="lastname">
Age: <input type="text" name="age">
<input type="submit" name="submit">
</form>
<a href="PHP02_live_index.php">Reset</a>
<br>
$_GET
<?php
echo "<pre>";
print_r($_GET);
echo "</pre>";
// echo $_GET['firstname'];

?>

</body>
</html>