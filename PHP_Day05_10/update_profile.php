<?php

session_start();

require_once "db_connect.php";
require_once "header.php";
require_once "footer.php";
require_once "./file_upload.php";
require_once "functions.php";

$session = 0;
$goBack = "";


if(isset($_SESSION["admin"])){
    $session = $_SESSION["admin"];
    $goBack = "dashboard.php";
}else {
$session = $_SESSION["user"];
$goBack = "index.php";
}


$sql = "SELECT * FROM users WHERE id = {$session}";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST["update"])){
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$date_of_birth = $_POST["date_of_birth"];
$picture = fileUpload($_FILES["picture"]);

if($_FILES["picture"]["error"] == 4){
    $update = "UPDATE `users` SET `first_name` = '{$first_name}' , `last_name` = '{$last_name}' ,  `date_of_birth` = '{$date_of_birth}' , `email` = '{$email}' WHERE id = {$session}";
} else {
    
    $update = "UPDATE `users` SET `first_name` = '{$first_name}' , `last_name` = '{$last_name}' ,  `date_of_birth` = '{$date_of_birth}' , `email` = '{$email}',`picture` = '{$picture[0]}' WHERE id = {$session}";

    if ($row["picture"] != "avatar.png") {
        unlink("pictures/{$row["picture"]}");
    }
}
 if(mysqli_query($conn,$update)){
    header("Location: {$goBack}");
 }
}


?>

<?php my_header();?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="first_name" value="<?= $row["first_name"] ?>">
    <input type="text" name="last_name" value="<?= $row["last_name"] ?>">
    <input type="text" name="email" value="<?= $row["email"] ?>">
    <input type="date" name="date_of_birth" value="<?= $row["date_of_birth"] ?>">
    <input type="file" name="picture">
    <input type="submit" name="update">

</form>

<?php my_footer();?>