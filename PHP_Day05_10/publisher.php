<?php
    session_start();


require_once "db_connect.php";


$sql = "SELECT * FROM users WHERE id = {$_SESSION["user"]}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

require_once "header.php";
require_once "footer.php";



$layout = "";

$publisher_name = $_GET["publisher_name"];
$sql = "SELECT * FROM `inventory` WHERE publisher_name = '{$publisher_name}'";
$result = mysqli_query($conn, $sql);
    // var_dump($result);
    // following line ($res) i modify at live-Coding at GMAIL-Document (Video) of Serri Tuesday April 2nd afternoon-Session
    if(mysqli_num_rows($result) == 0){
        $layout = "No result";
    } else {
            // following line ($res) i modify at live-Coding at GMAIL-Document (Video) of Serri Tuesday April 2nd afternoon-Session
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($rows as $value) {
            $buttonClass = (strpos($value["status_del"], "available") !== false) ? "btn-light" : "btn-danger";
            if (isset($_SESSION["admin"])){
                $layout .= "<div class='card'>
                <div class='card-body'>
                    <h3 class='card-title'>{$value["title"]}</h3>
                    <img src='picture/{$value["image"]}' class='card-img-top' height='55%' alt='...'>
                    <p class='card-text'>{$value["price"]} €</p>
                    <br><br>
                    <h5 class='card-text'>{$value["author_first_name"]} {$value["author_last_name"]}</h5>
                    <p class='card-text'>" . substr($value["long_des"], 0, 60) . "... more</p>
                    <a class='btn btn-warning' href='publisher.php?publisher_name={$value["publisher_name"]}'>{$value["publisher_name"]}</a>
                    <br><br>
                    <div class='card_over'>
                        <a href='details.php?id={$value["id"]}' class='btn btn-primary'>Details</a>
                        <button type='button' class='btn {$buttonClass}' disabled>{$value["status_del"]}</button>
                    </div>
                        <br>
                        <div class='card_over'>
                                <a href='delete.php?id={$value["id"]}' class='btn btn-danger'>Delete</a>
                                <a href='update.php?id={$value["id"]}' class='btn btn-dark'>Update</a>
                        </div>
                </div>
            </div>";
            }
            else {$layout .= "<div class='card'>
            <div class='card-body'>
                <h3 class='card-title'>{$value["title"]}</h3>
                <img src='picture/{$value["image"]}' class='card-img-top' height='55%' alt='...'>
                <br><br>
                <h5 class='card-text'>{$value["author_first_name"]} {$value["author_last_name"]}</h5>
                <p class='card-text'>" . substr($value["long_des"], 0, 60) . "... more</p>
                <a class='btn btn-warning' href='publisher.php?publisher_name={$value["publisher_name"]}'>{$value["publisher_name"]}</a>
                <p class='card-text'>{$value["price"]} €</p>
                <br><br>
                <div class='card_over'>
                    <a href='details.php?id={$value["id"]}' class='btn btn-primary'>Details</a>
                    <a href='cart.php?id={$value["id"]}' class='btn btn-primary'>Add to cart</a>

                    <button type='button' class='btn {$buttonClass}' disabled>{$value["status_del"]}</button>
                </div>
            </div>
        </div>"; 
        }
    }
    }
?>
<?php my_header();?>

<div class="container-fluid">
<div class='row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1'>
       <?= $layout ?>
</div>
<a class="btn btn-danger" href="index.php">Back</a>

    </div>

    <?php my_footer();?>
