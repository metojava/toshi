<?php
include '../db/db.php';
include 'product.php';
include 'user.php';

class Model
{
public $db;
public $products;
public $con;
public $stmt;
public $cartitems;
public $user;
public $homes;

///////////////////////////////////////////////////////////////////////////////////

public function __construct()         
{    
          
$this->db = new db();        
$this->products= array();
$this->homes= array();
$this->cartitems=array();
$this->con = $this->db->con;
     
}   

///////////////////////////////////////////////////////////////////////////////////


public function getProducts()
{

$result = mysqli_query($this->con,"SELECT * FROM Products LIMIT 0 , 8");

while($row = mysqli_fetch_array($result))
  
{

$prod = new Product($row['id'],$row['name'],$row['descr'],$row['price'],$row['picture']);
array_push($this->products,$prod);

}

//mysqli_close($this->con);
return $this->products;
}


///////////////////////////////////////////////////////////////////////////////////



public function getHomes()
{

$result = mysqli_query($this->con,"SELECT * FROM Products limit 9,14");

while($row = mysqli_fetch_array($result))
  
{

$prod = new Product($row['id'],$row['name'],$row['descr'],$row['price'],$row['picture']);
array_push($this->homes,$prod);

}

//mysqli_close($this->con);
return $this->homes;
}


///////////////////////////////////////////////////////////////////////////////////

public function getCartItems($cart)
{

$result = mysqli_query($this->con,"SELECT * FROM Products where id in ({$cart})");

while($row = mysqli_fetch_array($result))
  {

$prod = new Product($row['id'],$row['name'],$row['desc'],$row['price'],$row['picture']);
array_push($this->cartitems,$prod);

}

mysqli_close($this->con);
return $this->cartitems;
}


///////////////////////////////////////////////////////////////////////////////////

public function addtocart($id)
{

if(!isset($_SESSION['cart']))
{
$_SESSION['cart']=array();
}
//$cn=count($_SESSION['cart']);
//$_SESSION['cart'][$cn]['productid']=$pid;
//$_SESSION['cart'][$cn]['qty']=$q;
array_push($_SESSION['cart'], $id);

}

///////////////////////////////////////////////////////////////////////////////////

public function remove($id)
{

if(!isset($_SESSION['cart'])) return;

$_SESSION['cart'] = array_diff($_SESSION['cart'], array($id));

$_SESSION['cart'] = array_values($_SESSION['cart']);

}

///////////////////////////////////////////////////////////////////////////////////

public function userexists($user,$pass)
{

$result = mysqli_query($this->con,"SELECT * FROM customers where fname='$user' and pass='$pass'");
$num=mysqli_num_rows($result);
if($num>0)
return true;
return false;

}

///////////////////////////////////////////////////////////////////////////////////

public  function createuser()

{
   
 /*       $this->user->uid = $uid;  
        $this->user->fname = $fname; 
        $this->user->lname = $lname; 
        $this->user->pass = $pass;
 $this->user->email = $email;
 $this->user->address = $address;
$this->user->phone = $phone; 

*/

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$pass=$_POST['pass'];
$address=$_POST['address'];
$phone=$_POST['phone'];


$fname=$this->con->real_escape_string($fname);
$lname=$this->con->real_escape_string($lname);
$pass=$this->con->real_escape_string($pass);
$address=$this->con->real_escape_string($address);
$phone=$this->con->real_escape_string($phone);

$query = "INSERT INTO customers (fname,lname,pass,address,phone)VALUES ('$fname','$lname','$pass','$address','$phone')";
if(!is_resource($this->con))$this->con=$this->db->con;

$res=$this->con->query($query) or die($query.'<br />'.$con->error);



$_SESSION['fname']=$fname;
$_SESSION['pass']=$pass;
if(!$res)
{
$_session['erroruser']="can't create";
header('location:../view/register.php');
}
else 
header('location:../view/checkout.php');
}

///////////////////////////////////////////////////////////////////////////////////

public function submit()
{

$fname=$_SESSION['fname'];
$pass=$_SESSION['pass'];
$pids=$_SESSION['cart'];

$sql = "select * from customers where fname='$fname' and pass='$pass'";
$res=$this->con->query($sql) or die($query.'<br />'.$con->error);
$res->data_seek(0);
$row = $res->fetch_assoc();
$cid = $row['uid'];

$sql = "insert into orders values(null,'$cid',CURRENT_TIMESTAMP)";
$res=$this->con->query($sql) or die($query.'<br />'.$con->error);
$oid=$this->con->insert_id;


foreach($pids as $pid){
            

$sql = "insert into orderprod values('$oid','$cid','$pid',1)";
$res=$this->con->query($sql) or die($sql.'<br />'.$con->error);

}
$_SESSION['success']="success";

header('location:../view/es.php');


}

///////////////////////////////////////////////////////////////////////////////////

}

?>