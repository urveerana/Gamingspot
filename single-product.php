<?php
session_start();
require_once('config.php');
require_once ('badge.php');
if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] === true){
    header("location: home1.php");
    exit;
}


if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cartit'])) {


    if (is_numeric($_POST['product_id']) && is_numeric($_POST['product_quantity'])) {

        $product_id = (int)$_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price =$_POST['product_price'];
        $quantity = (int)$_POST['product_quantity'];
        $product_img = $_POST['product_img'];
        $id = $_SESSION['id'];

        $stmt = "SELECT * FROM products WHERE id = '$product_id'";
        $stmt1 = mysqli_query($mysqli, $stmt);

        $product = mysqli_fetch_assoc($stmt1);

        if ($product && $quantity > 0 && $product['product_quantity']>$quantity) {

            $sql = "SELECT * FROM `cart` WHERE `uid`='$id' AND `pid`='$product_id'";
            $rows = mysqli_query($mysqli, $sql);
            $rowsave = mysqli_num_rows($rows);

            if ($rowsave != 0) {

                $sql = "UPDATE `cart`SET `quantity`='$quantity' WHERE `uid`='$id' AND `pid`='$product_id'";

                if(mysqli_query($mysqli, $sql)) {
                    header('location: cart.php');
                    exit;
                } else{
                    echo "<script>alert('Update Error')</script>";
                }

            } else {

                $sql = "INSERT INTO `cart`(`uid`, `pid`, `name`, `quantity`, `price`, `image`) VALUES ('$id', '$product_id', '$product_name', '$quantity', '$product_price', '$product_img')";

                if(mysqli_query($mysqli, $sql)) {
                    header('location: cart.php');
                    exit;
                } else {
                    echo "<script>alert('Insert Error')</script>";
                }
            }

        }  else {
            echo "<script>alert('Out of Stock.')</script>";
        }

    } else {
        echo "<script>alert('not posted')</script>";
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product'])) {

    $var = $_GET['product'];
    $sqlSelect1 = "SELECT * FROM products WHERE id = '$var'";
    $result1 = mysqli_query($mysqli, $sqlSelect1);

    $s_product= mysqli_fetch_assoc($result1);

    $product1=$s_product['product_name'];
    if (!$s_product) {

        exit('Product Not Exist');
    }
} else {

    exit('Product Not Exist');
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Azeret+Mono:ital,wght@1,100&display=swap" rel="stylesheet">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>





</head>

<header style="position: relative">
    <nav>
        <img src="images/Logo.png" height="60px"/ >

        <ul>
            <li style="padding-top: -5px">
                <div class="btn-group shadow-0" style="margin: 0px -290px">
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
                    <ul class="dropdown-menu" style="background-image: linear-gradient(#36d1dc,#5b86e5);color: white">
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="Ps5.php">Ps5</a></li>
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="#">Ps4</a></li>
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="#">Xbox</a></li>
                    </ul>
                </div>



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
            <li><a href="cart.php"> <style>
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
                        .rounded-pill:hover{
                            background-color: white;
                            color: black;
                        }
                    </style>
                    <div id="ex4">
  <span class="p1 fa-stack  has-badge" data-count="<?php echo $rowcount?>">
    <i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse" data-count="<?php echo $rowcount?>"></i>
  </span>
                    </div></a></li>            <li><a class="rounded-pill btn-block p-1 " href="logout.php">Logout</a></li>


        </ul>

    </nav>
</header>
<body>


<div class="product content-wrapper" >

    <style>
         #img:hover {
            transform: scale(1.20);
            cursor: zoom-in;
        }
    </style>
    <img id="img" style="margin: 0px 400px;object-fit: contain" class="border border-info"src="<?=$s_product['product_image']?>" width="700" height="350" alt="<?=$s_product['product_name']?>">
    <div style="margin: 0px 400px">
        <h1 class="name" style="font-size: 2rem"><?=$s_product['product_name']?></h1>
        <span class="price" style="font-size: 2rem">
            <strong>$ <?=$s_product['product_price']-5.01?></strong>
            </span>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <input type="number" class="rounded-pill py-2 btn-block" name="product_quantity" style="text-align: center;" id="number" value="1" min="1" max="<?=$s_product['product_quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$s_product['id']?>">
            <input type="hidden" name="product_name" value="<?=$s_product['product_name']?>">
            <input type="hidden" name="product_price" value="<?=$s_product['product_price']?>">
            <input type="hidden" name="product_img" value="<?=$s_product['product_image']?>">



            <input type="submit" class="btn btn-primary rounded-pill py-2 btn-block" name='cartit'  value="Add To Cart">
        </form>
        <br>
        <div class="border border-info" style="text-align: justify;font-family: Dubai;font-weight: bold" ><b>Product Info</b><br><br>
           <p> <?=$s_product['product_desc']?> </p>
        </div>
    </div>
</div>
</body>
<?php require_once ('footer.php')?>

