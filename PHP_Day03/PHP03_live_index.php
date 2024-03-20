<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
/* 1 -> 100 */
// for ($i = 1; $i < 101; $i++) {
//     echo "{$i} <br>";
// }
/*
    $i = 1
    1 < 101  true  ->  echo 1
    $i = 2
    2 < 101  true  ->  echo 2
    $i = 3
    3 <
*/
/* 1 -> 100 */
// $i = 1;
// while ($i <= 100) {
//     echo "{$i} <br>";
//     $i++;
// }
$arr = ["num" => [1, 2, 3], "num2" => 6, 9, 33, 20];
foreach ($arr as $key =>  $val) {
    echo "{$val}, the key is {$key} <br>";
}
?>
</body>
</html>