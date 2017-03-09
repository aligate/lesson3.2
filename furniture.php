<?php
require_once 'product.php';
require_once 'trait.php';

class Furniture extends Product
{
	
	use Delivery;
	
	public function __construct($price, $weight)
	{
		parent::__construct($price, $weight);
		if($this->weight > 10) $this->discount = 10;
		
	}
	public function getPrice(){
		if($this->discount) $this->price = round($this->price -($this->price * $this->discount /100));
		return $this->price;
	}
	
}

$furn = new Furniture(80, 11);
echo $furn->getPrice();
echo '<br>';
echo $furn->getDelivery();

?>