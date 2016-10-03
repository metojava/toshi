<?php
session_start();
$_SESSION['start']="products";
header('location:view/view.php')
?>