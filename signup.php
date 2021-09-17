<?php
include_once ("config.php");

$user = $email = $password = $confirm_password = "";
$user_err = $email_error = $password_error = $confirm_password_error = "";

function checkUser(){

    global $mysqli,$user,$user_err;

    if(empty(trim($_POST["user"]))){
        $user_err = "Enter Username";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["user"]))){
        $user_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";

        if($result = $mysqli->prepare($sql)){
            $result->bind_param("s", $parameter_username);

            $parameter_username = trim($_POST["user"]);

            if($result->execute()){
                $result->store_result();

                if($result->num_rows == 1){
                    $user_err = "User Already Exist";
                } else{
                    $user = trim($_POST["user"]);
                }
            } else{
                echo "Try Again";
            }

            $result->close();
        }
    }
}

function checkPassword(){

    global $password_error, $password, $confirm_password_error,$confirm_password;

    if(empty(trim($_POST["password"]))){
        $password_error = "Enter Password";
    } elseif(strlen(trim($_POST["password"])) < 8){
        $password_error = "Password is less than 8 value";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty(trim($_POST["cfpassword"]))){
        $confirm_password_error = "Confirm Password";
    } else{
        $confirm_password = trim($_POST["cfpassword"]);
        if(empty($password_error) && ($password != $confirm_password)){
            $confirm_password_error = "Password did not match.";
        }
    }
}

function checkEmail(){

    global $email,$email_error,$mysqli;

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email_error='Empty Email address';
    }
    $select = mysqli_query($mysqli, "SELECT `email` FROM `users` WHERE `email` = '".$_POST['email']."'");
    if(mysqli_num_rows($select)) {
        $email_error='Email Already Exists';
    }else{
        $input_email = trim($_POST["email"]);

        $email = $input_email;
    }
}


if($_SERVER["REQUEST_METHOD"] == "POST"){



    checkUser();

    checkEmail();

    checkPassword();

    if(empty($user_err) && empty($email_error) && empty($password_error) && empty($confirm_password_error)){

        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

        if($result = $mysqli->prepare($sql)){
            $result->bind_param("sss", $parameter_username, $parameter_email, $parameter_password);

            $parameter_username = $user;
            $parameter_email = $email;
            $parameter_password = password_hash($password, PASSWORD_DEFAULT);

            if($result->execute()){
                header("location: login.php");
            } else{
                echo "Try Again";
            }

            $result->close();
        }
    }

    $mysqli->close();
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
        .wrapper{ width: 460px; padding: 20px;
            border: 2px solid black ;
            margin: 50px 60px;
            background-color:#60c6eb ;
            font-weight: bold;
            text-align: center;
        }
    </style>

</head>

<header>
    <nav style="">
        <img src="images/Logo.png" height="60px"/ >

        <h1 >
            Welcome To GamingSpot

            <br>
            Please Register To Continue
        </h1>
        <ul >
            <style>
                .rounded-pill:hover{
                    background-color: white;
                    color: black;
                }

            </style>


            <li><a class="rounded-pill btn-block p-1 " href="home.php">Home</a></li>


        </ul>

    </nav>
</header>
<body>

<div class="wrapper">

    <h2 style="text-align: center">Sign Up</h2>
    <div style="text-align: center">
    </div>


    <form method="POST"
          action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group"  style="display: flex" >
            <label style="padding: 8px">Username </label>&nbsp;<input type="text" name="user" id="username" class="form-control" style="border: black solid" placeholder="Username">
            <span class="text-danger"><?php echo $user_err; ?></span>

        </div>
        <br>
        <div class="form-group" style="display: flex">
            <label style="padding: 8px">Email</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type="email" name="email" id="email" style="border: black solid;"  class="form-control" placeholder="Email">
            <span class="text-danger"><?php echo $email_error; ?></span>

        </div>
        <br>
        <div class="form-group" style="display: flex">
            <label style="padding: 8px">Password</label>&nbsp;&nbsp;<input  type="password" name="password" id="password" style="border: black solid"  class="form-control" placeholder="Password">
            <span class="text-danger"><?php echo $password_error; ?></span>

        </div><br>
        <div class="form-group" style="display: flex">
            <label style="padding: 5px">Confirm <br>Password</label>&nbsp;&nbsp;&nbsp;<input type="password" name="cfpassword" id="cfpassword" style="border: black solid"  class="form-control" placeholder="Confirm Password">
            <span class="text-danger"><?php echo $confirm_password_error; ?></span>

        </div>
        <br>

        <div class="form-group" style="" ><input type="submit" id="submit" class="btn btn-primary" style="background-color: green;width: 25%;color: white;margin: 0px -10px" value="Submit">
            <input type="reset" id="reset1" class="btn btn-primary" style="background-color: red;width: 25%;color: white;margin: 0px 10px" value="Reset">
        </div>

    </form>
    <br>
    <div class="form-group" style="" ><label style="padding: 8px"><b>Already Registered?</b></label><a href="login.php"><input type="submit" id="login"  class="btn btn-primary" style="background-color:margin: 0px 90px; darkblue;width: 25%;color: white" value="Login">
        </a>
    </div>
</div>
</body>
<footer style="position: absolute">

    <a href="aboutus.php" style="color: black">About Us</a>

    <a href="https://goo.gl/maps/AA5Na8QjBoht4SAFA" style="color: black">Addresses</a>
    <a href="#" style="color: black" onclick="return false;">Contact-+1433-222-2213</a>
</footer>