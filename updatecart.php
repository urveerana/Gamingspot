<?php
require ("config.php");
session_start();
$id = $_SESSION['id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "<script>alert('posted')</script>";

    if (isset($_POST['update'])) {
        echo "<script>alert('entered')</script>";

        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $prodid = (int)str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                $sql = "UPDATE `cart` SET `quantity`='$quantity' WHERE `uid` = '$id' AND `pid`='$prodid'";
                if(mysqli_query($mysqli, $sql)){
                    header("location: cart.php");
                    exit;
                } else {
                    echo "<script>alert('Update Error In Cart')</script>";
                }

            }
        }

        header('location: cart.php?page=cart');
        exit;
    }
}

?>