<?php

session_start();

include_once 'components/db_connect.php';

// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// if session is set to user this will redirect to the home page
if (isset($_SESSION['adm'])) {
    header("Location: adopted.php");
    exit;
}

$body = "";

if ($_GET['id']) {
    $id = $_GET['id'];
    $query = "SELECT * FROM animals  WHERE id = {$id}";
    $result = mysqli_query($connect, $query);
    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();

        $id = $data['id'];
        $location = $data['location'];
        $name= $data['name'];
        $description = $data['description'];
        $breed = $data["breed"];
        $character = $data['character'];
        $age = $data['age'];
        $picture = $data['picture'];
        $status = $data['status'];
        $size = $data['size'];
        $vaccinated = $data['vaccinated'];

        
            $body .= '<div class=" mb-5 col col-12 d-flex align-items-stretch">
        <div class="row g-1 container-fluid card shadow-lg bg-card-color">
        <img style="width:500px; height:600px; object-fit: cover; margin:auto" src=animals/pictures/'.$picture.' class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">'.$name.'</h5>
          <hr>
          <p class="card-text">Location : '.$location.'</p>
          <p class="card-text">Description: '.$description.'</p>
          <p class="card-text">Character: '.$character.'</p>
          <p class="card-text">Breed: '.$breed.'</p>
          <p class="card-text">Age: '.$age.'</p>
          <p class="card-text">Vaccinated: '.$vaccinated.'</p>
          <h3 class="mb-4">Do you really want to adopt this pet?</h3>
                <a href="a_adopt.php?id='.$id.'" class="btn btn-primary">Yes</a>
                <a href="javascript:history.back()" class="btn btn-danger">No</a><br>
          
          <a href="index.php" class="btn mt-2" style="background-color:#a58d8b">Go Back</a>
        </div>
      </div>
      </div>
      ';
        

    } else {
        header("location: error.php");
    }
} else {
    header("location: error.php");
}

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS bundle  -->
    <?php include_once 'components/boot.php';?>
    <title>Adopt Pet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container text-center">
        <div class="row justify-content-evenly py-5">
            <div class="mt-3 mb-3">
                
                <?= $body ?>
                
            </div>
        </div>
    </div>
    <div class="d-flex footer text-center align-items-center justify-content-center text-white" style="background-color: #183190;
    height: 60px;">
    <h2 style="font-size:1.2rem">&copy; Copyright 2022 - Pet Adopt</h2>
</div>
</body>
</html>