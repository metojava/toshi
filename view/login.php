<?php
session_start();
include '../model/model.php';
$mod=new Model();
if(isset($_POST['fname'])&&isset($_POST['pass']))
{
$fname=$_POST['fname'];
$pass=$_POST['pass'];

if($mod->userexists($fname,$pass))
{
$_SESSION['fname']=$fname;
$_SESSION['pass']=$pass;

header('location:checkout.php');

}
else
{
$_SESSION['nouser']="1";
header('location:login.php');
}
}

?>

<html>



<head>


<style>
.error {color: #FF0000;}


#fr
{
margin-top:120px;
width:960px;
 margin-left: auto ;
  margin-right: auto ;
background-color:#b0e0e6;
border-radius:20px;
}

</style>

<link rel="stylesheet" type="text/css" href="css/style.css">


</head>


<body>

<div id="main">

<div id="fr">
<center>
use: mamuka/secret

<br>
<pre>
if you runned sql file and created customer mamuka</pre>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<table>

<tr>
<td>Your Name:</td> <td><input type="text" name="fname"/></td>
<tr>

<tr>
<td>Your Password: </td> <td><input type="password" name="pass"/></td>
<tr>
<tr>
<td> </td> <td> <input type="submit" value="submit" /> </td>
</tr>
</table>
</form>

<hr/>

<?php
if (isset($_SESSION['nouser']))echo "please register <br/>";
?>

<a href="register.php">Register</a>

</center>

</div>
</div>

</body>


</html>