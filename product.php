<?php 

abstract class Product{

protected $price;
protected $weight;
protected $delivery = 250;
protected $discount = null;

public function __construct($price, $weight){
	
	$this->price = $price;
	$this->weight = $weight;
	}
	
 
}

?>