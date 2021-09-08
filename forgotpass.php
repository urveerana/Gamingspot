<?php
session_start();


require_once "config.php";

$username=$n_pass = $c_pass = "";
$user_error=$n_pass_err = $c_pass_err = "";

function username(){
    global $username,$user_error;

    if(empty(trim($_POST["username"]))){
        $user_error = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
}

function useralreadypresent(){
    global $username,$mysqli,$user_error;

    $_SESSION["username"] = $username;
    $usr = trim($_POST["username"]);
    $sqlU = "SELECT id FROM users WHERE username = '$usr'";
    $check = mysqli_query($mysqli, $sqlU);
    $checkc = mysqli_num_rows($check);
    if($checkc != 1) {
        $user_error = "No User Found";
    }

}

function passwordconfirmpasswordcheck()
{
    global $n_pass,$c_pass,$c_pass_err,$n_pass_err;

    if (empty(trim($_POST["newpassword"]))) {
        $n_pass_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["newpassword"])) < 8  ) {

        $n_pass_err = "Password must have at least 8 characters.";

    } else {
        $n_pass = trim($_POST["newpassword"]);
    }

    if (empty(trim($_POST["cfpassword"]))) {
        $c_pass_err = "Please confirm the password.";
    } else {
        $c_pass = trim($_POST["cfpassword"]);
        if (empty($n_pass_err) && ($n_pass != $c_pass)) {
            $c_pass_err = "Password did not match.";
        }
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    username();

    useralreadypresent();

    passwordconfirmpasswordcheck();



    if (empty($n_pass_err) && empty($c_pass_err)) {
        $sql = "UPDATE users SET password = ? WHERE username = ? ";

        if ($stmt = $mysqli->prepare($sql)) {
            $passwd = password_hash($n_pass, PASSWORD_DEFAULT);
            $uname = $_SESSION["username"];
            $sql = "UPDATE users SET password = '$passwd' WHERE username = '$uname' ";
            if(mysqli_query($mysqli, $sql)) {
                session_destroy();
                header("location: login.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

            mysqli_stmt_close($stmt);
        }
    }


    $mysqli->close();

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
        .wrapper{ width: 460px; padding: 20px;
            border: 2px solid black ;
            margin: 50px 550px;
    font-weight: bold;
            background-color:wheat ;
        }
        input{
            width: auto;
        }
        label{
            text-align: center;
            padding: 8px;
        }
    </style>

</head>

<header>
    <nav>
        <img src="images/Logo.png" height="60px"/ >

        <h1 >
            Welcome To GamingSpot

            <br>
            Please Change Password To Continue
        </h1>
        <ul >
            <style>
                .rounded-pill:hover{
                    background-color: yellow;
                }

            </style>


            <li><a class="rounded-pill btn-block p-1 " href="home.php">Home</a></li>


        </ul>

    </nav>
</header>
<body>

<div class="wrapper">

    <h2 style="text-align: center">Opps Forgot Password</h2>
    <div style="text-align: center">
    </div>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group"  style="display: flex" >
            <label style="padding: 5px">Username </label>&nbsp;&nbsp;<input type="text" name="username" id="username" class="form-control" style="border: black solid;" placeholder="Username">
            <span class="text-danger"><?php echo $user_error; ?></span>
        </div><br>
        <div class="form-group" style="display: flex">
            <label style="padding: 5px">New Password</label><input  type="password" name="newpassword" id="newpassword" style="border: black solid"  class="form-control" placeholder="New Password">
            <span class="text-danger"><?php echo $n_pass_err; ?></span>
        </div>
        <br>
        <div class="form-group" style="display: flex">
            <label style="padding: 5px">Confirm <br>Password</label>&nbsp;&nbsp;&nbsp;<input type="password" name="cfpassword" id="cfpassword" style="border: black solid"  class="form-control" placeholder="Confirm Password">
            <span class="text-danger"><?php echo $c_pass_err; ?></span>
        </div>
        <br>
        <div class="form-group" style="" >&nbsp;<input type="submit" id="submit" class="btn btn-primary" style="background-color: blue;width: 25%;color: white;margin: 0px 90px" value="Submit">
            <input type="reset" id="cancel" class="btn btn-primary" style="background-color: red;width: 25%;color: white;margin: 0px -90px" value="Cancel">
        </div>

    </form>

    <br>
    <div class="link" style="margin: 0px 90px ; font: 16px sans-serif;" >&nbsp;<a href="login.php" style="color: black;font-weight: bold;">Click To Login</a></div>

</div>
</body>
<footer style="position: absolute">
    <a href="index.html" style="color: black">About Us</a>
    <a href="#" style="color: black">Addresses</a>
    <a href="login.html" style="color: black">Contact</a>
</footer>