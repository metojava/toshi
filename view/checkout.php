<?php
session_start();
include '../model/model.php';

$mod= new Model();

if(isset($_POST['command']) && $_POST['command']=='order')
{

$mod->submit();
}


if(!isset($_SESSION['fname'])&&!isset($_SESSION['pass']))
header('location:login.php');

else echo "Welcome to us ".$_SESSION['fname'];
$cartps=$_SESSION['cartps'];
$total=$_SESSION['total'];
?>


<html>

<head>

<script language="javascript">
	
function order()
{
//alert("clicked");

document.form1.command.value='order';
document.form1.submit();
	
}

</script>

<link rel="stylesheet" type="text/css" href="css/style.css">


</head>


<body>

<div id="main">

<div id="head">
<img src="logo.png" width='100' height='100' />
<h1>Toshima's Best</h1>
<h5>Change your life to the best</h5>


</div>



<div id="conta">

<form name="form1" method="POST">
	<input type="hidden" name="total" />
<input type="hidden" name="products" />
    <input type="hidden" name="command" />
</form>


<?php


echo "<table border='1'>";//start table
    
        // our table heading
echo "<tr>";
            echo "<th class='textAlignLeft'>Product Name</th>";
echo "<th>Product Description</th>";
            echo "<th>Price</th>";
echo "<th>Picture</th>";
echo "<th>Quantity</th>";
            echo "<th>Action</th>"; //20 line
        echo "</tr>";

foreach($cartps as $prod){
            
$row = get_object_vars($prod);
$id = $row['id']; 
$name = $row['name'];  
$desc = $row['desc']; 
$price = $row['price']; 
$pic = $row['picture']; //30 line
   
            echo "<tr>";
                echo "<td>".$name."</td>";
echo "<td>".$desc."</td>";
                echo "<td >".$price."</td>";
echo "<td>"."<img src=".$pic." /></td>";

 echo "<td><input type='text' id='num'/></td>";  
     
echo "<td>";                                                    //40 line
//echo "<a href='$_SERVER['PHP_SELF']?action=add&id=".$id."'>";
?>
<input type="button" value="Remove" onclick="addtocart(<?php echo $id?>)" />

<input type="button" value="update" onclick="update(<?php echo $id?>)" />
<?php
//echo "add</a>";

echo "</td>";
            echo "</tr>";
        }
        
    echo "</table>";

echo "<hr/>";
echo "<center>your shopping total  - ".$total."$</center>";


echo "<a href='view.php'>Continue Shopping</a>";

?>

<input type="button" value="Order" onclick="order()" />

</div>

</div>

</body>

</html>
