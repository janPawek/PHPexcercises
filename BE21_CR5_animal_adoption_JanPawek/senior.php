<?php
session_start();
require_once 'components/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}



$sql ="SELECT * FROM animals";

    $result = mysqli_query($connect, $sql);
    
    $body = "";
    $nOR = mysqli_num_rows($result);

    if($nOR == 0) {
        $body = "No results";
    } else {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        foreach($rows as $val) {
            if($val["age"] > 7) {
            $body .= '<div class=" mb-5 col col-12 col-sm-12 col-md-6 col-lg-3 d-flex align-items-stretch">
            <div class="row g-1 container-fluid card shadow-lg bg-card-color">
            <div class="";">
            <img style="width:100%; height:220px; object-fit: cover;" src=animals/pictures/'.$val["picture"].' class="card-img-top img-fluid" alt="...">
            <div class="card-body">
              <h5 class="card-title">'.$val["name"].'</h5>
              <hr>
              <p class="card-text">Description:'.$val["description"].'<br> '.$val["location"].'</p>
              <p class="card-text">Age:'.$val["age"].'</p>
              <p class="card-text">Vaccinated:'.$val["vaccinated"].'</p>
              <a href="show.php?id='.$val["id"].'" class="m-1 btn  btn btn-success w-100" style="background-color:#a58d8b">SHOW DETAILS</a>
              <a href="adopt.php?id='.$val["id"].'" class="m-1 btn btn-dark w-100" style="background-color:#a58d8b">ADOPT ME</a>
            </div>
            </div>
            </div>
          </div>
          ';
        }
    }
    
}
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Seniors </title>
<?php require_once 'components/boot.php'?>
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
<div class="container">
    <h2 class="text-center m-5">The Seniors</h2>
    <div class="row">
    <?= $body ?>
    </div>

    <a class="btn mb-4" style="background-color:#a58d8b" href="home.php">Go back</a>
</div>
<div class="d-flex footer text-center align-items-center justify-content-center text-white" style="background-color: #183190;
    height: 60px;">
    <h2 style="font-size:1.2rem">&copy; Copyright 2022 - Pet Adopt</h2>
</div>
</body>
</html>