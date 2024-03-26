<?php

function fileUpload($image)
{
    if($image["error"] == 4){
        $imageName = "product_default.jpg";
        $message = "No picture has been chosen, but you can upload an image later!";
    }else {
       $checkIfImage = getimagesize($image("tmp_name"));
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