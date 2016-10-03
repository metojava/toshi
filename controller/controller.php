<?php

include '../model/model.php';

//date_default_timezone_set('America/New_York');

//echo date("Y-m-d h:i:s");

class Controller
{

public $model;
public $products;
public $hom;
public $pid;

  public function __construct()    
     {    
$this->model = new Model();  
$this->products=array();
$this->hom=array();

     }   
/////////////////////////////////////////////////////////////////////////

public  function display($page)
{

if(isset($_POST['pid'])&&isset($_POST['command'])&&($_POST['command']=='remove'))
self::removefromcart($_POST['pid']);

if($page=='homes')
{
$this->hom=$this->model->getHomes();
//echo "controller products";

//echo "<br/>";
$p='../view/'.$page.'.php';
include $p;
}
else if($page=='products')
{
$this->products=$this->model->getProducts();
//echo "controller products";

//echo "<br/>";

include '../view/products.php';
}

else 
{}

}


//////////////////////////////////////////////////////////////////////////

public function addtocart($id)
{
$s = trim($id);
$s = stripslashes($id);
$s = htmlspecialchars($id);

$this->pid=$s;
$this->model->addtocart($this->pid);
header('location:../view/cart.php');
}

//////////////////////////////////////////////////////////////////////////

public function removefromcart($id)
{
$s = trim($id);
$s = stripslashes($id);
$s = htmlspecialchars($id);
$i=intval($s);

$this->pid=$i;
$this->model->remove($this->pid);
header('location:../view/cart.php');
}

//////////////////////////////////////////////////////////////////////////

}

?>