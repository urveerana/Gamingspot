<?php
session_start();

if( array_key_exists("loggedin", $_SESSION) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo '';
} else {
    header("location: home.php");
    exit;
}
$user = htmlspecialchars($_SESSION["username"]);


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>




    <script>
        $(document).ready(function(){

            $('.slider').bxSlider({
                auto: true,
                autoControls: false,
                stopAutoOnClick: true,
                pager: true,
            });

        });

    </script>

</head>

<header style="position: relative">
    <nav>
        <img src="images/Logo.png" height="60px"/ >

        <ul>
            <li style="padding-top: -5px">
                <div class="btn-group shadow-0" style="margin: 0px -300px">
                    <button
                            type="button"
                            class="btn btn-light dropdown-toggle rounded-pill py-2 btn-block"
                            data-mdb-toggle="dropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            style="background-color: #1c7430;color:white;"

                    >
                        Categories
                    </button>
                    <ul class="dropdown-menu" style="background-color: lightgreen;color: white">
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: red" href="Ps5.php">Ps5</a></li>
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: red" href="#">Ps4</a></li>
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: red" href="#">Xbox</a></li>

                    </ul>
                </div>



            </li>

            <li>
            <form style="margin: 15px;-800px ">
                <div class="input-group" >
                    <div class="form-outline">
                        <input type="search" id="form1" class="form-control" placeholder="Search" style="width: 100%;margin: 0px"/>
                    </div>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
            </li>
            <li><a href="home1.php">Home</a></li>
            <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
           <li> <div style="text-align: end">

                <b style="text-transform:uppercase"><i class="fas fa-user fa-2px"><?php echo$user ?></i>  </b>




            </div></li>
            <li><a href="logout.php" >Logout</a></li>

        </ul>

    </nav>
</header>
<body>


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

<!-- Gallery -->
<div class="row">
    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <img
                src="images/games/1.jpg"
                class="w-100 shadow-1-strong rounded mb-4"
                alt=""
        />

        <img
                src="images/games/2.jpg"
                class="w-100 shadow-1-strong rounded mb-4"
                alt=""
        />
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
        <img
                src="images/games/5.jpg" width="400px" height="450px"
                class="w-100 shadow-1-strong rounded mb-4"
                alt=""
        />

        <img
                src="images/games/6.jpg" width="400px" height="450px"
                class="w-100 shadow-1-strong rounded mb-4"
                alt=""
        />
    </div>

</div>

<h1>
    * Our Most Selling Products *
</h1>
<br>




<div class="card-group" style="width: 52rem; margin: auto">
    <div class="card" style="width: 22rem;" >
        <img class="card-img-top" src="images/games/1.jpg" style="margin: auto;object-fit: contain" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">The Pathless</h5>
            <a href="Ps5.php" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">Click for More info</a>
        </div>
    </div>
    <div class="card" style="width: 22rem;" >
        <img class="card-img-top" src="images/games/2.jpg" style="margin: auto;object-fit: contain" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Spider-Man</h5>
            <a href="Ps5.php" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">Click for More info</a>
        </div>
    </div>
    <div class="card" style="width: 22rem;" >
        <img class="card-img-top" src="images/games/5.jpg"  height="53%" style="margin: auto;object-fit: contain"alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">The Zelda</h5>
            <a href="Ps5.php" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">Click for More info</a>
        </div>
    </div>
</div>

<br>
<br>
<br>
</body>
<footer style="position: relative">

    <a href="aboutus.php" style="color: black">About Us</a>

    <a href="https://goo.gl/maps/AA5Na8QjBoht4SAFA" style="color: black">Addresses</a>
    <a href="#" style="color: black" onclick="return false;">Contact-+1433-222-2213</a>
</footer>