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

// Создаем Класс сумок
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


// Класс мебели
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

// Класс книги
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

// Трейт
trait Delivery{
	
	public function getDelivery(){
		if(isset($this->discount)) $this->delivery = 300;
		return $this->delivery;
	}
}




?>
