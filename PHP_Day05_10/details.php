<?php
    require_once "db_connect.php";
    require_once "./file_upload.php";
    require_once "header.php";
    require_once "footer.php";
    require_once "functions.php";

    if(!isset($_SESSION["user"]) && !isset($_SESSION["admin"])) {
      header(("Location: login.php"));
  }

  if (isset($_SESSION["user"])) {
      header("Location: index.php");
  }

      $id = $_GET["id"];

      $sql = "SELECT * FROM `inventory` WHERE id = {$id}";
      
      $result = mysqli_query($conn, $sql);
      
      $row = mysqli_fetch_assoc($result);
      
      $layout = "<p><h4>{$row["title"]}</h4></p>
      <img src='picture/$row[image]' alt=''>
      <p><h5>{$row["author_first_name"]} {$row["author_last_name"]}</h5></p>
      <p>{$row["long_des"]}</p>
      <p>{$row["ISBN"]}</p> 
      <p>{$row["type"]}</p>
      <p>{$row["publisher_name"]}</p>
      <p>{$row["publisher_address"]}</p>
      <p>{$row["publish_date"]}</p>";
    ?>

<?php my_header();?>
  <br>    
    <?= $layout ?>
    
    <a class="btn btn-danger" href="index.php">Back</a>


    <?php my_footer();?>
