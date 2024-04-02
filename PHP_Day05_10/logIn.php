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


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group mb-0">
          <div class="card p-4">
            <div class="card-body">
              <h1>Login</h1>
              <p class="text-muted">Sign In to your account</p>
              <div class="input-group mb-3">
                <span class="input-group-addon"><i class="fa fa-user"></i>  </span>
                <form method="post">
                <input type="email" placeholder="Type your e-mail address!" class="form-control"  size="40" name="email" value="<?=$email ?>">
                <p class="text-danger"><?= $emailError ?></p>
                <!-- <input type="text" class="form-control" placeholder="Username"> -->
              </div>
              <div class="input-group mb-4">
                <span class="input-group-addon"><i class="fa fa-lock"></i>  </span>
                <input type="password" placeholder="Type your password!" class="form-control"  size="40" name="password"><p class="text-danger"><?php $passError ?></p>
                <!-- <input type="password" class="form-control" placeholder="Password"> -->
              </div>
              <div class="row">
                <div class="col-6">
                <input type="submit" value="Login now"  class="btn btn-primary" name="login">
                </form>            
                <!-- <button type="button" class="btn btn-primary px-4">Login</button> -->
                </div>
                 </div>
            </div>
          </div>
          <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <h2>Sign up</h2>
                <p>No Account Yet? Register Here Welcome to our website! If you don’t have an account, you can easily create one by registering below. Fill in the required details, and you’ll be all set to explore our platform.</p>
                <a class="btn btn-primary active mt-3" href="register.php">Register Now!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php my_footer();?>
