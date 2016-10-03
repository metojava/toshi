<?php
session_start();
header('Cache-Control: max-age=900'); //document expired solving
include '../controller/controller.php';
if(isset($_SESSION['start']))
$ps=$_SESSION['start'];
//else $ps='homes';

$ctl=new Controller();

if(isset($_POST['page'])&&$_POST['page']=='homes')
$ps='homes';
if(!isset($ps))$ps='products';
$ctl->display($ps);
?>