<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        h1{
            text-align:center;
        }
        .cards{
            display: flex;
            margin:5vw;
        }
        .card{
            display: flex;
            margin:1vw;
        }
    </style>
</head>
<body>
<?php
#Beginner Challenges
#Exercise1
$firstName="Mario";
$lastName="Geremicca";
// echo "<h1>My name is</h1>" . "<h1>$firstName</h1>" . "<h1>$lastName </h1>";
echo "<h1>My name is  $firstName  $lastName </h1>";
#Exercise2
$fullName="Mario Geremicca";
$age=28;
$job="programmer";
echo"Hi, my name is $fullName, and i am $age, and i work as a $job.<br><br>";
#Exercise3
$players= ["Mark","John","George","Lisa"];
echo "the third player in the team is $players[2]";
#Advanced Challenges
#Exercise1
$cartoon_arr=[
    "Super Mario"=>["age"=>42,
                    "height"=>"1.63",
                    "game"=>"Super Mario World"],
    "Mickey Mouse" => ["age"=>15,
                        "height"=>"1.55",
                        "game"=>"The Ducktales"],
    "Goku"=>["age"=>30,
            "height"=>"1.83",
             "game"=>"Dragonball"]];
echo "<pre>";
print_r($cartoon_arr);
echo "<pre>";
?>
<div class="cards">
<div class="card" style="width: 18rem;">
  <img src="../PHPday1.php/img/super-mario.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text"> Age: <?= $cartoon_arr["Super Mario"]["age"] ?><br> Height: <?= $cartoon_arr["Super Mario"]["height"] ?><br> Game: <?= $cartoon_arr["Super Mario"]["game"] ?></p>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="../PHPday1.php/img/mickey.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text"> Age: <?= $cartoon_arr["Mickey Mouse"]["age"] ?><br> Height: <?= $cartoon_arr["Mickey Mouse"]["height"] ?><br> Game: <?= $cartoon_arr["Mickey Mouse"]["game"] ?></p>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <img src="../PHPday1.php/img/goku.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text"> Age: <?= $cartoon_arr["Goku"]["age"] ?><br> Height: <?= $cartoon_arr["Goku"]["height"] ?><br> Game: <?= $cartoon_arr["Goku"]["game"] ?></p>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
