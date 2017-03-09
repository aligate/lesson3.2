<?php
require_once 'product.php';

class Book extends Product
{
	
	public function __construct($price, $weight)
	{
		parent::__construct($price, $weight);
		
	}
	
	public function getPrice()
	{
		return $this->price;
	}
	
	public function getDelivery()
	{
		return $this->delivery;
	}
}
$book = new Book(300, 1);
echo $book->getPrice();
echo '<br>';
echo $book->getDelivery();


?>