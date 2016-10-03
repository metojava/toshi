<?php

if(isset($_POST['productid']))
{
$id=$_POST['productid'];
Controller::addtocart($id);	
	
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
<script language="javascript">
	function addtocart(pid){
alert(pid);
		document.f1.productid.value=pid;
		document.f1.command.value='add';
		document.f1.submit();
	}

function getproducts(){
		
		document.form2.page.value='products';
		document.form2.submit();
	}
</script>

<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" type="text/css" href="css/style.css">



<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
    	margin: 10px;
    }
img{

width:250px;
height:200px;
}

.thumbnail
{
height:400px;

}
h1,h2,h3,h4
{
font-family:"Times New Roman",Times,serif;
color:#000038;
}

h5
{
font-style:italic;
color:#990066;
}
</style>
</head>


<body>

<div class="container">

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">

<a href="#" class="brand">Toshima</a>
            <ul role="navigation" class="nav">
               
                <li><a href="view.php" onclick="getproductsa()" >Products</a></li>
<li><a href="#" onclick="gethomes()" >Homes</a></li>
<li><a href="#">Cars</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Messages <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Inbox</a></li>
                        <li><a href="#">Drafts</a></li>
                        <li><a href="#">Sent Items</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Trash</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </li>
            </ul>


<form class="navbar-form pull-right">
                <input type="text" placeholder="Search" class="input-medium search-query">
                <button class="btn" type="submit">Search</button>
            </form>

    </div>

    </div>



<div class="hero-unit">
<img src="logo.png" width='100' height='100' />
<h1>Toshima's Best</h1>
<h5>Change your life to the best</h5>
<br>
<a href="#" class="btn btn-large btn-success">Get Started</a>
</div>

<div id="cont">

<form name="f1" method="POST">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>
<div class="bs-example">

<?php


//echo count($this->products);
//print_r($this->products); 10 line

echo "<ul class='thumbnails'>";


foreach($this->hom as $prod){
            
$row = get_object_vars($prod);
$id = $prod->id; 
$name = $prod->name;  
$desc = $prod->desc; 
$price = $prod->price; 
$pic = $prod->picture; //30 line
   
            echo "<li class='span3'>";
               
echo "<div class='thumbnail'>";

echo "<img src=".$pic." />";

echo "<div class='caption'>";
                echo "<h4>".$name."</h4>";

echo "<h5>".$desc."</h5>";
                echo "<p><h3>".$price." $</h3></p>";

     
echo "<td>";                                                    

?>


<p> <a class="btn" href="#" onclick="addtocart(<?php echo $id?>)">Buy</a></p>

<?php
//echo "add</a>";

echo "</div>";

echo "</div>";
            echo "</li>";
        }
        
    echo "</ul>";


?>

</div>
<br/>
<br/>
<br/>

<div id="footer">
<center>
CopyRight 2013 @MyDesigns
</center>
</div>

</div>

</div>

</div>

</body>

</html>