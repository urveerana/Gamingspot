<?php
session_start();
require_once ("config.php");
if( array_key_exists("loggedin", $_SESSION) && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo '';
} else {
    header("location: home.php");
    exit;
}
$user = htmlspecialchars($_SESSION["username"]);
$id=$_SESSION['id'];
$query=mysqli_query($mysqli,"SELECT * FROM users where id='$id'");
$row=mysqli_fetch_assoc($query);
include_once ('badge.php');
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
                <div class="btn-group shadow-0" style="margin: 0px -220px">
                    <button
                            type="button"
                            class="btn btn-light dropdown-toggle rounded-pill py-2 btn-block"
                            data-mdb-toggle="dropdown"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                            style="background-color: white;color:black;"

                    >
                        Categories
                    </button>
                    <ul class="dropdown-menu" style="background-image: linear-gradient(#36d1dc,#5b86e5);color: black">
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="Ps5.php">Ps5</a></li>
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="Ps4.php">Ps4</a></li>
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="Xbox.php">Xbox</a></li>

                    </ul>
                </div>


                <style>
                    .rounded-pill:hover{
                        background-color: white;
                        color: black;
                    }

                </style>
            </li>

            <li>
                <form style="margin: 15px;-800px " action="searchbutton.php" method="post">
                    <div class="input-group" >
                        <div class="form-outline">
                            <input type="text"  name="search" id="form1" class="form-control rounded-pill btn-block" placeholder="Search" style="width: 100%;margin: 0px"/>
                        </div>&nbsp;
                        <input type="submit" class="btn btn-danger rounded-pill btn-block" value="Search" >

                    </div>
                </form>
            </li>
            <li><a class="rounded-pill btn-block p-1 " href="home1.php">Home</a></li>
            <li><a href="cart.php"><style>
                        #ex4 .p1[data-count]:after{
                            position:absolute;
                            right:10%;
                            top:8%;
                            content: attr(data-count);
                            font-size:70%;
                            padding:.2em;
                            border-radius:50%;
                            line-height:1em;
                            color: white;
                            background:rgba(255,0,0,.85);
                            text-align:center;
                            min-width: 1em;
                        }

                    </style>
                    <div id="ex4">
  <span class="p1 fa-stack  has-badge" data-count="<?php echo $rowcount?>">
    <i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse" data-count="0"></i>
  </span></a></li>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <li>
                <img style=" background-color: white;
  display: inline-block;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  object-fit: cover;
" src="<?php echo $row['image']; ?>">
            </li>
           <li> <div style="text-align: end">

                <b style="text-transform:uppercase"> <div class="btn-group shadow-0" style="margin: 0px -50px">
                        <button
                                type="button"
                                class="btn btn-light dropdown-toggle rounded-pill py-sm-0 btn-block"
                                data-mdb-toggle="dropdown"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                                style="background-color: white;color: black"
                                    
                        >

                            <?php echo$user ?> </b>                     </button>
                        <ul class="dropdown-menu" style="background-image: linear-gradient(#36d1dc,#5b86e5);color: white">
                            <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="order_history.php">History</a></li>
                            <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="logout.php">Logout</a></li>

                        </ul>
                    </div>




            </div></li>


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

<div class="slider" style="text-align: center">
    <div><video controls autoplay loop  width="1400" muted>
            <source src="Xbox.mp4" type="video/mp4">
            <source src="Xbox.mp4.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video> </div>
    <div><video controls autoplay loop width="1400" muted>
            <source src="PS5.mp4" type="video/mp4">
            <source src="PS5.mp4.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video></div>
    <div><video controls autoplay loop width="1400" muted style="margin: 0px 50px;">
            <source src="ps4.mp4" type="video/mp4">
            <source src="ps4.mp4.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video></div>
</div>

<div style="background-color: #b8daff; " id="1" >
<div class="row" >

    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
        <img style=" width: 250px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;"
                src="images/games/1.jpg"
                class="w-100 shadow-1-strong rounded mb-4"
                alt=""

        />

        <img style=" width: 250px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;"
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
        <img style=" width: 250px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;"
                src="images/games/5.jpg" width="400px" height="450px"
                class="w-100 shadow-1-strong rounded mb-4"
                alt=""
        />

        <img style=" width: 250px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;"
                src="images/games/6.jpg" width="400px" height="450px"
                class="w-100 shadow-1-strong rounded mb-4"
                alt=""
        />
    </div>

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
        <img class="card-img-top" src="images/games/7.jfif"  height="49%" style="margin: auto;object-fit: contain"alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">God Of War</h5>
            <a href="Ps4.php" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">Click for More info</a>
        </div>
    </div>
    <div class="card" style="width: 22rem;" >
        <img class="card-img-top" src="images/games/8.jfif"  height="43%" style="margin: auto;object-fit: contain"alt="Card image cap">
        <br>  <div class="card-body">
            <h5 class="card-title">Call Of Duty</h5>
            <a href="Xbox.php" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">Click for More info</a>
        </div>
    </div>
</div>

<br>
<div class="container" style=" border: 2px solid black ; width : 1000px; height:500px ; align-text : center;margin: 90px 260px;background-color: #60c6eb">

<div class="row">
    <div class="col-sm-12 col-lg-12" style="
         color: Black
         margin: 70px 120px">
    <h1 class="h1">
        Contact us <small><br>Feel free to Share</small></h1>
</div>
<div class="col-md-8">
    <div class="well well-sm">
        <form action="feedback.php" method="post">
            <div class="row">
                <div class="col-md-6" style="background-color:#60c6eb; ">
                    <div class="form-group">
                        <label for="name" style="color: black;font-weight: bold;font-size: 22px">
                            Name</label>
                        <input type="text" class="form-control" id="name" style="border: 3px solid black"
                               placeholder="Enter name" name="name" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="email" style="color: black;font-weight: bold;font-size: 22px">
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
                        <input type="submit" class="btn btn-danger rounded-pill py-2 btn-block btn-group-sm"
                               style="" name="messagebtn" id="btnContactUs"
                               value="Send Message">
                    </div>
                    <br>
                </div>
                <div class="col-md-6" style="background-color:#60c6eb">
                    <div class="form-group">
                        <label for="name" style="color: black;font-weight: bold;font-size: 22px">
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
<?php require_once ('footer.php')?>