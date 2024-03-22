<?php
    require "db_connect.php";
    
    if (isset($_POST["create"])) {
        $title = $_POST["title"];
        $image = $_POST["image"];
        $ISBN = $_POST["ISBN"];
        $short_des = $_POST["short_des"];
        $long_des = $_POST["long_des"];
        $type = $_POST["type"];
        $author_first_name = $_POST["author_first_name"];
        $author_last_name  = $_POST["author_last_name "];
        $publisher_name = $_POST["publisher_name"];
        $publisher_address = $_POST["publisher_address"];
        $publish_date = $_POST["publish_date"];
        $status_del = $_POST["status_del"];


        $sql = "INSERT INTO `inventory`(`title`, `image`, `ISBN`, `short_des`, `long_des`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status_del`) VALUES ('{$title}','{$image}','{$ISBN}','{$short_des}','{$long_des}','{$type}','{$author_first_name}','{$author_last_name}','{$publisher_name}','{$publisher_address}','{$publish_date}','{$status_del}')";

        // mysqli_query($conn, $sql);
        // header("Location: index.php");

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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <form method="post">
        <input type="text" class="form-control" placeholder="title" name="title">
        <input type="text" class="form-control" placeholder="insert url of image " name="image">
        <input type="text" class="form-control" placeholder="ISBN" name="ISBN">
        <input type="text" class="form-control" placeholder="Short Description with max 100 characters" name="short_des">
        <input type="text" class="form-control" placeholder="Long Description with max 700 characters" name="long_des">
        <input type="text" class="form-control" placeholder="type: Fill in BOOK, DVD or CD" name="type">
        <input type="text" class="form-control" placeholder="First Name of author" name="author_first_name">
        <input type="text" class="form-control" placeholder="Last Name of author" name="author_last_name">
        <input type="text" class="form-control" placeholder="Publisher name" name="publisher_name">
        <input type="text" class="form-control" placeholder="Publisher address" name="publisher_address">
        <input type="text" class="form-control" placeholder="Publish date (yyyy-mm-dd)" name="publish_date">
        <input type="text" class="form-control" placeholder="availabilty (Fill in): YES or NO" name="status_del">
        <input class="btn btn-primary" type="submit" value="Create Product" name="create">
    </form>
    <a class="btn btn-danger" href="index.php">Back</a>
</body>
</html>