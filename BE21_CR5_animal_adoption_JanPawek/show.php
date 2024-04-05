<?php
    require_once 'components/db_connect.php';

    if($_GET["id"]) {
        $id = $_GET["id"];
        $sql= "SELECT * FROM animals WHERE id = {$id}";
        $result = mysqli_query($connect, $sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if(mysqli_num_rows($result) == 1) {
            $data = mysqli_fetch_assoc($result);
        } else {
            header("location: error.php");
        }
        mysqli_close($connect);
    } else {
        header("location: error.php");
    }

    $body="";

    foreach($rows as $row) {
        // $body .= '<div class=" mb-5 col col-12 d-flex align-items-stretch" >
        // <div class="row g-1 container-fluid card bg-card-color" style="background: color #000;">
        $body .= '<div class=" mb-5 col col-12 col-sm-12 col-md-6 col-lg-3 mg-10 d-flex align-items-stretch justify-content-center">
        <div class="row  container-fluid card shadow-md bg-card-color border-info-solid-black-8px">
        <img src=animals/pictures/'.$row["picture"].' class="card-img-top show_more_img" alt="...">
        <div class="card-body">
          <h5 class="card-title" style="font-size:2rem; margin-bottom:5%">'.$row["name"].'</h5>
          <hr>
          <p class="card-text">Location : '.$row["location"].'</p>
          <p class="card-text">Color: '.$row["description"].'</p>
          <p class="card-text"><b>About me:</b><br> '.$row["character"].'</p>
          <p class="card-text">Category: '.$row["category"].'</p>
          <p class="card-text">Breed: '.$row["breed"].'</p>
          <p class="card-text"><b>Age:</b> '.$row["age"].'</p>
          <hr>
          <p class="card-text">Vaccinated: '.$row["vaccinated"].'</p>
          <p class="card-text">Size: '.$row["size"].'</p>
          <p class="card-text"><b>Status:</b> '.$row["status"].'</p>
          
          <a href="index.php" class="btn" style="background-color:#a58d8b">Go Back</a>
        </div>
      </div>
      </div>
      ';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/boot.php' ?>
    <title>Details</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#183190">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#" style="color:black; font-size:1.8rem;font-weight:bold">Pet Adopt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php" style="font-size:1.3rem; font-weight:bold">Home</a> 
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="senior.php" style="font-size:1.3rem; font-weight:bold">Seniors</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>

<div class="container text-center d-flex align-items-center justify-content-center">

<?=$body?>

</div>
<div class="d-flex footer text-center align-items-center justify-content-center text-white" style="background-color: #183190;
    height: 60px;">
    <h2 style="font-size:1.2rem">&copy; Copyright 2022 - Pet Adopt</h2>
</div>
</body>
</html>