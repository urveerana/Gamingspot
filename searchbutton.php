<?php
session_start();
require_once('config.php');





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
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="Ps4.php">Ps4</a></li>
                        <li><a class="dropdown-item dropdown-primary rounded-pill py-2 btn-block" style="color: black" href="Xbox.php">Xbox</a></li>

                    </ul>
                </div>



            </li>
            <style>
                .rounded-pill:hover{
                    background-color: white;
                    color: black;
                }
            </style>

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
            <li><a class="rounded-pill btn-block p-1 "href="home1.php">Home</a></li>
            <li><a class="rounded-pill btn-block p-1 "href="#"><i class="fas fa-shopping-cart"></i></a></li>
            <li><a class="rounded-pill btn-block p-1 " href="logout.php">Logout</a></li>

        </ul>

    </nav>
</header>
<body>


<div class="row">

    <?php
    $var = $_POST['search'];
    if(isset($_POST['search'])){
    $query = "SELECT * FROM `products` WHERE product_name LIKE '%$var%' ";
    $result = mysqli_query($mysqli, $query);
    if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
    {
    ?>
    <div class="col-md-3  mt-2">
        <div class="card">
            <a href="single-product.php?product=<?php echo $row['id']?>">
                <img class="card-img-top" src="<?php echo $row['product_image'] ?>" style=" width: 100%;
    height: 15vw;
    margin: auto;
      object-fit: contain;
  "  alt="<?php echo $row['product_name'] ?>">
            </a>
            <div class="card-body">
                <h5 class="card-title">
                    <a href="single-product.php?product=<?php echo $row['id'] ?>">
                        <?php echo $row['product_name']; ?>
                    </a>
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
        echo "<tr style='color:orange;'><td >No Product Found...!</td></tr>";

    }

    }?>

</div>


</body>




<footer style="  position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
            height: 40px;
            ">

    <a href="aboutus.php" style="color: black">About Us</a>

    <a href="https://goo.gl/maps/AA5Na8QjBoht4SAFA" style="color: black">Addresses</a>
    <a href="#" style="color: black" onclick="return false;">Contact-+1433-222-2213</a>
</footer>
</html>