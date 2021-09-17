<?php
    session_start();
    require_once('config.php');
require_once ('badge.php');




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
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        background-color: #DCE1E0;
    }

    .card:hover {
        background-color:lightblue;
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }
    .row {
        margin: 0px 30px;
        width: 95% ;
    border: 5px dotted black;
    }

</style>




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
                            style="background-color: white;color:blacks;"

                    >
                        Categories
                    </button>
                    <ul class="dropdown-menu" style="background-image: linear-gradient(#36d1dc,#5b86e5);;color: white">
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="Ps5.php">Ps5</a></li>
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="Ps4.php">Ps4</a></li>
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="Xbox.php">Xbox</a></li>

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
                    </div></a></li>
            <li><a class="rounded-pill btn-block p-1 "href="logout.php">Logout</a></li>

        </ul>

    </nav>
</header>
<body>






<div class="row">



    <form action="Ps5.php" method="post">


    <div class="form-check">
        <input class="form-check-input"  name="orderby"type="radio" value="1" id="flexCheckDefault">
        <label class="form-check-label" >
            By Name
        </label>

    </div>
        <div class="form-check">
            <input class="form-check-input"  name="orderby"type="radio" value="2" id="flexCheckDefault">
            <label class="form-check-label" >
                By Price
            </label>
        </div>
        <input type="submit" class="btn btn-info rounded-pill btn-block"  name="submit" value="Search">


    </form>
    <?php

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && isset($_POST['orderby'])) {

        if ((int)$_POST['orderby'] == 1) {
            $sql= "SELECT * FROM `products` WHERE product_category = 'Ps5' ORDER BY product_name ASC";
            echo '<h3 style="text-align: center;font-weight: bold">Now Viewing Products By Name</h3>';
        } else if((int)$_POST['orderby'] == 2) {
            $sql= "SELECT * FROM `products` WHERE product_category = 'Ps5' ORDER BY product_price+0 ASC";
            echo '<h3 style="text-align: center;font-weight: bold">Now Viewing Products By Price</h3>';

        }

    $r= mysqli_query($mysqli, $sql);
           ?>
        <?php
    if ($r->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($r)) {
            {
                ?>
                <div class="col-md-3  mt-2">
                    <div class="card">
                        <?php
                        if($row['product_quantity'] > 0) {
                            ?>

                            <a href="single-product.php?product=<?php echo $row['id']?>">
                                <img class="card-img-top" src="<?php echo $row['product_image'] ?>" style=" width: 100%;
                                     height: 15vw;
                                     margin: auto;
                                     object-fit: contain;
                                     "  alt="<?php echo $row['product_name'] ?>">
                            </a>
                            <?php
                        }else { ?>
                            <img class="card-img-top" src="<?php echo $row['product_image'] ?>" style=" width: 100%;
                                height: 15vw;
                                margin: auto;
                                object-fit: contain;
                                "  alt="<?php echo $row['product_name'] ?>">
                        <?php  }?>

                        <div class="card-body">
                            <h5 class="card-title">
                                <?php if($row['product_quantity'] > 0){?>
                                    <a href="single-product.php?product=<?php echo $row['id'] ?>">
                                        <?php echo $row['product_name']; ?>
                                    </a>
                                <?php }else{?>
                                    <?php echo $row['product_name'];
                                }?>
                            </h5>
                            <strong>$ <?php echo $row['product_price'] - 5.01?>&nbsp;<label style="text-decoration: line-through;color: red">$<?php echo $row['product_price']?></label></strong>

                            <p class="card-t">
                                <?php echo substr($row['product_desc'],0,50) ?>'...
                            </p>
                            <p class="card-text">
                                <?php
                                if($row['product_quantity'] > 0) {
                                    ?>
                                    <strong style="color: green">
                                        Available Quantity : <?php
                                        echo $row['product_quantity'];
                                        ?></strong>
                                    <a href="single-product.php?product=<?php echo $row['id']?>" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">
                                        Click For More Info
                                    </a>
                                    <?php
                                }else {
                                    $a = '0';
                                    echo '<strong style="color: red">Out of stock</strong>&nbsp;';
                                    echo  '<a class="btn btn-warning rounded-pill py-2 btn-block btn-group-sm">
                                    Click For More Info
                                    </a>';
                                }?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }


    }else{
        echo "<tr style='color:orange;'><td colspan='8'>No Product here...!</td></tr>";
    }
    }else{


    ?>

      <?php
    $query = "SELECT * FROM `products` WHERE product_category = 'Ps5' ";
    $result = mysqli_query($mysqli, $query);
        ?>    <h3 style="text-align: center;font-weight: bold">All Products In PS5</h3>
        <?php
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            {
                ?>
                <div class="col-md-3  mt-2">
                    <div class="card">
                        <?php
                        if($row['product_quantity'] > 0) {
                            ?>

                            <a href="single-product.php?product=<?php echo $row['id']?>">
                                <img class="card-img-top" src="<?php echo $row['product_image'] ?>" style=" width: 100%;
                                     height: 15vw;
                                     margin: auto;
                                     object-fit: contain;
                                     "  alt="<?php echo $row['product_name'] ?>">
                            </a>
                            <?php
                        }else { ?>
                            <img class="card-img-top" src="<?php echo $row['product_image'] ?>" style=" width: 100%;
                                height: 15vw;
                                margin: auto;
                                object-fit: contain;
                                "  alt="<?php echo $row['product_name'] ?>">
                        <?php  }?>

                        <div class="card-body">
                            <h5 class="card-title">
                                <?php if($row['product_quantity'] > 0){?>
                                    <a href="single-product.php?product=<?php echo $row['id'] ?>">
                                        <?php echo $row['product_name']; ?>
                                    </a>
                                <?php }else{?>
                                    <?php echo $row['product_name'];
                                }?>
                            </h5>
                            <strong>$ <?php echo $row['product_price'] - 5.01?>&nbsp;<label style="text-decoration: line-through;color: red">$<?php echo $row['product_price']?></label></strong>

                            <p class="card-t">
                                <?php echo substr($row['product_desc'],0,50) ?>'...
                            </p>
                            <p class="card-text">
                                <?php
                                if($row['product_quantity'] > 0) {
                                    ?>
                                    <strong style="color: green">
                                        Available Quantity : <?php
                                        echo $row['product_quantity'];
                                        ?></strong>
                                    <a href="single-product.php?product=<?php echo $row['id']?>" class="btn btn-info rounded-pill py-2 btn-block btn-group-sm">
                                        Click For More Info
                                    </a>
                                    <?php
                                }else {
                                    $a = '0';
                                    echo '<strong style="color: red">Out of stock</strong>&nbsp;';
                                    echo  '<a class="btn btn-warning rounded-pill py-2 btn-block btn-group-sm">
                                    Click For More Info
                                    </a>';
                                }?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }


    }else{
        echo "<tr style='color:orange;'><td colspan='8'>No Product here...!</td></tr>";
    }
    }?>

</div>
<?php require_once ('footer.php')?>