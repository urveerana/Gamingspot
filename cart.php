<?php
require_once ("config.php");
session_start();

if(!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}

$id = $_SESSION['id'];


if($_SERVER["REQUEST_METHOD"] == "GET"){

    if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {

        $prodid = $_GET['remove'];
        $sql = "DELETE FROM `cart` WHERE `uid` = '$id' AND `pid`='$prodid'";
        if(mysqli_query($mysqli, $sql)){
            header("location: cart.php");
            exit;
        } else {
            echo "<script>alert('".$sql."')</script>";
        }
    }
}

$sql = "SELECT * FROM `cart` WHERE `uid`='$id'";
$products = mysqli_query($mysqli, $sql);
$rowc = mysqli_num_rows($products);
$total = 0;
foreach ($products as $product) {
    $total += ((float)$product['price']-0.01) * (int)$product['quantity'];
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamingSpot</title>

    <?php require_once ('design.php')?>
    <style>
        .form-check-input[type=checkbox].filled-in:checked+label:after,
        label.btn input[type=checkbox].filled-in:checked+label:after {
            border: 2px solid #4285f4;
            background-color: #4285f4;
        }

        body{
            background-image: url("images/5.jpg");
            background-size: cover;



            background: #eecda3;
            background: -webkit-linear-gradient(to right, #eecda3, #ef629f);
            background: linear-gradient(to right, #eecda3, #ef629f);
            min-height: 100vh;

        }

    </style>

</head>

<header>
    <nav >
        <img src="images/Logo.png" height="60px" />

        <ul style="padding: 25px">
            <li><a href="home1.php">Home</a></li>
            <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
            <li><a href="logout.php">Logout</a></li>

        </ul>

    </nav>
</header>
<body>


<div class="px-4 px-lg-0">


    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                    <div class="table-responsive">
                        <form action="updatecart.php" method="POST">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="p-2 px-3 text-uppercase">Product</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Price</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Quantity</div>
                                    </th>

                                    <th scope="col" class="border-0 bg-light">
                                        <div class="py-2 text-uppercase">Remove</div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php if (empty($products)): ?>
                                <tr>
                                    <td colspan="5" style="text-align:center;"><br><strong>You have no products added in your Shopping Cart </strong></td>
                                </tr>
                                <?php else: ?>
                                    <?php foreach ($products as $product):
                                        $pid = $product['pid'];
                                        $stmt = "SELECT * FROM products WHERE id = '$pid'";
                                        $stmt1 = mysqli_query($mysqli, $stmt);

                                        $prod = mysqli_fetch_assoc($stmt1);
                                        $stock = $prod['product_quantity'];?>
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <div class="ml-3 d-inline-block align-middle">
                                                <a href="cart.php?page=product&id=<?=$product['pid']?>">
                                                    <img src="<?=$product['image']?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                </a></div>
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <?=$product['name']?></h5>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle"><strong>$ <?=$product['price']-0.01?></strong></td>
                                        <td class="border-0 align-middle"><strong>
                                                <input type="number" class="rounded-pill py-2 btn-block"  style="text-align: center" name="quantity-<?=$product['pid']?>" value="<?=$product['quantity']?>" min="1" max="<?=$stock?>" placeholder="Quantity" required>
                                            </strong></td>


                                        <td class="border-0 align-middle"><a href="cart.php?page=&remove=<?=$product['pid']?>" class="remove">Remove</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

            <div class="row py-5 p-4 bg-white rounded shadow-sm" style="width: 80%;margin: 0px 125px">

                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary </div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                                <h5 class="font-weight-bold">$ <?=$total?></h5>
                            </li>
                        </ul><a href="pay.php" class="btn btn-dark rounded-pill py-2 btn-block">Procceed to checkout</a>


                        <div class="btn btn-dark rounded-pill py-2 btn-block">

                            <input type="submit" value="Update" style="background-color: transparent;color:#fff;border:none;" id="Update" name="update">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </form>
</div>
</body>

<footer style="position: relative">

    <a href="aboutus.php" style="color: black">About Us</a>

    <a href="https://goo.gl/maps/AA5Na8QjBoht4SAFA" style="color: black">Addresses</a>
    <a href="#" style="color: black" onclick="return false;">Contact-+1433-222-2213</a>
</footer>


</html>