<?php
// i have to modify it by Live-Coding video 
require_once "db_connect.php";
require_once "functions.php";


function fileUpload($image, $case = "user")
{
    if($image["error"] == 4){
        // checking if a file
        $imageName = "avatar.png";
        if($case === "product"){
            $imageName = "default_product.jpg";

        }
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