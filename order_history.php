<?php
session_start();


require_once "config.php";





?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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



    </nav>
</header>
<body>

    <style>
        .bs-example{
            margin: 20px;
        }
    </style>

<div class="bs-example">
    <table class="table table-dark">    <thead>
        <tr>
            <th>Customer_Number</th>
            <th>Total</th>
            <th>Order_number</th>
            <th>Time Of Purchase</th>


        </tr>
        </thead>
        <tbody>
        <?php
        $user=  htmlspecialchars($_SESSION["username"]);

        $query = "SELECT * FROM `history` WHERE  customername = '$user'";
        $hselect = mysqli_query($mysqli, $query);
        if (!empty($hselect) && $hselect->num_rows   > 0) {

            while ($oselect = mysqli_fetch_assoc($hselect)) {
                ?>
                <tr>
                    <td><?php echo $oselect['id']; ?></td>
                    <td>$ <?php echo $oselect['total']; ?></td>
                    <td><?php echo $oselect['orderno']; ?></td>
                    <td><?php echo $oselect['time']; ?></td>



                </tr>
                <?php
            }
        }
        else{
            echo "<tr style='color:orange;'><td colspan='8'>No History For You...!</td></tr>";
        }
        ?>

        </tbody>
    </table>
</div>
    <div><a  href="home1.php" class="rounded-pill btn-block p-1 "><p style="text-align:center" ><input type="submit" class="btn btn-warning rounded-pill py-2 btn-block btn-group-sm" value="Back To HomePage"></input></p> </a>
</div>

    <footer style="position: fixed;
        padding: 10px 10px 0px 10px;
        bottom: 0;
        width: 100%;
        height: 40px;">


        <a href="aboutus.php" style="color: black">About Us</a>

        <a href="https://goo.gl/maps/AA5Na8QjBoht4SAFA" style="color: black">Addresses</a>
        <a href="#" style="color: black" onclick="return false;">Contact-+1433-222-2213</a>
    </footer>

