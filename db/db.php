<?php

class db{

public $con;

public function __construct()    
{    
          
$this->con = mysqli_connect("localhost","root","nbuser","shop");
if (mysqli_connect_errno($this->con))
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


}   



}

?>
