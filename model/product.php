<?php

class Product
{

public $id; 
public $name; 
public $desc; 
public $price; 
public $picture; 


public function __construct($id, $name, $desc,$price,$picture)    
    {    
        $this->id = $id;  
        $this->name = $name;  
        $this->desc = $desc;
$this->price = $price;  
        $this->picture = $picture;  
 
    }   



}

?>