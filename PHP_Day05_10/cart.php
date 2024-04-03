<?php
session_start();
require_once "db_connect.php";
$sql = "SELECT * FROM users WHERE id = {$_SESSION["user"]}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

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

$cart ="SELECT cart.*, inventory.title, inventory.price, inventory.image, inventory.publisher_name, inventory.tax_perc FROM cart JOIN inventory ON inventory.id = cart.fk_inventory WHERE fk_user = {$_SESSION["user"]}";

$cartResult = mysqli_query($conn, $cart);




$layout = "";
$total = 0;

if(mysqli_num_rows($cartResult) == 0){
    $layout = "Cart is empty!";
} else {

    $rows = mysqli_fetch_all($cartResult, MYSQLI_ASSOC);
    foreach ($rows as $value) {
        $qtty = $value["qtty"];
        $brutto = $value["price"];
        $tax = $value["tax_perc"];
        $tax_eur = $brutto / 100 * $tax;
        $netto = $brutto - $tax_eur;

        $netto_ges = $netto * $qtty;

        // echo "<pre>";
        // var_dump($brutto, $netto, $tax_eur);
        // echo "</pre>";
        // exit;


        $total += $value["qtty"] * $value["price"];
        if (isset($_SESSION["admin"])){
            $layout .= "<div class='card'>
            <div class='card-body'>
                <h3 class='card-title'>{$value["title"]}</h3>
                <p class='text-secondary'>Qantity: {$value["qtty"]}</p>
                <img src='picture/{$value["image"]}' class='card-img-top' height='55%'  alt='...'>
                <br><br>
                <p class='card-text'>{$value["price"]} €</p>
                <a class='btn btn-warning' href='publisher.php?publisher_name={$value["publisher_name"]}'>{$value["publisher_name"]}</a>
                <br><br>
                <button class='btn btn-danger' href='delete_cart_element.php?id={$value["id"]}'>Delete</button>

            </div>
        </div>";
        }
        else {$layout .= "<div class='card'>
        <div class='card-body'>
            <h3 class='card-title'>{$value["title"]}</h3>
            <p class='card-text'>{$value["price"]} €</p>
            <img src='picture/{$value["image"]}' class='card-img-top' height='55%' alt='...'>
            <br><br>
            <a class='btn btn-warning' href='publisher.php?publisher_name={$value["publisher_name"]}'>{$value["publisher_name"]}</a>
            <br><br>
            <a class='btn btn-danger' href='delete_cart_element.php?id={$value["id"]}'>Delete</a>

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
