<?php

class User
{

public $uid; 
public $fname; 
public $lname; 
public $pass; 
public $email;
public $address; 
public $phone;



public function __construct($uid, $fname, $lname,$pass,$email,$address,$phone)    
    {    
        $this->uid = $uid;  
        $this->fname = $fname; 
        $this->lname = $lname; 
        $this->pass = $pass;
 $this->email = $email;
 $this->address = $address;
$this->phone = $phone;  
         
 
    }   



}

?>