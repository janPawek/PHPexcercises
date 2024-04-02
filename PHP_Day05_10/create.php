<?php
    require_once "db_connect.php";
    require_once "./file_upload.php";
    require_once "header.php";
    require_once "footer.php";
    require_once "functions.php";
    session_start();
    if(!isset($_SESSION["user"]) && !isset($_SESSION["admin"])) {
      header(("Location: login.php"));
  }

  if (isset($_SESSION["user"])) {
      header("Location: index.php");
  }
    $sql = "SELECT * FROM users WHERE id = {$_SESSION["admin"]}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
        $layout = "";
    
        if(isset($_POST["create"])){
        $title = $_POST["title"];
        // $image = $_POST["image"];
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
        $price = $_POST["price"];
        $status_del = $_POST["status_del"];


       $sql = "INSERT INTO `inventory`(`title`, `image`, `ISBN`, `short_des`, `long_des`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status_del`) VALUES ('{$title}','{$image[0]}','{$ISBN}','{$short_des}','{$long_des}','{$type}','{$author_first_name}','{$author_last_name}','{$publisher_name}','{$publisher_address}','{$publish_date}','{$status_del}')";

       if(mysqli_query($conn, $sql)){
                echo "<div class='alert alert-success' role='alert'>
                New product has been created!
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
    <form method="post" enctype="multipart/form-data">
        <input type="text" class="form-control" placeholder="title" name="title">
        <input type="file" class="form-control" placeholder="insert url of image " name="image">
        <input type="text" class="form-control" placeholder="ISBN" name="ISBN">
        <input type="text" class="form-control" placeholder="Short Description with max 100 characters" name="short_des">
        <input type="text" class="form-control" placeholder="Long Description with max 700 characters" name="long_des">
        <input type="text" class="form-control" placeholder="type: Fill in BOOK, DVD or CD" name="type">
        <input type="text" class="form-control" placeholder="First Name of author" name="author_first_name">
        <input type="text" class="form-control" placeholder="Last Name of author" name="author_last_name">
        <input type="text" class="form-control" placeholder="Publisher name" name="publisher_name">
        <input type="text" class="form-control" placeholder="Publisher address" name="publisher_address">
        <input type="text" class="form-control" placeholder="Publish date (yyyy-mm-dd)" name="publish_date">
        <input type="text" class="form-control" placeholder="Fill in: available or reserved" name="status_del">
        <input class="btn btn-primary" type="submit" value="Create Product" name="create">
    </form>
    <a class="btn btn-danger" href="index.php">Back</a>
  </div>

  <?php my_footer();?>
