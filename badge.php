<?php
include_once('config.php');

$id = $_SESSION['id'];
global $rowcount;
$sql = "SELECT * FROM `cart` WHERE `uid`='$id'";
if ($result = mysqli_query($mysqli, $sql)) {
    $rowcount = mysqli_num_rows($result);
}
?>