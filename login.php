<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home1.php");
    exit;
}

require_once "config.php";

$name = $password = "";
$name_error = $password_error = $login_err = "";

function usernamecheck(){
    global $name,$name_error;
    if(empty(trim($_POST["username"]))){
        $name_error = "Enter username.";
    } else{
        $name = trim($_POST["username"]);
    }
}

function passwordcheck(){
    global $password,$password_error;
    if(empty(trim($_POST["password"]))){
        $password_error = "Enter password.";
    } else{
        $password = trim($_POST["password"]);
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    usernamecheck();

    passwordcheck();


    if(empty($name_error) && empty($password_error)){
        $sql = "SELECT id, username, password FROM users WHERE username = ?";

        if($result = mysqli_prepare($mysqli, $sql)){
            mysqli_stmt_bind_param($result, "s", $param_username);

            $param_username = $name;

            if(mysqli_stmt_execute($result)){

                mysqli_stmt_store_result($result);

                if(mysqli_stmt_num_rows($result) == 1){
                    mysqli_stmt_bind_result($result, $id, $name, $hashed_password);
                    if(mysqli_stmt_fetch($result)){
                        if(password_verify($password, $hashed_password)){
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $name;

                            header("location: home1.php");
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Try Again";
            }

            mysqli_stmt_close($result);
        }
    }

    mysqli_close($mysqli);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamingSpot</title>
    <link href="hf.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){

            $('.slider').bxSlider();
        });

    </script>
    <style>
        body {
            background-image: url("images/5.jpg");
            background-size: cover;
        }
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px;
            border: 2px solid black ;
            margin: 50px 1100px;
            background-color:lightblue ;

        }
    </style>

</head>

<header>
    <nav>
        <img src="images/Logo.png" height="60px"/ >

        <h1 >
            Welcome To GamingSpot

            <br>
            Please Login To Continue
        </h1>
        <ul >

            <style>
                .rounded-pill:hover{
                    background-color: white;
                    color: black;
                }

            </style>

            <li><a class="rounded-pill btn-block p-1" href="home.php">Home</a></li>


        </ul>

    </nav>
</header>
<body>

<div class="wrapper">

    <h2 style="text-align: center">Login Here</h2>
    <div style="text-align: center">
    </div>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="login" value="user">

        <div class="form-group"  style="display: flex" >
            <label style="padding: 8px">Username </label>&nbsp;<input type="text" name="username" id="loginusername" class="form-control" style="border: black solid" placeholder="Username">
            <span class="text-danger"><?php echo $name_error; ?></span>
            <span class="text-danger"><?php echo $login_err; ?></span>
        </div>
        <br>
        <div class="form-group" style="display: flex">
            <label style="padding: 8px">Password</label>&nbsp;<input type="password" name="password" id="loginpassword" style="border: black solid"  class="form-control" placeholder="Password">
            <span class="text-danger"><?php echo $password_error; ?></span>
            <span class="text-danger"><?php echo $login_err; ?></span>

        </div><br>
        <div class="form-group" style="" ><input type="submit" id="loginsubmit" class="btn btn-primary" style="background-color:blue;margin: 0px 90px;width: 25%;color: white" value="Login">
        </div>

    </form>
    <br>
    <div class="link" style="margin: 0px 90px ; font: 16px sans-serif;" ><a href="signup.php" style="color: black">Click To Register</a></div>
    <div class="link" style="margin: 0px 90px; font: 16px sans-serif;" ><a href="forgotpass.php" style="color: black">Forgot Password</a></div>
</div>



</body>
<footer style="position: absolute;">

    <a href="aboutus.php" style="color: black">About Us</a>

    <a href="https://goo.gl/maps/AA5Na8QjBoht4SAFA" style="color: black">Addresses</a>
    <a href="#" style="color: black" onclick="return false;">Contact-+1433-222-2213</a>
</footer>