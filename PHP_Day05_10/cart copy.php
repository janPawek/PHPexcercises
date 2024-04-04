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
        $tax_eur = $bruttoTotal / 100 * $tax;
        $netto = $brutto - $tax_eur;

        $nettoTotal = $netto * $qtty;
        $bruttoTotal = $brutto * $qtty;

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

    <!-- bootstrap invoice-template with seperate css code -->
    <div class="container">
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-end">
                        <button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                    </div>
                    <hr>
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:;">
    												<img src="assets/images/logo-icon.png" width="80" alt="">
												</a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
									Arboshiki
									</a>
                                    </h2>
                                    <div>455 Foggy Heights, AZ 85004, US</div>
                                    <div>(123) 456-789</div>
                                    <div>company@example.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">INVOICE TO:</div>
                                    <h2 class="to">John Doe</h2>
                                    <div class="address">796 Silver Harbour, TX 79273, US</div>
                                    <div class="email"><a href="mailto:john@example.com">john@example.com</a>
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                    <div class="date">Date of Invoice: 01/10/2018</div>
                                    <div class="date">Due Date: 30/10/2018</div>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">DESCRIPTION</th>
                                        <th class="text-right">QTTY</th>
                                        <th class="text-right">NET €</th>
                                        <th class="text-right">TAX %</th>
                                        <th class="text-right">NET Total</th>
                                        <th class="text-right">TAX €</th>
                                        <th class="text-right">BRUTTO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="no"><img src='picture/{$value["image"]}' class='card-img-top' height='55%'  alt='...'></td>
                                        <td class="text-left">
                                            <h3>
                                                {$value["title"]}
                                                <br>
                                                {$value["publisher_name"]}
                                            </h3>
                                        </td>
                                        <td class="unit">{$value["qtty"]}</td>
                                        <td class="unit">{$value["netto"]} €</td>
                                        <td class="qty">{$value["tax_perc"]} %</td>
                                        <td class="total">$0.00</td>$nettoTotal = $netto * $qtty;
                                        <td class="qty">100</td>$tax_eur = $bruttoTotal / 100 * $tax;


                                        <td class="total">$0.00</td>$bruttoTotal = $brutto * $qtty;
                                    </tr>
                                    <tr>
                                        <td class="no">01</td>
                                        <td class="text-left">
                                            <h3>Website Design</h3>Creating a recognizable design solution based on the company's existing visual identity</td>
                                        <td class="unit">$40.00</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">30</td>
                                        <td class="total">$1,200.00</td>
                                        <td class="qty">30</td>
                                        <td class="total">$1,200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">02</td>
                                        <td class="text-left">
                                            <h3>Website Development</h3>Developing a Content Management System-based Website</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">80</td>
                                        <td class="total">$3,200.00</td>
                                        <td class="qty">80</td>
                                        <td class="total">$3,200.00</td>
                                        <td class="total">$3,200.00</td>
                                    </tr>
                                    <tr>
                                        <td class="no">03</td>
                                        <td class="text-left">
                                            <h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)</td>
                                        <td class="unit">$40.00</td>
                                        <td class="qty">20</td>
                                        <td class="total">$800.00</td>
                                        <td class="qty">20</td>
                                        <td class="total">$800.00</td>
                                        <td class="total">$800.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">SUBTOTAL</td>
                                        <td>$5,200.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">TAX 25%</td>
                                        <td>$1,300.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">GRAND TOTAL</td>
                                        <td>$6,500.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="thanks">Thank you!</div>
                            <div class="notices">
                                <div>NOTICE:</div>
                                <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                            </div>
                        </main>
                        <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>



<table width="100%" border="1" bgcolor="#ffffff">
    <tr>
        <td width="25%">25</td>
        <td width="50%">50</td>
        <td width="25%">25</td>
    </tr>
    <tr>
        <td width="50%">50</td>
        <td width="30%">30</td>
        <td width="20%">20</td>
    </tr>
</table>

<?php my_footer();?>
