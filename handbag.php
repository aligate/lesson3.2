<?php
require_once 'product.php';
require_once 'trait.php';

class Handbag extends Product
{
	use Delivery;
	
	protected $discount = 10;
	
	public function __construct($price, $weight){
		parent::__construct($price, $weight);
		$this->price = round($this->price -($this->price * $this->discount /100));
		
	}
	public function getPrice(){
		return $this->price;
	}
}

$handbag = new Handbag(100, 1);
echo $handbag->getPrice();
echo '<br>';
echo $handbag->getDelivery();

?>