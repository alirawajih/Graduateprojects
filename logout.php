<?php
session_start();
unset($_SESSION["loggeduser"]);
header('location:log.php');
?>