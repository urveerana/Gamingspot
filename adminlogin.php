<?php
include_once ("config.php");



$error ='';
if (isset($_POST['login']) && !empty($_POST['email'])
    && !empty($_POST['pass'])) {

    if ($_POST['email'] == 'admin@admin.com' &&
        $_POST['pass'] == 'admin') {

        session_start();

        $_SESSION['valid'] = true;

        header("location: admin.php");
    }else {
        $error = '<b style="color: red">Invalid email or password</b>';
    }
}



?>

<html>
<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
        body#LoginForm{ background-image:url("https://wallpapercave.com/wp/wp2508415.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:100px;}

        .panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
        .panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
        .login-form .form-control {
            background: #f7f7f7 none repeat scroll 0 0;
            border: 1px solid #d4d4d4;
            border-radius: 4px;
            font-size: 14px;
            height: 50px;
            line-height: 50px;
        }
        .main-div {
            background: #ffffff none repeat scroll 0 0;
            border-radius: 2px;
            margin: 10px auto 30px;
            max-width: 38%;
            padding: 50px 70px 70px 71px;
        }

        .login-form .form-group {
            margin-bottom:10px;
        }
        .login-form{ text-align:center;}
        .forgot a {
            color: #777777;
            font-size: 14px;
            text-decoration: underline;
        }
        .login-form  .btn.btn-primary {
            background: lightgreen none repeat scroll 0 0;
            border-color: #f0ad4e;
            color: black;
            font-size: 14px;
            width: 100%;
            height: 50px;
            line-height: 50px;
            padding: 0;

        }
        .forgot {
            text-align: left; margin-bottom:30px;
        }

        .login-form .btn.btn-primary.reset {
            background: lightgreen none repeat scroll 0 0;
        }
        .back a {color: #444444; font-size: 13px;text-decoration: none;}



    </style>


</head>
<body id="LoginForm">
<div class="container ">
    <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>Welcome Admin</h2>
         </div><br>


            <form id="Login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <h5><?php echo $error; ?></h5><br>

                <div class="form-group">


                    <input type="email" class="form-control" id="email"  name="email" placeholder="Email Address" required>

                </div>

                <div class="form-group">

                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>

                </div>
                <div class="forgot">
                </div>
                <input type="submit" name="login" id="adminbtn" class="btn btn-primary rounded-pill btn-block" style="text-align: center" value="Login">

            </form>
        </div>
    </div></div></div>


</body>
</html>