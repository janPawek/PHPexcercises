<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<body>
    <h1>PHP</h1>
<?php
    echo "<p><h1>Hello World!!!!!</h1></p>"; ?> 
        <!-- #This is a comment
        //My first PHP statement
        /* i am another comment
        */ -->
<?php echo "<br> Hello again";?>
<?php echo "<br>PHP Course";?>
<?php echo "I \"love\" PHP<br>";?>
<?php 
    echo "one" . " " . "two <br>";
    echo "one " . "two <br>";
    echo "one " . "two " . "three <br>";
    $fruit ="apple";
    $color ="red";
    $FRUIT ="orange";
    $favoriteFood = "pizza"; // cammelCase
    $favorite_food = "pizza"; // snakeCase

?>
<h2>My favorite fruit is <?= $fruit ?> and it has a color of <?= $color ?></h2>
<h3>i will be <?= $FRUIT ?> a different fruit from first</h3>


<?php 

$name = "Jane";
$programming_language = "PHP";

echo "My name is " . $name . ".";
echo "<br> I am learning " . $programming_language . " programming language";
$programming_language = "Java";
echo "<br> I am learning  $programming_language programming language";
$high_level_language = $programming_language;
echo "<br> I am learning $high_level_language programming language <br>";

$age = 26;
echo $age;
$decimal_number = 5.2;
echo "<br>" . $decimal_number . "<br>";

echo gettype($age) . "<br>";
echo gettype($decimal_number) . "<br>";

var_dump($age);
var_dump($decimal_number);
$name = "John";
var_dump($name);

echo "<br>" . 8.3 + 2.9;
$age = 32;
$current_year = 2024;
echo "<br>" . $current_year - $age;

echo "<br>" . 18 * 2 /3;
?>

<?php 
$message = "Hello";

function greeting()
{
    $message = "Good morning";
    global $message;
    echo $message;
}

greeting();

echo "<br>" . $message;

$name = "John";
$lastName = "Doe";
$fullName;

function printName(){
    $GLOBALS['fullName'] = $GLOBALS['name'] . '' . $GLOBALS['lastName'];
    echo $GLOBALS['fullName'];
}

printName();
echo "<br>" . $fullName;

function get_counter()
{

    static $counter = 1;
    return $counter++;
}
    
echo "<br>" . get_counter() . "<br>";
echo "<br>" . get_counter() . "<br>";
echo "<br>" . get_counter() . "<br>";

?>

<?php

$my_array = array(15,45,26);


echo '<pre>';
print_r($my_array);
echo '</pre>';

echo "The lenght of the array is " . count($my_array) . '<br>';

echo $my_array[2];
$my_array[0] = 36;
$my_array[1] = "thirty";
$my_array[2] = 152;

echo '<pre>';
print_r($my_array);
echo '</pre>';

$my_array[] = 'One';
$my_array[] = 'Two';

echo '<pre>';
print_r($my_array);
echo '</pre>';

array_pop($my_array);

echo '<pre>';
print_r($my_array);
echo '</pre>';

array_push($my_array, "ten", 12, "Fourty", 152);

echo '<pre>';
print_r($my_array);
echo '</pre>';

array_shift($my_array);
echo '<pre>';
print_r($my_array);
echo '</pre>';

array_unshift($my_array, 35, 'test', 596, 4536);

echo '<pre>';
print_r($my_array);
echo '</pre>';
?>
<?php
$nested_arr = [[1,2], [3,4,5], [6, 7]];

echo '<pre>';
print_r($my_array);
echo '</pre>';

echo $nested_arr[1][2];

$php_array = array(
"language" => "PHP",
"creator" => "Rasmus Lerdof",
"year_created" => 1995
);

echo '<pre>';
print_r($php_array);
echo '</pre>';

echo $php_array['creator'];

$php_array['website'] = "https://www.php.net";


$php_array[] = "test";

echo '<pre>';
print_r($php_array);
echo '</pre>';

?>

</body>
</html>