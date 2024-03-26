<?php
    require_once "db_connect.php";
    require_once "header.php";
    require_once "footer.php";

    // Initialisiere die Suchanfrage
    $search = "";
    if(isset($_GET['search'])) {
        $search = $_GET['search'];
            // Erstelle die SQL-Anfrage unter Berücksichtigung der Suchanfrage
    $sql = "SELECT * FROM `inventory` WHERE `title` LIKE '%$search%' OR `author_first_name` LIKE '%$search%' OR `author_last_name` LIKE '%$search%' OR `ISBN` LIKE '%$search%' OR `short_des` LIKE '%$search%' OR `long_des` LIKE '%$search%' OR `type` LIKE '%$search%'  OR `publisher_name` LIKE '%$search%' OR `publisher_address` LIKE '%$search%' OR `status_del` LIKE '%$search%' OR `publish_date` LIKE '%$search%'";

    $result = mysqli_query($conn, $sql);

    $layout = "";

    if(mysqli_num_rows($result) == 0){
        $layout = "No result";
    } else {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($rows as $value) {
            $buttonClass = (strpos($value["status_del"], "available") !== false) ? "btn-light" : "btn-danger";
            $layout .= "<div class='card'>
                            <div class='card-body'>
                                <h3 class='card-title'>{$value["title"]}</h3>
                                <img src='picture/{$value["image"]}' class='card-img-top' height='55%' alt='...'>
                                <br><br>
                                <h5 class='card-text'>{$value["author_first_name"]} {$value["author_last_name"]}</h5>
                                <p class='card-text'>" . substr($value["long_des"], 0, 45) . "... more</p>
                                <a class='btn btn-warning' href='publisher.php?publisher_name={$value["publisher_name"]}'>{$value["publisher_name"]}</a>
                                <br><br>
                                <div class='card_over'>
                                    <a href='details.php?id={$value["id"]}' class='btn btn-primary'>Details</a>
                                    <button type='button' class='btn {$buttonClass}' disabled>{$value["status_del"]}</button>
                                </div>
                            </div>
                        </div>";
        }
    }
    } else {
      $id = $_GET["id"];

      $sql = "SELECT * FROM `inventory` WHERE id = {$id}";
      
      $result = mysqli_query($conn, $sql);
      
      $row = mysqli_fetch_assoc($result);
      
      $layout = "<p><h4>{$row["title"]}</h4></p>
      <img src='picture/<php= $row["image"] ?>' alt=''>
      <p><h5>{$row["author_first_name"]} {$row["author_last_name"]}</h5></p>
      <p>{$row["long_des"]}</p>
      <p>{$row["ISBN"]}</p> 
      <p>{$row["type"]}</p>
      <p>{$row["publisher_name"]}</p>
      <p>{$row["publisher_address"]}</p>
      <p>{$row["publish_date"]}</p>";
      
    }
?>

<?php my_header();?>


    <br>
    <?php 
      if(isset($_GET['search'])){
    ?>
<!-- Ergebnisse anzeigen -->
<!-- <div class='row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1'>
  <?= $layout ?>
</div>
    <?php }else{ ?>
      <div class="container">
              <?= $layout ?>
      </div>

      <?php } ?>
 -->

    <a class="btn btn-danger" href="index.php">Back</a>


    <?php my_footer();?>
