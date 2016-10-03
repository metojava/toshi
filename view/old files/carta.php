<?php
session_start();
include '../model/model.php';

if(isset($_POST['pid'])&&isset($_POST['cmd'])&&$_POST['cmd']=="remove")
header('location:../index.php');
	
$mod= new Model();
$products=$mod->getProducts();
//var_dump($products);
$ids=$_SESSION['cart'];

$cartps = array();



foreach($ids as $id)
foreach($products as $item)
{
if($id==$item->id)
{
array_push($cartps,$item);

break;
}
}
//var_dump($cartps);
//include 'cartitems.php';

//return $cartps;

?>

<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<script language="javascript">
	function remove(pid){
Console.log();
alert(pid);
		document.form1.pid.value=pid;
		document.form1.cmd.value='remove';
		document.form1.submit();
	}
</script>
</head>



<body>
<form name="form1"  method="POST">
	<input type="hidden" name="pid" />
    <input type="hidden" name="cmd" />
</form>

<?php

//print_r($cartps);
echo "<br/>";
echo "<table border='1'>";//start table
    
        // our table heading
echo "<tr>";
            echo "<th class='textAlignLeft'>Product Name</th>";
echo "<th>Product Description</th>";
            echo "<th>Price</th>";
echo "<th>Picture</th>";
            echo "<th>Action</th>";
        echo "</tr>";

foreach($cartps as $prod){
            
$row = get_object_vars($prod);
$id = $row['id']; 
$name = $row['name'];  
$desc = $row['desc']; 
$price = $row['price']; 
$pic = $row['picture']; 

//61  
            echo "<tr>";
                echo "<td>".$name."</td>";
echo "<td>".$desc."</td>";
                echo "<td >".$price."</td>";
echo "<td>"."<img src=".$pic." /></td>";

 echo "<td><input type='text' id='num'/></td>";  
     
echo "<td>";
?>
<input type="button" value="Remove" onclick="remove(<?php echo $id?>)" />

<?php
echo "</td>";
            echo "</tr>";
        }
        
    echo "</table>";

echo "<a href='../index.php' >";
echo "Back To Products</a>";

?>

</body>

</html>
