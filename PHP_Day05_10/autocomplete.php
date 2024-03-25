<?php
require "db_connect.php";

$search = $_POST['search'];

$sql = "SELECT DISTINCT title FROM inventory WHERE title LIKE '%$search%' OR author_first_name LIKE '%$search%' OR author_last_name LIKE '%$search%' OR ISBN LIKE '%$search%' OR short_des LIKE '%$search%' OR long_des LIKE '%$search%' OR type LIKE '%$search%'  OR publisher_name LIKE '%$search%' OR publisher_address LIKE '%$search%' OR status_del LIKE '%$search%' OR publish_date LIKE '%$search%'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<div class='autocomplete-item'>" . $row['title'] . "</div>";
    }
} else {
    echo "<div class='autocomplete-item'>No result</div>";
}
?>
