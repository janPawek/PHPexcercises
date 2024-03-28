<?php

session_start();
if (!isset($_SESSION["admin"]) && !isset($_SESSION["user"])){
    header("Location: login.php");
}

if(isset($_SESSION["user"])){
    header("Location: index.php");
}

require_once "db_connect.php";
require_once "header.php";
require_once "footer.php";
require_once "functions.php";

$sql = "SELECT * FROM `users` WHERE id = {$_SESSION["admin"]}";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

?>

<?php my_header();?>

<!-- Alternate to put it in the <title>, i put to an <h4>  -->
<h4>Hello <?= $row["first_name"] ?></h4>

<nav class="navbar bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#";>
        <img src="pictures/<?= $row["picture"] ?>" width="30" height="24">    
        </a>   
        <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="update_profile.php?id=<?= $row["id"] ?>">
                Update Profile
                </a>
                </li>
                <a class="navbar-brand" href="index.php">Home</a>

                <a class="navbar-brand" href="update_profile.php">Update Profile</a>

        <a class="navbar-brand" href="logout.php?logout">Logout</a>
    </div>
</nav>

<?php my_footer();?>
