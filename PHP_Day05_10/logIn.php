<?php
    session_start();


    if(isset($_SESSION["admin"])){
        header("Location: dashboard.php");
    }

    if(isset($_SESSION["user"])){
        header("Location: index.php");
    }

    require_once "db_connect.php";
    require_once "header.php";
    require_once "footer.php";
    require_once "functions.php";
    require_once "./file_upload.php";


    $error = false;
    $email = $emailError = $passError = "";

    if(isset($_POST["login"])){
        $email = cleanInput($_POST["email"]);
        $password = cleanInput($_POST["password"]);
    


    $error = false;



    if(empty($email)){
        $error = true;
        $emailError= "You can´t leave this input empty!";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $emailError = "Please type a valid e-mail address!";
    }

    if (empty($password)){
        $error = true;
        $passError = "You can´t leave this input empty!";
    }

    if(!$error){
        $password =hash("sha256", $password);

        $sql = "SELECT * FROM `users` WHERE email = '{$email}' and password = '{$password}'";
        $result = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($count == 1){
            if ($row["status"] == "adm"){
                $_SESSION["admin"] =$row["id"];
                header("Location: dashboard.php");
            }else{
                $_SESSION["user"] = $row["id"];
                header("Location: index.php");
            }
            }
        }
    }
    
?>

<?php my_header();?>


<div class="container">

<h1>Login page</h1>

<form method="post">
<input type="email" placeholder="Type your e-mail address!" class="form-control" name="email" value="<?=$email ?>">
<p class="text-danger"><?= $emailError ?></p>
<input type="password" placeholder="Type your password!" class="form-control" name="password"><p class="text-danger"><?php $passError ?></p>
<input type="submit" value="Login now"  class="btn btn-primary" name="login">
</form>

<?php my_footer();?>
