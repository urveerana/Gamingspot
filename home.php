<?php
session_start();


if (array_key_exists("loggedin", $_SESSION) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: home1.php");
    exit;
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

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
            integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
          integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>


    <script>
        $(document).ready(function () {

            $('.slider').bxSlider({
                auto: true,
                autoControls: false,
                stopAutoOnClick: true,
                pager: true,
            });

        });

    </script>

</head>

<header>
    <nav>
        <img src="images/Logo.png" height="60px"/ >

        <ul>
            <li style="padding-top: -5px">
                <div class="btn-group shadow-0" style="margin: 0px -260px">
                    <a href="product.php">
                        <input type="submit" id="pro" class="btn btn-light rounded-pill py-2 btn-block"
                               style="background-color: #1c7430;color:white;"
                               value="Products">
                    </a>
                </div>


            </li>
            <style>
                .rounded-pill:hover {
                    background-color: yellow;
                }

            </style>

            <?php
            $count = ("counter.txt");
            $visit = file($count);
            $visit[0]++;
            $fp = fopen($count, "w");
            fputs($fp, "$visit[0]");
            fclose($fp);
            ?>

            <li>
                <form style="margin: 15px;-800px " action="searchbutton1.php" method="post">
                    <div class="input-group">
                        <div class="form-outline">
                            <input type="text" name="search1" id="form1" class="form-control rounded-pill btn-block"
                                   placeholder="Search" style="width: 100%;margin: 0px"/>
                        </div>&nbsp;
                        <input type="submit" class="btn btn-warning rounded-pill btn-block" value="Search">
                    </div>
                </form>
            </li>
            <li><a href="home.php" class="rounded-pill btn-block p-1 ">Home</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
            <li><a href="login.php" class="rounded-pill btn-block  p-1 ">Log In</a></li>
            <li><a href="signup.php" class="rounded-pill btn-block  p-1 ">Sign Up</a></li>

        </ul>

    </nav>
</header>
<body>

<div>

    <h4 style="float:left;margin: 0px 250px;padding-top:8px;color: #cc3300;">Visited This Site</h4>

    <h2 style="background-color: #ff9900;color: #cc3300;" class="rounded-pill btn-block  p-1"><?php echo $visit[0]; ?> Times
    </h2>
    <img src="images/4.png" width="1200px" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;"/>

    <img src="images/3.png" width="1200px" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;"/>


    <div class="slider">
        <div><img src="images/bx1.png" width="1200px" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;"/></div>
        <div><img src="images/bx2.jpg" width="1200px" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;"/></div>
        <div><img src="images/bx3.png" width="1200px" style="display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;"/></div>
    </div>

    <div class="row" style="background-image: linear-gradient(lightblue,white)">

        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
            <!--        <img-->
            <!--                src="images/games/1.jpg"-->
            <!--                class="w-100 shadow-1-strong rounded mb-4"-->
            <!--                alt=""-->
            <!--        />-->

            <video controls autoplay height="320" width="420px" muted>
                <source src="PS5.mp4" type="video/mp4">
                <source src="PS5.mp4.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <h3 style="text-align: left">Ps5 Trailer</h3>

            <!--        <img-->
            <!--                src="images/games/2.jpg"-->
            <!--                class="w-100 shadow-1-strong rounded mb-4"-->
            <!--                alt=""-->
            <!--        />-->
            <br>
            <br>
            <br><br>
            <br><br><br><br>

            <video controls autoplay height="320" width="420px" muted>
                <source src="Xbox.mp4" type="video/mp4">
                <source src="Xbox.mp4.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <h3 style="text-align: left">Xbox Series S Trailer</h3>
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">
            <img
                    src="images/games/3.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt=""
            />

            <img
                    src="images/games/4.jpg"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt=""
            />
        </div>

        <div class="col-lg-4 mb-4 mb-lg-0">
            <!--        <img-->
            <!--                src="images/games/5.jpg" width="400px" height="450px"-->
            <!--                class="w-100 shadow-1-strong rounded mb-4"-->
            <!--                alt=""-->
            <!--        />-->
            <!---->

            <video controls autoplay height="320" width="420px" muted style="margin: 0px 50px;">
                <source src="ns.mp4" type="video/mp4">
                <source src="ns.mp4.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <h3 style="text-align: right">Nintendo Switch Trailer</h3>
            <br>
            <br>
            <br><br>
            <br><br><br><br>
            <video controls autoplay height="320" width="420px" muted style="margin: 0px 50px;">
                <source src="ps4.mp4" type="video/mp4">
                <source src="ps4.mp4.ogg" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <h3 style="text-align: right">Ps4 Trailer</h3>

            <!--        <img-->
            <!--                src="images/games/6.jpg" width="400px" height="450px"-->
            <!--                class="w-100 shadow-1-strong rounded mb-4"-->
            <!--                alt=""-->
            <!--        />-->
        </div>

    </div>

    <h1>
        * Our Most Selling Products *
    </h1>
    <br>


    <div class="card-group" style="width: 52rem; margin: auto">
        <div class="card" style="width: 22rem;">
            <img class="card-img-top" src="images/games/1.jpg" style="margin: auto;object-fit: contain"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">The Pathless</h5>
                <a href="login.php" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">Click for More
                    info</a>
            </div>
        </div>
        <div class="card" style="width: 22rem;">
            <img class="card-img-top" src="images/games/2.jpg" style="margin: auto;object-fit: contain"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Spider-Man</h5>
                <a href="login.php" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">Click for More
                    info</a>

            </div>
        </div>
        <div class="card" style="width: 22rem;">
            <img class="card-img-top" src="images/games/7.jfif" height="49%" style="margin: auto;object-fit: contain"
                 alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">God Of War</h5>
                <a href="login.php" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">Click for More
                    info</a>
            </div>
        </div>
        <div class="card" style="width: 22rem;">
            <img class="card-img-top" src="images/games/8.jfif" height="43%" style="margin: auto;object-fit: contain"
                 alt="Card image cap">
            <br>
            <div class="card-body">
                <h5 class="card-title">Call Of Duty</h5>
                <a href="login.php" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">Click for More
                    info</a>
            </div>
        </div>
    </div>

    <br>


    <div class="container" style=" border: 2px solid black ;
        background-color:lightblue ;
    margin: 90px 120px">

        <div class="row">
            <div class="col-sm-12 col-lg-12" style=" border: 2px solid black ;
         background-color:red ;
         color: white;
         margin: 90px 120px">
                <h1 class="h1">
                    Contact us <small>Feel free to Share</small></h1>
            </div>
            <div class="col-md-8">
                <div class="well well-sm">
                    <form action="feedback.php" method="post">
                        <div class="row">
                            <div class="col-md-6" style="border: 2px solid yellow;background-color: sandybrown">
                                <div class="form-group">
                                    <label for="name" style="color: green;font-weight: bold;font-size: 22px">
                                        Name</label>
                                    <input type="text" class="form-control" id="name" style="border: 3px solid black"
                                           placeholder="Enter name" name="name" required="required"/>
                                </div>
                                <div class="form-group">
                                    <label for="email" style="color: green;font-weight: bold;font-size: 22px">
                                        Email Address</label>
                                    <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                        <input type="email" class="form-control" id="email"
                                               style="border: 3px solid black" placeholder="Enter email" name="email"
                                               required="required"/></div>
                                </div>
                                <br>
                                <br>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm"
                                           style="border: 3px solid black" name="messagebtn" id="btnContactUs"
                                           value="Send Message">
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6" style="border: 2px solid yellow;background-color: sandybrown">
                                <div class="form-group">
                                    <label for="name" style="color: green;font-weight: bold;font-size: 22px">
                                        Message</label>
                                    <textarea name="message" id="message" class="form-control" rows="4" cols="25"
                                              style="border: 3px solid black" required="required"
                                              placeholder="Message"></textarea>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<footer style="position: fixed;
        padding: 10px 10px 0px 10px;
        bottom: 0;
        width: 100%;
        height: 40px;">

    <a href="aboutus.php" style="color: black;">About Us</a>

    <a href="https://goo.gl/maps/AA5Na8QjBoht4SAFA" style="color: black">Addresses</a>
    <a href="#" style="color: black" onclick="return false;">Contact-+1433-222-2213</a>
</footer>