<?php
// Functions

// function greeting($name, $course)
// {
//     echo "Hello $name <br>";
//     echo "I hope you are enjoying $course days <br>";
//     return "CodeFactory <br>";
// }
// $returned_val = greeting('John', "PHP");
// echo $returned_val;
// echo greeting("Anna", "Javascript");
// echo greeting("Max", "Java");
// echo greeting("Jane", "PHP");

// $someName = "Jane Smith";
// echo "<br> " . strlen($someName);

// Date object
// $today = date('d/M/Y');
// echo "<br> Today is $today";
// $time = date('h:i:sa');
// echo "<br> The time is $time";


// Conditionals

// $num = 145;
// if ($num < 100) {
//     echo "$num is less than 100";
// } else {
//     echo "$num is greater than 100";
// }


// function canIVote($age)
// {
//     if ($age >= 18) {
//         return "<br> YES";
//     } else {
//         return "<br> NO";
//     }
// }
// echo canIVote(25);
// echo canIVote(18);
// echo canIVote(15);

// function checkGrade($grade)
// {
//     if ($grade < 60) {
//         echo "You got an F";
//     } elseif ($grade < 70) {
//         echo "You got a D";
//     } elseif ($grade < 80) {
//         echo "You got a C";
//     } elseif ($grade < 90) {
//         echo "You got a B";
//     } else {
//         echo "You got an A";
//     }
// }

// checkGrade(50);


// function printGrade($letter_grade)
// {
//     if ($letter_grade == "A") {
//         echo "Great";
//     } elseif ($letter_grade == "B") {
//         echo "Good";
//     } elseif ($letter_grade == "C") {
//         echo "Fair";
//     } elseif ($letter_grade == "D") {
//         echo "Needs Improvement";
//     } elseif ($letter_grade == "F") {
//         echo "See me!";
//     } else {
//         echo "Invalid grade";
//     }
// }
// printGrade("C");

// function printGrade($letter_grade)
// {
//     switch ($letter_grade) {
//         case "A":
//             echo "Great";
//             break;
//         case "B":
//             echo "Good";
//             break;
//         case "C":
//             echo "Fair";
//             break;
//         default:
//             echo "Invalid grade";
//     }
// }

// printGrade("E");


// Ternary Operator
// condition ? expression1 (true) : expression2(false)
// function canIVote($age)
// {
//     if ($age >= 18) {
//         return "<br> YES";
//     } else {
//         return "<br> NO";
//     }
// }

function canIVote($age)
{
    return  $age >= 18 ? "YES" : "NO";
}
// echo '<br>' . canIVote(25);
// echo '<br>' . canIVote(18);
// echo '<br>' . canIVote(15);

// Elvis Operator - shorthand for ternary operator
// condition(if true) ?: expression2(false)
$firstVar = "test";
$secondVar = 3 > 4;
$thirdVar = null;

echo $firstVar ?: "The condition was false or null";
echo "<br>";
echo $secondVar ?: "The condition was false or null";
echo "<br>";
echo $thirdVar ?: "The condition was false or null";
echo "<br>";

// Null coalescing operator 
// condition(if exists and not null) ?? expression2 (if not)

echo $firstVar ?? "The condition doesnt exist or is null";
echo "<br>";
echo $secondVar ?? "The condition doesnt exist or is null";
echo "<br>";
echo $thirdVar ?? "The condition doesnt exist or is null";
echo "<br>";
