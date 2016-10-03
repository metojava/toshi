<?php
session_start();
//echo $_SESSION['success'];
session_destroy();


?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>

<link rel="stylesheet" type="text/css" href="css/style.css">


</head>


<body>

<div id="main">

<div id="head">
<img src="logo.png" width='100' height='100' />
<h1>Toshima's Best</h1>
<h5>Change your life to the best</h5>


</div>

<div id="nav">
<ul>

<li><a href="#">Laptops</a></li>
				<li><a href="#">Cars</a></li>
				<li><a href="#">Clothing</a></li>

</ul>
</div>
 
<?php


echo "<a href='view.php' >";
echo "< < Back To Products </a>";

?>
<center>Success

</center>
<br/>
<br/>
<br/>
<div id="footer">
<center>
CopyRight 2013 @MyDesigns
</center>
</div>

</div>

</body>

</html>