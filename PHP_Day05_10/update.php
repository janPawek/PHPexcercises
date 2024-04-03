<?php
require_once "db_connect.php";


session_start();
$sql = "SELECT * FROM users WHERE id = {$_SESSION["admin"]}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


require_once "header.php";
require_once "footer.php";
require_once "./file_upload.php";
require_once "functions.php";

    $layout = "";



if(!isset($_SESSION["user"]) && !isset($_SESSION["admin"])) {
    header(("Location: login.php"));
}

if (isset($_SESSION["user"])) {
    header("Location: index.php");
}

$id = $_GET["id"];

 $sql ="SELECT * FROM `inventory` WHERE id = {$id}";

$result = mysqli_query($conn, $sql);

$rowInventory = mysqli_fetch_assoc($result);



if(isset($_POST["update"])){
    $title = $_POST["title"];
    $image = fileUpload($_FILES["image"], "product");
    $ISBN = $_POST["ISBN"];
    $short_des = $_POST["short_des"];
    $long_des = $_POST["long_des"];
    $type = $_POST["type"];
    $author_first_name = $_POST["author_first_name"];
    $author_last_name = $_POST["author_last_name"];
    $publisher_name = $_POST["publisher_name"];
    $publisher_address = $_POST["publisher_address"];
    $publish_date = $_POST["publish_date"];
    $price = $_POST["price"];
    $tax_perc = $_POST["tax_perc"];
    $status_del = $_POST["status_del"];

    if($_FILES["image"]["error"] == 4){
        $sqlUpdate = "UPDATE `inventory` SET `title`='{$title}',`ISBN`='{$ISBN}',`short_des`='{$short_des}',`long_des`='{$long_des}',`type`='{$type}',`author_first_name`='{$author_first_name}',`author_last_name`='{$author_last_name}',`publisher_name`='{$publisher_name}',`publisher_address`='{$publisher_address}',`publish_date`='{$publish_date}',`status_del`='{$status_del}', `tax_perc`='{$tax_per}', `price`='{$price}' WHERE id = {$id}"; 
    }else{
        if($rowInventory["image"] !== "default_product.jpg"){
            unlink("./picture/($rowInventory[image]");
        }
        $sqlUpdate = "UPDATE `inventory` SET `title`='{$title}',`image`='{$image[0]}',`ISBN`='{$ISBN}',`short_des`='{$short_des}',`long_des`='{$long_des}',`type`='{$type}',`author_first_name`='{$author_first_name}',`author_last_name`='{$author_last_name}',`publisher_name`='{$publisher_name}',`publisher_address`='{$publisher_address}',`publish_date`='{$publish_date}',`status_del`='{$status_del}', `price`='{$price}', `tax_perc`='{$tax_per}' WHERE id = {$id}"; 
    }
    $result = mysqli_query($conn, $sqlUpdate);

    if($result){
        echo "<div class='alert alert-success' role='alert'>
                Product has been updated!, {$image[1]}
              </div>";
        header("refresh: 3; url= index.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                Something went wrong, please try again later!
              </div>";
    }

}
?>

<?php my_header();?>


<div class="container">
    <div class="text-center">
    <img src="picture/<?php echo $rowInventory["image"]?>" alt="" width="150">
    </div>
    <form method="post" enctype="multipart/form-data">
        <input type="text" class="form-control" placeholder="title" name="title" value="<?php echo $rowInventory["title"] ?>">
        <input type="file" class="form-control" placeholder="insert url of image " name="image" value="<?= $rowInventory["image"] ?>">
        <input type="text" class="form-control" placeholder="ISBN" name="ISBN" value="<?= $rowInventory["ISBN"] ?>">
        <input type="text" class="form-control" placeholder="Short Description with max 100 characters" name="short_des" value="<?= $rowInventory["short_des"] ?>">
        <input type="text" class="form-control" placeholder="Long Description with max 700 characters" name="long_des" value="<?= $rowInventory["long_des"] ?>">
        <input type="text" class="form-control" placeholder="type: Fill in BOOK, DVD or CD" name="type" value="<?= $rowInventory["type"] ?>">
        <input type="text" class="form-control" placeholder="First Name of author" name="author_first_name" value="<?= $rowInventory["author_first_name"] ?>">
        <input type="text" class="form-control" placeholder="Last Name of author" name="author_last_name" value="<?= $rowInventory["author_last_name"] ?>">
        <input type="text" class="form-control" placeholder="Publisher name" name="publisher_name" value="<?= $rowInventory["publisher_name"] ?>">
        <input type="text" class="form-control" placeholder="Publisher address" name="publisher_address" value="<?= $rowInventory["publisher_address"] ?>">
        <input type="text" class="form-control" placeholder="Publish date (yyyy-mm-dd)" name="publish_date" value="<?= $rowInventory["publish_date"] ?>">
        <input type="text" class="form-control" placeholder="Price in €" name="price" value="<?= $rowInventory["price"] ?>">
        <input type="text" class="form-control" placeholder="Taxes in %" name="tax_perc" value="<?= $rowInventory["tax_perc"] ?>">
        <input type="text" class="form-control" placeholder="Fill in: available or reserved" name="status_del" value="<?= $rowInventory["status_del"] ?>">
        <input class="btn btn-primary" type="submit" value="Update Product" name="update">
    </form>
    <a class="btn btn-danger" href="index.php">Back</a>
</div>

<?php my_footer();?>
