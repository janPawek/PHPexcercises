<?php

require_once "db_connect.php";
require_once "./file_upload.php";
require_once "header.php";
require_once "footer.php";
require_once "functions.php";


function fileUpload($image)
{
    if($image["error"] == 4){
        $imageName = "default_product.jpg";
        $message = "No picture has been chosen, but you can upload an image later!";
    }else {
       $checkIfImage = getimagesize($image["tmp_name"]);
        $message = $checkIfImage ? "OK": "Not an image";
    }

    if($message == "OK"){
        $ext = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));

        $imageName = uniqid("") . "." . $ext;

        move_uploaded_file($image["tmp_name"], "picture/{$imageName}");
    }

    return [$imageName, $message];
}
?>