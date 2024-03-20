<?php
$result = " ";

if(isset($_POST["submit"])){
    $fname= strip_tags($_POST["fName"]);
    $lname= strip_tags($_POST["lName"]);
   $result= "My name is {$fname} {$lname}";

}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>serri live coding</title>
</head>
<body>
    <form method="post">
        
<input name="fName" type="text" placeholder="First name">
<input name="lName" type="text" placeholder="Last name">
<input name="submit" type="submit" value="Send">
    </form>
    <?=$result ?>
    <a href="test.php?id=50"><br>Pre-work day 2 (example)</a>
</body>
</html>