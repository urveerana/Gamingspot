<?php
session_start();


require_once "config.php";


$id = $_GET['id'];

$del = mysqli_query($mysqli, "delete from users where id = '$id'");

if ($del) {
    mysqli_close($mysqli);
    header("location:user.php");
    exit;
} else {
    echo "ERROR";
}


?>