<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<!-- Define an associative array and output array elements on the screen. Use for this cartoon/anime/game characters (like Mickey Mouse, Super Mario, Goku, Pokemon etc.). 

Transform this code into a solution done with multidimensional arrays to track different properties of the characters. (hint: in order to output nicely (user friendly) your solutions on the browser you will need the HTML tags for it).   -->

<?php
$art_array = array(
    "cartoon" => "Mickey Mouse",
    "anime" => "Goku",
    "game" => "Super Mario"
    );
    
    echo $art_array['cartoon'];
    // echo '<pre>';
    // print_r($php_array);
    // echo '</pre>';
    
$actors = array(
        "MickeyMouse" => array
            (
            "name_cartoon" => "Mickey Mouse"
            "cartoon_actors" => "cartoon character",
            "sex_cartoon"  => "female",
            "age_actor"  => 89
            ),
        "Goku" =>   array
            (
            "name_anime" => "Goku"
            "anime_actors"  => "anime character",
            "sex_anime" => "male",
            "age_anime"  => 55
            ),
        "SuperMario" =>   array
            (
            "name_game" => "Super Mario"
            "game_actors"  => "game character",
            "sex_game"  => "male",
            "age_game"  => 35
            )
        );
     /* Accessing multidimensional array values */
    echo  "Marks for Mark in Physics: ";
    echo "$actors[ 'Mickey Mouse']['cartoon_actors'] . "<br/>" ;
     echo "Marks for Anthony in Maths: ";
     echo $actors['AMickey Mouseny']['Maths' ] . "<br/>" ;
    echo  "Marks for Eric in Chemistry: " ;
     echo $actors['EMickey Mouse]['Chemistry' ] .  "<br/>";
    //Output:
    //Marks for Mark in Physics: 35
     //Marks for anthony in Maths: 32
    //Marks for eric in Chemistry: 39


?>
    
</body>
</html>