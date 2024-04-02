<?php
session_start();

    require_once "db_connect.php";
    require_once "./file_upload.php";
    
    require_once "footer.php";
    require_once "functions.php";


    $session = "";
    if(isset($_SESSION["user"])){
        $session = $_SESSION["user"];
    }elseif(isset($_SESSION["admin"])){
      $session = $_SESSION["admin"];
    }

     $sql = "SELECT * FROM users WHERE id = {$session}";
    
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    require_once "header.php";
        $layout = "";
        
    if(!isset($_SESSION["user"]) && !isset($_SESSION["admin"])) {
      header(("Location: login.php"));
  }



      $id = $_GET["id"];

      $sql = "SELECT * FROM `inventory` WHERE id = {$id}";
      
      $result = mysqli_query($conn, $sql);
      
      $row2 = mysqli_fetch_assoc($result);
      
      $layout = "<p><h4>{$row2["title"]}</h4></p>
      <img src='picture/$row2[image]' alt=''>
      <p><h5>{$row2["author_first_name"]} {$row2["author_last_name"]}</h5></p>
      <p>{$row2["long_des"]}</p>
      <p>{$row2["ISBN"]}</p> 
      <p>{$row2["type"]}</p>
      <p>{$row2["publisher_name"]}</p>
      <p>{$row2["publisher_address"]}</p>
      <p>{$row2["publish_date"]}</p>
      <p>{$row2["price"]}</p>";

    
    ?>

<?php my_header();?>
  <br>    
    <?= $layout ?>
    
    <a class="btn btn-danger" href="index.php">Back</a>


    <?php my_footer();?>
