<!DOCTYPE html>
<html>
<head>
    <title>Welcome Form</title>
    <style>
        .green {
            color: green;
        }
        .red {
            color: red;
        }
    </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>
<body>
<!-- Day 2 | Classwork
Exercise 1
Create a PHP script which will accept two parameters from the form (name and lastname). The user must insert name and lastname into the form to get the output: "Welcome Name Lastname!" otherwise you will output the message: please insert your name, or please insert your lastname. -->
<h1>Day 2 | Classwork Exercise 1</h1>
<?php
$name = $_POST['name'] ?? '';
$lastname = $_POST['lastname'] ?? '';

if(isset($_POST['submit'])) {
    if(empty($name)) {
        echo "Please insert your name.<br>";
    }
    if(empty($lastname)) {
        echo "Please insert your lastname.<br>";
    }
    if(!empty($name) && !empty($lastname)) {
        echo "Welcome $name $lastname!";
    }
}
?>

<form method="post" action="">
    Name: <input type="text" name="name"><br>
    Lastname: <input type="text" name="lastname"><br>
    <input type="submit" name="submit" value="Submit">
</form>

<!-- Day 2 | Classwork
Exercise 2
Create a function which takes two integer parameters - divide them and output the result on the screen.-->

<h1>Day 2 | Classwork Exercise 2</h1>

<?php
function divideAndOutput($numerator, $denominator) {
    if ($denominator != 0) {
        $result = $numerator / $denominator;
        echo "Result of division: $result";
    } else {
        echo "Error: Division by zero is not allowed.";
    }
}

// Example usage:
$numerator = 10;
$denominator = 2;
divideAndOutput($numerator, $denominator);
?>
<!-- 
Day 2 | Classwork
Exercise 3
Make a function that will accept 3 parameters, which are the grades from Math, Physics and English. then make the calculation and print them on the screen. Make sure that the variables are numbers.
E.g. If you put the following grades 3, 4, 5 the result should be:
Sum:12
Average: 4-->
<h1>Day 2 | Classwork Exercise 3</h1>
<?php
function calculateGrades($math, $physics, $english) {
    // Check if parameters are numbers
    if (!is_numeric($math) || !is_numeric($physics) || !is_numeric($english)) {
        echo "Error: All grades must be numeric.";
        return;
    }

    // Calculate sum
    $sum = $math + $physics + $english;

    // Calculate average
    $average = $sum / 3;

    // Output results
    echo "Sum: $sum <br>";
    echo "Average: $average";
}

// Example usage:
$mathGrade = 3;
$physicsGrade = 4;
$englishGrade = 5;
calculateGrades($mathGrade, $physicsGrade, $englishGrade);
?>

<!-- Day 2 | Classwork
Exercise 4
Create a function that calculates the area and volume of a box.
Formulas:
area = width x height
volume = width x height x depth
Pass three different numbers as arguments and get calculated results using the return statement.
You should get the following results:
The area of the box is: 14
The volume of the box is: 70-->
<h1>Day 2 | Classwork Exercise 4</h1>
<?php
function calculateBox($width, $height, $depth) {
    // Calculate area
    $area = $width * $height;
    
    // Calculate volume
    $volume = $width * $height * $depth;
    
    // Return results
    return array('area' => $area, 'volume' => $volume);
}

// Example usage:
$width = 7;
$height = 2;
$depth = 5;

$results = calculateBox($width, $height, $depth);
echo "The area of the box is: " . $results['area'] . "<br>";
echo "The volume of the box is: " . $results['volume'];
?>

<!-- Day 2 | Classwork
Exercise 5
Create a function that will return the number of minutes, in hours and minutes. The function should accept only one argument.
E.g. If we call the function and pass the number of minutes 200 we should get the message "200 minutes = 3 hour(s) and 20 minute(s -->

<h1>Day 2 | Classwork Exercise 5</h1>
<?php
function convertMinutesToHoursMinutes($totalMinutes) {
    // Calculate hours
    $hours = floor($totalMinutes / 60);

    // Calculate remaining minutes
    $remainingMinutes = $totalMinutes % 60;

    // Format the result
    $result = "$totalMinutes minutes = $hours hour(s) and $remainingMinutes minute(s).";

    return $result;
}

// Example usage:
$totalMinutes = 200;
echo convertMinutesToHoursMinutes($totalMinutes);
?>


<!-- Exercise 6

Create a function that will return the number of minutes, in hours and minutes. The function should accept only one argument.
E.g. If we call the function and pass the number of minutes 200 we should get the message "200 minutes = 3 hour(s) and 20 minute(s)."--> 

<h1>Day 2 | Classwork Exercise 6</h1>
<form method="post" action="">
        Firstname: <input type="text" name="firstname"><br>
        Lastname: <input type="text" name="lastname"><br>
        Age: <input type="text" name="age"><br>
        Hobbies: <input type="text" name="hobbies"><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <div>
    <?php
    if(isset($_POST['submit'])) {
        $firstname = $_POST['firstname'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $age = $_POST['age'] ?? '';
        $hobbies = $_POST['hobbies'] ?? '';

        // Display firstname
        if(strlen($firstname) > 5) {
            echo '<div class="green">' . $firstname . '</div>';
        } else {
            echo '<div class="red">' . $firstname . '</div>';
        }

        // Display lastname
        if(strlen($lastname) > 5) {
            echo '<div class="green">' . $lastname . '</div>';
        } else {
            echo '<div class="red">' . $lastname . '</div>';
        }

        // Display age
        echo 'Age: ' . $age . '<br>';

        // Display hobbies
        echo 'Hobbies: ' . $hobbies . '<br>';
    }
    ?>
    </div>

<!-- Advanced Exercise
Functions:
1- Create a function that can convert °F in °C and show the result on the screen.
2- You can play with the results creating conditionals and showing on the screen a different img and message depending on the temp:
From 0°C to 5°C: Very cold
From 6°C to 10°C: Cold
From 11°C to 15°C: Pleasant
From 16°C to 20°C: Warm
Above 21°C: Hot
Use Bootstrap to show yours results on the screen. -->
<h1>Day 2 | Advanced Exercise </h1>
<?php
function convertFahrenheitToCelsius($fahrenheit) {
    $celsius = ($fahrenheit - 32) * (5/9);
    return $celsius;
}

// Example usage
$fahrenheit = 80; // You can change this value as needed

$celsius = convertFahrenheitToCelsius($fahrenheit);

$message = "";
$image = "";

if ($celsius >= 0 && $celsius <= 5) {
    $message = "Very cold";
    $image = "snowflake.png";
} elseif ($celsius >= 6 && $celsius <= 10) {
    $message = "Cold";
    $image = "cold.png";
} elseif ($celsius >= 11 && $celsius <= 15) {
    $message = "Pleasant";
    $image = "pleasant.png";
} elseif ($celsius >= 16 && $celsius <= 20) {
    $message = "Warm";
    $image = "warm.png";
} else {
    $message = "Hot";
    $image = "hot.png";
}
?>
<div class="container">
        <h1>Temperature Conversion</h1>
        <p>Fahrenheit: <?php echo $fahrenheit; ?></p>
        <p>Celsius: <?php echo $celsius; ?></p>
        <p>Condition: <?php echo $message; ?></p>
        <img src="<?php echo $image; ?>" alt="<?php echo $message; ?>" class="img-fluid">
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
