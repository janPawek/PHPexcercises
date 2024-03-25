<?php

function fileUpload($picture)
{
    if($picture["error"] == 4){
        $pictureName = "product_default.jpg";
        $message = "No picture has been chosen, but you can upload an image later!";
    }else {
       $checkIfImage = getimagesize($picture("tmp_name"));
        $message = $checkIfImage ? "OK": "Not an image";
    }

    if($message == "OK"){
        $ext = strtolower(pathinfo($picture["name"], PATHINFO_EXTENSION));

        $pictureName = uniqid("") . "." . $ext;

        move_uploaded_file($picture["tmp_name"], "pictures/{$pictureName}");
    }

    return [$pictureName, $message];
}
?>