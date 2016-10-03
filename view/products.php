<?php
//session_start();

//if($_REQUEST['command']=='add' && $_REQUEST['productid']>0)

if(isset($_POST['page']))
{
$contr=new Controller();
$contr->displayHomes($_POST['page']);
//header('location:homes.php');
}

else if(isset($_POST['productid']))
{
$id=$_POST['productid'];
Controller::addtocart($id);	
	
}

else
{}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Products</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script language="javascript">
$(function(){
     $("#myCarousel").carousel({
         interval : 3000,
         pause: false
     });
});

	function addtocart(pid){
		document.form1.productid.value=pid;
		document.form1.command.value='add';
		document.form1.submit();
	}

function gethomes(){
		
		document.form2.page.value='homes';
		document.form2.submit();
	}

function showdiv()
{

document.getElementById("t").style.display=="block"?document.getElementById("t").style.display="none":document.getElementById("t").style.display="block";

//document.getElementById("t").style.opacity="0.75";
//document.getElementById("t").style.filt="alpha(opacity:75)";

document.getElementById("t").style.zIndex="123";
document.getElementById("t").style.borderRadius="12px";

}


</script>

<link rel="stylesheet" type="text/css" href="css/style.css">




<style type="text/css">

#myCarousel
{
height:270px;
}


.trans{
width:360px;
height:370px;
position:absolute;

bottom:0px;
display:none;
background:#f1f1f1;
/*
overflow:hidden;
opacity:0.5;
filter:alpha(opacity:50);
*/
border-radius:12px;
z-index:10;
box-shadow: 10px 10px 10px #999999;
}

.trans img{
width:300px;
height:310px;
}

.item {
    color: #666;
    background: #333;
    height: 300px;
    line-height: 300px; /* Align the text vertically center. */
    font-size: 52px;
    text-align: center;    
    font-family: "trebuchet ms", sans-serif;    
}
.carousel{
    margin-top: 20px;
height:180px;
}
.carousel-control{
	top: 50%;
}


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
#cont
{
margin:0 auto;
width:960px;
}
</style>


</head>


<body >

<div class="container">

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">

<a href="#" class="brand">Toshima</a>
            <ul role="navigation" class="nav">
               
                <li><a href="#">Products</a></li>
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


<div id="myCarousel" class="carousel slide">
    	<!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>   
        <!-- Carousel items -->

  <div class="carousel-inner">

    <div class="active item">
     <img src="img/1.jpg" alt="Sample Image">

	<div class="carousel-caption">
              <p>Carina Nebula: The Caterpillar</p>
              
	</div>

    </div>



    <div class="item">
     <img src="img/2.jpg" alt="Sample Image">

	<div class="carousel-caption">
              <p>Carina Nebula: The Caterpillar</p>
              
        </div>
    </div>


    <div class="item">
     <img src="img/3.jpg" alt="Sample Image">

	<div class="carousel-caption">
              <p>Carina Nebula: The Caterpillar</p>
              
        </div>

     </div>


  </div>
        <!-- Carousel nav -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>


</div>


</div>

<hr>

<div id="cont">

<form name="form1" method="POST">
	<input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>

<form name="form2" method="POST">
	
    <input type="hidden" name="page" />
</form>

<div class="bs-example">

<?php


//echo count($this->products);
//print_r($this->products); 10 line

echo "<ul class='thumbnails'>";

        

foreach($this->products as $prod){
            
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

   
?>
<p> <a class="btn" href="#" onclick="addtocart(<?php echo $id?>)">Buy</a>
<a class="btn btn-info" onclick="showdiv()"> View</a>

</p>


<div class="trans" id="t">

<?php

echo "<div class='thumbnail'>";

  echo "<img src=".$pic." width=300 height=300/>";

echo "<div class='caption'>";
                echo "<h4>".$name."</h4>";

echo "<h5>".$desc."</h5>";
                echo "<p><h3>".$price." $</h3></p>";
echo "</div>";
echo "</div>";
?>

</div>


<?php
echo "</div>";

echo "</div>";
            echo "</li>";
        }
        
    echo "</ul>";


?>


</div>


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

</body>

</html>