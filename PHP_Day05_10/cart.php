<?php
session_start();
require_once "db_connect.php";
require_once "header.php";
require_once "footer.php";

if (isset($_GET["id"])){
    $user_id = $_SESSION["user"];
$inventory_id = $_GET["id"];
$qtty = 1;

$checkIFExists = "SELECT * FROM `cart` WHERE fk_inventory = {$inventory_id} AND fk_user = {$user_id}";

$checkIFExistsResult = mysqli_query($conn, $checkIFExists);

if(mysqli_num_rows($checkIFExistsResult) == 0) {
    $sql = "INSERT INTO `cart`(`fk_user`, `fk_inventory`, `qtty`) VALUES ($user_id, $inventory_id, $qtty)";
}else {
    $sql = "UPDATE `cart` SET `qtty` = qtty + 1 WHERE fk_user = {$user_id} AND fk_inventory = {$inventory_id}";
}

    $result = mysqli_query($conn, $sql);

    header("Location: cart.php");
}

$cart ="SELECT cart.*, inventory.title, inventory.price, inventory.image FROM cart JOIN inventory ON inventory.id = cart.fk_inventory WHERE fk_user = {$_SESSION["user"]}";

$cartResult = mysqli_query($conn, $cart);

// modify code for cart and copied it from index.html (home.html), maybe it will not works, that is the reason for the index copy.php. the original (working) code


// following line ($res) i modify at live-Coding at GMAIL-Document (Video) of Serri Tuesday April 2nd afternoon-Session

$layout = "";
$total = 0;

if(mysqli_num_rows($cartResult) == 0){
    $layout = "Cart is empty!";
} else {
        // following line ($res) i modify at live-Coding at GMAIL-Document (Video) of Serri Tuesday April 2nd afternoon-Session
    $rows = mysqli_fetch_all($cartResult, MYSQLI_ASSOC);
    foreach ($rows as $value) {
        $total += $value["qtty"] * $value["price"];
        $buttonClass = (strpos($value["status_del"], "available") !== false) ? "btn-light" : "btn-danger";
        if (isset($_SESSION["admin"])){
            $layout .= "<div class='card'>
            <div class='card-body'>
                <h3 class='card-title'>{$value["title"]}</h3>
                <p class='text-secondary'>Qantity: {$value["qtty"]}</p>
                <img src='picture/{$value["image"]}' class='card-img-top' height='55%' alt='...'>
                <br><br>
                <p class='card-text'>{$value["price"]}</p>
                <a class='btn btn-warning' href='publisher.php?publisher_name={$value["publisher_name"]}'>{$value["publisher_name"]}</a>
                <br><br>
            </div>
        </div>";
        }
        else {$layout .= "<div class='card'>
        <div class='card-body'>
            <h3 class='card-title'>{$value["title"]}</h3>
            <p class='card-text'>{$value["price"]}</p>
            <img src='picture/{$value["image"]}' class='card-img-top' height='55%' alt='...'>
            <br><br>
            <a class='btn btn-warning' href='publisher.php?publisher_name={$value["publisher_name"]}'>{$value["publisher_name"]}</a>
            <br><br>
        </div>
    </div>"; 
    }
}
}
?>

<?php my_header();?>

<div class="container">
    <div class="row row-cols-3">
    <?= $layout   ?>
    </div>

    <p> Total: <?= $total ?> €</p>
</div>

<?php my_footer();?>
