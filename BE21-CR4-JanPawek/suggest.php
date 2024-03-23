<?php
    // suggest.php

    require "db_connect.php";

    $search = $_GET['search'];

    $sql = "SELECT DISTINCT `title` FROM `inventory` WHERE `title` LIKE '%$search%' LIMIT 5";

    $result = mysqli_query($conn, $sql);

    $suggestions = array();

    while($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = $row['title'];
    }

    echo json_encode($suggestions);
?>
