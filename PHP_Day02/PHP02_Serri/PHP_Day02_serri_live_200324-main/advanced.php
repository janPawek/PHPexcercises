<?php


function convertToC($degree){
    $c = $degree *5/9;
    return number_format($c, 1);
}

$result= convertToC(60);
// $result = rand(0,50);
$img = " ";
$message = "";

if($result < 6){
    $img = "https://cdn.pixabay.com/photo/2013/10/27/17/14/snowfall-201496_1280.jpg";
    $message = "very cold";

}elseif($result < 11){
    $img = "https://cdn.pixabay.com/photo/2013/09/18/00/28/leaf-183283_1280.jpg";
    $message = "cold";
}elseif($result < 16){
    $img = "https://cdn.pixabay.com/photo/2017/07/07/14/56/mill-2481671_1280.jpg";
    $message = "pleasant";
}elseif($result < 21){
    $img = "https://cdn.pixabay.com/photo/2017/10/10/07/48/beach-2836300_1280.jpg";
    $message = "warm";
}else{
$img = "https://cdn.pixabay.com/photo/2016/03/23/15/00/ice-cream-1274894_1280.jpg";
$message = "hot";}
    

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="card" style="width: 18rem;">
  <img src="<?= $img?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?= $message?></h5>
   
 
  </div>
</div>
    <h1><?= $result ?></h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>