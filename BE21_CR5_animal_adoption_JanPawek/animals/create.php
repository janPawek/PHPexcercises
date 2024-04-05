<?php

session_start();
    if(!isset($_SESSION["user"]) && !isset($_SESSION["adm"])){
        header("Location: ../index.php");
        exit;
    }
    if(isset($_SESSION["user"])){
        header("Location: ../home.php");
        exit;
    }

    require_once "../components/db_connect.php";

    $sql = "SELECT * from animals";
    $result = mysqli_query($connect, $sql);
    $rows= mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once '../components/boot.php'?>
        <title>PHP CRUD  |  Add Animal</title>
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <fieldset>
            <legend class='h2'>Add Animal</legend>
            <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <th>Name</th>
                        <td><input class='form-control' type="text" name="name"  placeholder="Animal Name" /></td>
                    </tr>  
                    <tr>
                        <th>Location</th>
                        <td><input class='form-control' type="text" name="location"  placeholder="Location" /></td>
                    </tr>  
                    <tr>
                        <th>Description</th>
                        <td><input class='form-control' type="text" name= "description" placeholder="Description" /></td>
                    </tr>
                    <tr>
                        <th>Character</th>
                        <td><input class='form-control' type="text" name="character"  placeholder="Character" /></td>
                    </tr> 
                    <tr>
                        <th>Breed</th>
                        <td><select name="breed" selected>
                        <option selected value="none">Please select one</option>
                                <option value="angora">Angora</option>
                                <option value="labrador">Labrador</option>
                                <option value="holsteiner">Holsteiner</option>
                                <option value="dwarf">Dwarf</option>
                                <option value="african_elephant">Elephant</option>
                                <option value="gold_fish">Fish</option>
                                <option value="country_chicken">Chicken</option>
                                <option value="hip_kangaroo">Kangaroo</option>
                        </select></td>
                    </tr> 
                    <tr>
                    <th>Category</th>
                        <td><select name="category" selected>
                        <option selected value="none">Please select one</option>
                                <option value="cat">Cat</option>
                                <option value="dog">Dog</option>
                                <option value="horse">Horse</option>
                                <option value="rabbit">Rabbit</option>
                                <option value="elephant">Elephant</option>
                                <option value="fish">Fish</option>
                                <option value="chicken">Chicken</option>
                                <option value="kangaroo">Kangaroo</option>
                        </select></td>
                    </tr> 
                    <tr>
                        <th>Age</th>
                        <td><input class='form-control' type="number" name="age"  placeholder="Age" /></td>
                    </tr> 
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture" /></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><select name="status" selected>
                            <option selected value="none">Please select one</option>
                                <option value="available">available</option>
                                <option value="adopted">adopted</option>
                        </select></td>
                    </tr>
                    <tr>
                    <th>Size</th>
                        <td><select name="size" selected>
                        <option selected value="none">Please select one</option>
                        <option value="x-small">extra small</option>
                                <option value="small">small</option>
                                <option value="medium">medium</option>
                                <option value="large">large</option>
                                <option value="x-large">extra large</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Vaccinated</th>
                        <td><select name="vaccinated" selected>
                            <option selected value="none">Please select one</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td><button class='btn btn-danger' type="submit">Insert Animal</button></td>
                        <td><a href="index.php"><button class='btn' style='background-color:#a58d8b' type="button">Home</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </body>
</html>