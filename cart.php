<?php
require_once("config.php");
session_start();

if (!isset($_SESSION["loggedin"]) || !$_SESSION["loggedin"] === true) {
    header("location: home.php");
    exit;
}

$id = $_SESSION['id'];


include_once('badge.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {

        $prodid = $_GET['remove'];
        $sql = "DELETE FROM `cart` WHERE `uid` = '$id' AND `pid`='$prodid'";
        if (mysqli_query($mysqli, $sql)) {
            header("location: cart.php");
            exit;
        } else {
            echo "<script>alert('" . $sql . "')</script>";
        }
    }
}

$sql = "SELECT * FROM `cart` WHERE `uid`='$id'";
$products = mysqli_query($mysqli, $sql);
$rowc = mysqli_num_rows($products);
$total = 0;

foreach ($products as $product) {
    $total += ((float)$product['price'] - 0.01) * (int)$product['quantity'];
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GamingSpot</title>

    <?php require_once('design.php') ?>
    <style>
        .form-check-input[type=checkbox].filled-in:checked + label:after,
        label.btn input[type=checkbox].filled-in:checked + label:after {
            border: 2px solid #4285f4;
            background-color: #4285f4;
        }

        body {
            background-image: url("images/5.jpg");
            background-size: cover;



            min-height: 100vh;

        }

    </style>

</head>

<header>
    <nav>
        <img src="images/Logo.png" height="60px"/>
        <style>

            .rounded-pill:hover {
                background-color: white;
                color: black;
            }
        </style>
        <ul style="padding: 25px">
            <li><a class="rounded-pill btn-block p-1 " href="home1.php">Home</a></li>
            <li><a href="cart.php">
                    <style>
                        #ex4 .p1[data-count]:after {
                            position: absolute;
                            right: 10%;
                            top: 8%;
                            content: attr(data-count);
                            font-size: 70%;
                            padding: .2em;
                            border-radius: 50%;
                            line-height: 1em;
                            color: white;
                            background: rgba(255, 0, 0, .85);
                            text-align: center;
                            min-width: 1em;
                        }

                    </style>
                    <div id="ex4">
  <span class="p1 fa-stack  has-badge" data-count="<?php echo $rowcount ?>">
    <i class="p3 fa fa-shopping-cart fa-stack-1x xfa-inverse" data-count="<?php echo $rowcount ?>"></i>
  </span>
                    </div>


                </a></li>
            <li><a class="rounded-pill btn-block p-1 " href="logout.php">Logout</a></li>

        </ul>

    </nav>
</header>
<body>


<div class="px-4 px-lg-0">


    <div class="pb-5">
        <div class="container" >
            <div class="row">

                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    <div class="bg-light rounded-pill px-2 py-0 text-uppercase font-weight-bold" style="width: 25%;float:left;">
                        <ul class="list-unstyled mb-4" >
                            <li class="d-flex justify-content-between "><strong class="text-muted" style="margin: auto;padding-top: 23px">Total</strong>
                                <h5 class="font-weight-bold" style="margin: auto;padding-top: 23px">$ <?= $total ?></h5>
                            </li>
                        </ul>
                    </div>
                    <?php
                    if ($total != 0) {
                        echo '<a href="pay.php?total=' . $total . '" style="float: right;color:white;background-color: black "class="btn btn-dark rounded-pill py-2 btn-block">Proceed to checkout</a>';
                    } else {
                        echo '<a href="cart.php" style="float: right;color:white;background-color: black" class="btn btn-dark rounded-pill py-2 btn-block">Proceed to checkout</a>';

                    }

                    ?>


                    <br>
                    <br>
                    <div class="table-responsive" style="width: 100%;">
                        <form action="updatecart.php" method="POST">
                            <div class="btn btn-dark rounded-pill py-2 btn-block" style="float: right;color: black">

                                <input type="submit" value="Update"
                                       style="background-color: black;color:white;border:none;" id="Update"
                                       name="update">
                            </div>
                            <br>
                            <table class="table" >
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
                                    <td colspan="5" style="text-align:center;"><br><strong>You have no products added in
                                            your Shopping Cart </strong></td>
                                </tr>
                                <?php else: ?>
                                    <?php foreach ($products as $product):
                                        $pid = $product['pid'];
                                        $stmt = "SELECT * FROM products WHERE id = '$pid'";
                                        $stmt1 = mysqli_query($mysqli, $stmt);

                                        $prod = mysqli_fetch_assoc($stmt1);
                                        $stock = $prod['product_quantity']; ?>
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <a href="cart.php?page=product&id=<?= $product['pid'] ?>">
                                                        <img src="<?= $product['image'] ?>" alt="" width="70"
                                                             class="img-fluid rounded shadow-sm">
                                                    </a></div>
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <?= $product['name'] ?></h5>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle">
                                            <strong>$ <?= $product['price'] - 0.01 ?></strong></td>
                                        <td class="border-0 align-middle"><strong>
                                                <input type="number" class="rounded-pill py-2 btn-block"
                                                       style="text-align: center" name="quantity-<?= $product['pid'] ?>"
                                                       value="<?= $product['quantity'] ?>" min="1" max="<?= $stock ?>"
                                                       placeholder="Quantity" required>
                                            </strong></td>


                                        <td class="border-0 align-middle"><a
                                                    href="cart.php?page=&remove=<?= $product['pid'] ?>" class="remove" style="color: black">Remove</a>
                                        </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                                </tbody>
                            </table>
                    </div>
                </div>
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


    <a href="aboutus.php" style="color: black">About Us</a>

    <a href="https://goo.gl/maps/AA5Na8QjBoht4SAFA" style="color: black">Addresses</a>
    <a href="#" style="color: black" onclick="return false;">Contact-+1433-222-2213</a>
</footer>


</html>