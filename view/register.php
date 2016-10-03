<?php
session_start();
include '../model/model.php';

if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['pass'])&&isset($_POST['address'])&&isset($_POST['phone']))
{
$model=new Model();
$model->createuser();

}

?>

<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}

body
{
margin:0;
padding:0;
}

#fr
{
width:100%;
 margin-left: auto ;
  margin-right: auto ;
background-color:#b0e0e6;
border-radius:12px;
}

</style>
<link rel="stylesheet" type="text/css" href="css/style.css">


</head>


<body>

<div id="main">

<div id="head">
<img src="logo.png" width='100' height='100' />
<h1>Toshiba's Best</h1>
<h5>Change your life to the best</h5>


</div>

<center>
<div id="fr">
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  
 First Name: <input type="text" name="fname" />
   
   <br><br>

 Last Name: <input type="text" name="lname" />
  
   <br><br>

 Password: <input type="text" name="pass" />
  
   <br><br>

   E-mail: <input type="text" name="email" />
  
   <br><br>

 Address: <input type="text" name="address" />
   
   <br><br>


   Phone: <input type="text" name="phone" />
  
   <br><br>
   
   <br><br>
   <input type="submit" name="submit" value="Submit">
</form>
</div>
</center>
</div>
</body>
</html>