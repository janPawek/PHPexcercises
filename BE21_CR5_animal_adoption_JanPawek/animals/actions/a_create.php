<?php
session_start();
if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
    header("Location: ../../index.php");
    exit;
}
if(isset($_SESSION["user"])){
    header("Location: ../../home.php");
    exit;
}
require_once '../../components/db_connect.php';
require_once '../../components/file_upload.php';

if ($_POST) {   
    $location = $_POST['location'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $character = $_POST['character'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $vaccinated = $_POST['vaccinated'];
    $status = $_POST['status'];
    $size = $_POST['size'];
   
    $uploadError = '';
    //this function exists in the service file upload.
    $picture = file_upload($_FILES['picture'], 'animals');  
    
        $sql = "INSERT INTO `animals`( `location`, `name`, `description`, `character`, `breed`, `age`, `picture`, `status`, `size`, `vaccinated`) VALUES ('$location','$name','$description','$character','$breed','$age','$picture->fileName','$status','$size', '$vaccinated')";
   
    

    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td> $location </td>
            </tr></table><hr>";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Create animal entry</title>
        <?php require_once '../../components/boot.php'?>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn" style="background-color:#a58d8b" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>