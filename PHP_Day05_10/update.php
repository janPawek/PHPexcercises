<?php

require_once "db_connect.php";
require_once "header.php";
require_once "footer.php";
require_once "./file_upload.php";
require_once "functions.php";

$id = $_GET["id"];

 $sql ="SELECT * FROM `inventory` WHERE id = {$id}";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);



if(isset($_POST["update"])){
    $title = $_POST["title"];
    $image = fileUpload($_FILES["image"]);
    $ISBN = $_POST["ISBN"];
    $short_des = $_POST["short_des"];
    $long_des = $_POST["long_des"];
    $type = $_POST["type"];
    $author_first_name = $_POST["author_first_name"];
    $author_last_name = $_POST["author_last_name"];
    $publisher_name = $_POST["publisher_name"];
    $publisher_address = $_POST["publisher_address"];
    $publish_date = $_POST["publish_date"];
    $status_del = $_POST["status_del"];

    if($_FILES["image"]["error"] == 4){
        $sqlUpdate = "UPDATE `inventory` SET `title`='{$title}',`ISBN`='{$ISBN}',`short_des`='{$short_des}',`long_des`='{$long_des}',`type`='{$type}',`author_first_name`='{$author_first_name}',`author_last_name`='{$author_last_name}',`publisher_name`='{$publisher_name}',`publisher_address`='{$publisher_address}',`publish_date`='{$publish_date}',`status_del`='{$status_del}' WHERE id = {$id}"; 
    }else{
        $sqlUpdate = "UPDATE `inventory` SET `title`='{$title}',`image`='{$image[0]}',`ISBN`='{$ISBN}',`short_des`='{$short_des}',`long_des`='{$long_des}',`type`='{$type}',`author_first_name`='{$author_first_name}',`author_last_name`='{$author_last_name}',`publisher_name`='{$publisher_name}',`publisher_address`='{$publisher_address}',`publish_date`='{$publish_date}',`status_del`='{$status_del}' WHERE id = {$id}"; 
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
    <img src="picture/<?php echo $row["image"]?>" alt="" width="150">
    </div>
    <form method="post" enctype="multipart/form-data">
        <input type="text" class="form-control" placeholder="title" name="title" value="<?php echo $row["title"] ?>">
        <input type="file" class="form-control" placeholder="insert url of image " name="image" value="<?= $row["image"] ?>">
        <input type="text" class="form-control" placeholder="ISBN" name="ISBN" value="<?= $row["ISBN"] ?>">
        <input type="text" class="form-control" placeholder="Short Description with max 100 characters" name="short_des" value="<?= $row["short_des"] ?>">
        <input type="text" class="form-control" placeholder="Long Description with max 700 characters" name="long_des" value="<?= $row["long_des"] ?>">
        <input type="text" class="form-control" placeholder="type: Fill in BOOK, DVD or CD" name="type" value="<?= $row["type"] ?>">
        <input type="text" class="form-control" placeholder="First Name of author" name="author_first_name" value="<?= $row["author_first_name"] ?>">
        <input type="text" class="form-control" placeholder="Last Name of author" name="author_last_name" value="<?= $row["author_last_name"] ?>">
        <input type="text" class="form-control" placeholder="Publisher name" name="publisher_name" value="<?= $row["publisher_name"] ?>">
        <input type="text" class="form-control" placeholder="Publisher address" name="publisher_address" value="<?= $row["publisher_address"] ?>">
        <input type="text" class="form-control" placeholder="Publish date (yyyy-mm-dd)" name="publish_date" value="<?= $row["publish_date"] ?>">
        <input type="text" class="form-control" placeholder="Fill in: available or reserved" name="status_del" value="<?= $row["status_del"] ?>">
        <input class="btn btn-primary" type="submit" value="Update Product" name="update">
    </form>
    <a class="btn btn-danger" href="index.php">Back</a>
</div>

<?php my_footer();?>
