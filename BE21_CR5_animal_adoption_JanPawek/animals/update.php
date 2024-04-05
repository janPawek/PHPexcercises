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
require_once '../components/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM animals WHERE id = {$id}";
    
    $result = mysqli_query($connect, $sql);
    

    $status ="";
    $size ="";
    $vaccinated ="";
    $breed ="";
    $category ="";

    

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $location = $data['location'];
        $description = $data['description'];
        $character = $data['character'];
        $breed = $data['breed'];
        $age = $data['age'];
        $vaccinated = $data['vaccinated'];
        $category = $data['category'];
        $picture = $data['picture'];
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        
            if($data["status"]) {
         
                $status .= "<option selected value='".$data["status"]."'>".$data["status"]."</option>";
            }

            if($data["size"]) {
         
                $size .= "<option selected value='".$data["size"]."'>".$data["size"]."</option>";
            }
        
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Animal</title>
        <?php require_once '../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
        
        <fieldset>
            <legend class='h2'>Update request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
            <form action="actions/a_update.php"  method="post" enctype="multipart/form-data">
                <table class="table">
                <tr>
                        <th>Name</th>
                        <td><input class='form-control' type="text" name="name"  placeholder="Animal Name" value="<?=$name ?>"></td>
                    </tr>  
                    <tr>
                        <th>Location</th>
                        <td><input class='form-control' type="text" name="location" placeholder="Location" value="<?=$location?>"></td>
                    </tr> 
                    <tr>
                        <th>Description</th>
                        <td><input class='form-control' type="text" name="description" placeholder="Description" value="<?=$description ?>"></td>
                    </tr>
                    <tr>
                        <th>Character</th>
                        <td><input class='form-control' type="text" name="character"  placeholder="Character" 
                        value="<?=$character ?>"/></td>
                    </tr> 
                    <tr>
                        <th>Breed</th>
                        <td><select name="breed" selected value="<?=$breed ?>">
                        <!-- <option selected value="none">Please select one</option> -->
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
                        <td><select name="category" selected value="<?=$category ?>">
                        <!-- <option selected value="none">Please select one</option> -->
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
                        <td><input class='form-control' type="number" name="age"  placeholder="Age" 
                        value="<?=$age ?>"></td>
                    </tr> 
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture" 
                        value="<?=$picture ?>"></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><select name="status">
                            <?= $status ?>
                            <?php if($data["status"] == "available"){
                                echo "<option value='adopted'>adopted</option>";
                            } else {
                                echo  "<option value='available'>available</option>";
                            }
                             ?>
                        </select></td>
                    </tr>
                    <th>Size</th>
                        <td><select name="size" selected value="<?=$breed ?>">
                        <!-- <option selected value="none">Please select one</option> -->
                        <option value="x-small">extra small</option>
                                <option value="small">small</option>
                                <option value="medium">medium</option>
                                <option value="large">large</option>
                                <option value="x-large">extra large</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Vaccinated</th>
                        <td><select name="vaccinated" selected value="<?=$breed ?>">
                            <!-- <option selected value="none">Please select one</option> -->
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                        </select></td>
                    </tr>
                    <tr>
                        <input type= "hidden" name= "id" value= "<?php echo $data['id'] ?>" >
                        
                        <input type= "hidden" name= "picture" value= "<?php echo $data['picture'] ?>" >
                        <td><button class="btn btn-danger" type= "submit">Save Changes</button></td>
                        <td><a href= "index.php"><button class="btn" style="background-color:#a58d8b" type="button">Back</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        
    </body>
</html>