<?php
session_start();

$_SESSION = array();
unset($_SESSION["loggedin"]);

session_destroy();

header("location: home.php");
exit;
?>