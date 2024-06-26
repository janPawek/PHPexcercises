<?php
session_start();

if(isset($_SESSION["admin"])){
    header("Location: dashboard.php");
}

if(isset($_SESSION["user"])){
    header("Location: index.php");
}

require_once "db_connect.php";
require_once "file_upload.php";
require_once "header.php";
require_once "footer.php";

$error = false;
$fnameError = $first_name = $lnameError = $last_name = $emailError = $email = $passError = $dateError = $date_of_birth = "";


if (isset($_POST["register"])) {
    $first_name = cleanInput($_POST["first_name"]);
    $last_name = cleanInput($_POST["last_name"]);
    $email = cleanInput($_POST["email"]);
    $password = cleanInput($_POST["password"]);
    $date_of_birth = cleanInput($_POST["date_of_birth"]);
    $picture = fileUpload($_FILES["picture"]);

    # validation for first_name

    if (empty($first_name)) {
        $error = true;
        $fnameError = "You can't leave the first name empty";
    } elseif (strlen($first_name) < 3) {
        $error = true;
        $fnameError = "First name must be at least 3 chars";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $first_name)) {
        $error = true;
        $fnameError = "First name must contain only letters and spaces";
    }

    # validation for last_name

    if (empty($last_name)) {
        $error = true;
        $lnameError = "You can't leave the last name empty";
    } elseif (strlen($last_name) < 3) {
        $error = true;
        $lnameError = "Last name must be at least 3 chars";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $last_name)) {
        $error = true;
        $lnameError = "Last name must contain only letters and spaces";
    }

    # validation for email
    if (empty($email)) {
        $error = true;
        $emailError = "Email can't be empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "please, enter a valid email";
    } else {
        $sql = "SELECT email FROM `users` WHERE email = '{$email}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) != 0) {
            $error = true;
            $emailError = "Email already exists!";
        }
    }

    # validation for password
    if (empty($password)) {
        $error = true;
        $passError = "You can't leave the password empty";
    } elseif (strlen($password) < 6) {
        $error = true;
        $passError = "password must be at least 6 chars";
    }

    # validation for date

    if (empty($date_of_birth)) {
        $error = true;
        $dateError = "please select the date of birth";
    }

    if (!$error) {
        $password = hash("sha256", $password);

        $insertQuery = "INSERT INTO `users`( `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`) VALUES ('{$first_name}','{$last_name}', '{$password}', '{$date_of_birth}', '{$email}', '{$picture[0]}')";


        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            echo "Success";
            $first_name = $last_name = $date_of_birth = $email = "";
        } else {
            echo "Error";
        }
    }
}
?>

<?php my_header();?>

    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="first_name" placeholder="Type your first name" class="form-control" value="<?= $first_name ?>">
            <p class="text-danger"><?= $fnameError ?></p>
            <input type="text" name="last_name" placeholder="Type your last name" class="form-control" value="<?= $last_name ?>">
            <p class="text-danger"><?= $lnameError ?></p>
            <input type="email" name="email" placeholder="Type your email" class="form-control" value="<?= $email ?>">
            <p class="text-danger"><?= $emailError ?></p>
            <input type="password" name="password" placeholder="Type your password" class="form-control">
            <p class="text-danger"><?= $passError ?></p>
            <input type="date" name="date_of_birth" class="form-control" value="<?= $date_of_birth ?>">
            <p class="text-danger"><?= $dateError ?></p>

            <input type="file" name="picture" class="form-control">
            <input type="submit" name="register" value="Register now" class="btn btn-primary">
        </form>
    </div>

    <?php my_footer();?>
