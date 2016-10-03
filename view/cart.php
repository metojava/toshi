<?php
session_start();
include '../model/model.php';

$mod= new Model();

if(isset($_POST['command']))
{
if($_POST['command']=='clear')
{
if(isset($_SESSION['cart']))
{
unset($_SESSION['cart']);
header('location:view.php');
}
}

else if($_POST['command']=='remove')
if(isset($_POST['productid']))
{
$id=$_POST['productid'];
$mod->remove($id);	
header('location:cart.php');	
}

else{}
}
	
$mod= new Model();
$products=$mod->getProducts();
//var_dump($products);
$ids=$_SESSION['cart'];

$cartps = array();

$total=0;

foreach($ids as $id)
foreach($products as $item)
{
if($id==$item->id)
{
array_push($cartps,$item);

$total+=intval($item->price);

}
}
unset($products);

$homes=$mod->getHomes();

foreach($ids as $id)
foreach($homes as $item)
{
if($id==$item->id)
{
array_push($cartps,$item);

$total+=intval($item->price);

}
}
unset($homes);



$_SESSION['cartps']=$cartps;
$_SESSION['total']=$total;

//if($_REQUEST['command']=='add' && $_REQUEST['productid']>0)

include('cartitems.php');

?>