<?php
session_start();
require_once "db_connect.php";

$sql = "SELECT * FROM users WHERE id = {$_SESSION["user"]}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

require_once "header.php";
require_once "footer.php";

// +/- Button to add or delete 1 from quantity (qtty) start
if(isset($_GET["actionId"])){
   $actionId = ($_GET["actionId"]);
   $sql="UPDATE `cart` SET `qtty`= qtty +1 WHERE cart.id = $actionId";
   $result = mysqli_query($conn, $sql);
}

if(isset($_GET["minusId"])){
    $actionId = ($_GET["minusId"]);
    $sql="UPDATE `cart` SET `qtty`= qtty -1 WHERE cart.id = $minusId";
    $result = mysqli_query($conn, $sql);
 }
// +/- Button to add or delete 1 from quantity (qtty) start


// (isset($_GET["minusId"])){
//     $actionId = ($_GET["minusId"]);
//     $sql="UPDATE `cart` SET `qtty`= qtty -1 WHERE cart.id = $minusId";
//     $result = mysqli_query($conn, $sql);
//  }



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
$qttyTotal = 0;
$netTotal = 0;
$tax_eurTotal = 0;
$brutTotal = 0;


if(mysqli_num_rows($cartResult) == 0){
    $layout = "Cart is empty!";
} else {

    $rows = mysqli_fetch_all($cartResult, MYSQLI_ASSOC);
    foreach ($rows as $value) {
        $qtty = $value["qtty"];
        $brutto = $value["price"];
        $tax = $value["tax_perc"];
        $bruttoTotal = $brutto * $qtty;
        $tax_eur = $bruttoTotal / 100 * $tax;

        $netto = $brutto - $tax_eur;

        $nettoTotal = $netto * $qtty;

        // echo "<pre>";
        // var_dump($brutto, $netto, $tax_eur);
        // echo "</pre>";
        // exit;


        $total += $value["qtty"] * $value["price"];
        $qttyTotal += $value["qtty"];
        $netTotal += $nettoTotal;
        $tax_eurTotal += $tax_eur;
        $brutTotal += $bruttoTotal;

        $layout .= "
      <tr>
        <td width='15%'><img src='picture/{$value['image']}'></td>
        <td width='35%'>{$value['title']}<br>{$value['publisher_name']}<a class='btn btn-danger' href='delete_cart_element.php?id={$value["id"]}'>Delete</a>
        </td>
        <td width='5%'>
            <a href='/cart.php?actionId={$value['id']}' class='btn btn-success btn-sm m-2'>+</a>
            <br>{$value['qtty']}<br>
            <a href='/cart.php?minusId={$value['id']}' class='btn btn-danger btn-sm  m-2'>-</button></td>
        <td width='10%'>{$netto}</td>
        <td width='5%'>{$tax}</td>
        <td width='10%'>{($nettoTotal)}</td>
        <td width='10%'>{$tax_eur}</td>
        <td width='10%'>{$bruttoTotal}</td>
      </tr>
";
        }
       
    }



?>

<?php my_header();?>
<!-- <div class="col company-details"> -->
                                    <!-- <h2 class="name">
                                        <a target="_blank" href="javascript:;">
									Super-Mario & JM
									</a>
                                    </h2>
                                    <div>c/o CodeFactory Wien</div>
                                    <div>Kettenbrückengasse 23/2/12, 1050 Vienna, Austria</div>
                                    <div>(123) 456-789</div>
                                    <div>company@example.com</div>
                                </div>
                                <br>
                                <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">INVOICE TO:</div>
                                    <h2 class="to">{$value["first_name"]} {$value["last_name"]}</h2>
                                    <div class="address"></div>
                                    <div class="email"><a href="mailto:{$value['email']}">{$value["email"]}</a>
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                    <div class="date">Date of Invoice: 01/10/2018</div>
                                    <div class="date">Due Date: <?php $datum = date("d.m.Y") ?></div>
                                </div>
                            </div>
 -->





<div class="container">
    <div class="row row-cols-3">
    <div class='col company-details'>
        <h2 class='name'>
            <a target='_blank' href='javascript:;'>
        Super-Mario & JM
        </a>
        </h2>
        <div>c/o CodeFactory Wien</div>
        <div>Kettenbrückengasse 23/2/12, 1050 Vienna, Austria</div>
        <div>(123) 456-789</div>
        <div>company@example.com</div>
    </div>
    <br>
    <div class='row contacts'>
    <div class='col invoice-to'>
        <div class='text-gray-light'>INVOICE TO:</div>
        <h2 class='to'>{$value['first_name']} {$value['last_name']}</h2>
        <div class='address'></div>
        <div class='email'><a href='mailto:{$value['email']}'>{$value['email']}</a>
        </div>
    </div>
    <div class='col invoice-details'>
        <h1 class='invoice-id'>INVOICE 3-2-1</h1>
        <div class='date'>Date of Invoice: 01/10/2018</div>
        <div class='date'>Due Date: <?php $datum = date('d.m.Y',$timestamp) ?></div>
    </div>
</div>
<br>
        <table width='100%' border='1' bgcolor='#FFFFFF'>
      <?= $layout; ?>

      <tr border='8'>
        <td width='15%'><h3>TOTAL</h3></td>
        <td width='35%'></td>
        <td width='5%'><?= $qttyTotal; ?></td>
        <td width='10%'></td>
        <td width='5%'></td>
        <td width='10%'>{$netTotal}</td>
        <td width='10%'>{tax_eurTotal}</td>
        <td width='10%'>{$brutTotal}</td>
      </tr>
    </table>
    </div>

    <p> Total: <?= $total ?> €</p>

<!-- 
        <table width="100%" border="1" bgcolor="#FFFFFF">
      <tr>
        <td width="15%"><img src='picture/{$value["image"]}'></td>
        <td width="35%">{$value["title"]}<br>{$value["publisher_name"]}</td>
        <td width="5%">
            <a href="/cart.php?actionId={$value['id']}" class="btn btn-success btn-sm m-2">+</a>
            <br>{$value["qtty"]}<br>
            <a href="/cart.php?minusId={$value['id']}" class="btn btn-danger btn-sm  m-2">-</button></td>
        <td width="10%">{$brutto - $tax_eur}</td>
        <td width="5%">{$value["tax_perc"]}</td>
        <td width="10%">{$netto * $qtty}</td>
        <td width="10%">{$bruttoTotal / 100 * $tax}</td>
        <td width="10%">{$brutto * $qtty}</td>
      </tr>

      <tr border="8">
        <td width="15%"><h3>TOTAL</h3></td>
        <td width="35%"></td>
        <td width="5%">{$qttyTotal}</td>
        <td width="10%"></td>
        <td width="5%"></td>
        <td width="10%">{$netTotal}</td>
        <td width="10%">{tax_eurTotal}</td>
        <td width="10%">{$brutTotal}</td>
      </tr>
    </table> --> -->
<?php my_footer();?>
