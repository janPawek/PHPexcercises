<?php
session_start();
require_once 'components/db_connect.php';


if (isset($_SESSION['adm'])) {
    header("Location: dashboard.php");
    exit;
}

if (!isset($_SESSION['adm']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}


$res = mysqli_query($connect, "SELECT * FROM users WHERE id=" . $_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

$sql ="SELECT * FROM animals";

    $result = mysqli_query($connect, $sql);

    $body = "";
    $nOR = mysqli_num_rows($result);

    if($nOR == 0) {
        $body = "No results";
    } else {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        
        foreach($rows as $val) {
            $body .= '<div class=" mb-5 col col-12 col-sm-12 col-md-6 col-lg-3 d-flex align-items-stretch justify-content-center">
            <div class="row g-1 container-fluid card shadow-md bg-card-color border-0">
            <div class="";">
            <img style="width:100%; height:350px; object-fit: cover;" src=animals/pictures/'.$val["picture"].' class="card-img-top img-fluid" alt="...">
            <div class="card-body">
              <h5 class="card-title" style="font-size:2rem; color:#183190; text-align:center">'.$val["name"].'</h5>
              <hr>
              <p class="card-text" style="text-align:center">'.$val["breed"].'<br> '.$val["location"].'</p>
              <a href="show.php?id='.$val["id"].'" class="m-1 btn  btn btn-success w-100" style="background-color:#183190">SHOW DETAILS</a>
              <a href="adopt.php?id='.$val["id"].'" class="m-1 btn btn-dark w-100" style="background-color:#183190">ADOPT ME</a>
            </div>
            </div>
            </div>
          </div>
          ';
        }
    }
mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome</title>


<?php require_once 'components/boot.php'?>

<style>
.userImage{
width: 200px;
height: 200px;
}
.hero {
    background-color: rgb(158,134,48);
    background: rgb(158,134,48);   
}

</style>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color: white">

<div class="bg-image mb-4">


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
       
       <div class="text-center text-align-center align-items-center color-black">
       <h2 class="hero-heading">Adopt a Pet - Get a new friend!</h2>
       <br>
      
 
    </div>

</div>

<div class="container" style="background-color:white">
    <div class="hero shadow">
        <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
        <p class="text-black profile_text" >Hi <?php echo $row['first_name']; ?></p>
        
    </div>
   
    <a style="width: 180px; margin-top:5%" class="btn btn-danger" href="logout.php?logout">Sign Out</a> <br>
    <a style="width: 180px; margin-top:0.5rem; margin-bottom:0.5em;" class="btn btn-success" href="update.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a>
    
    <h2 class="text-center m-5" style="color:black">Waiting for adoption:</h2>
    <div class="row">
    <?= $body ?>


</div>
</div>
<div class="d-flex footer text-center align-items-center justify-content-center text-white" style="background-color: #183190;
    height: 60px;">
    <h2 style="font-size:1.2rem">&copy; Copyright 2022 - Pet Adopt</h2>
</div>
</body>
</html>