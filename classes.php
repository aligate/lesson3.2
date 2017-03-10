<?php
header('Content-Type: text/html; charset=utf-8');

//Класс печатное издание

abstract class Readable{
	protected $page;
	protected $text;
	protected $image;
	protected $type='book';
	
	public function __construct($page, $image ,$text)
	{
		
		$this->page = $page;
		$this->image = $image;
		$this->text = $text;
		
	}
	
	
} 

class Book extends Readable
{
	
	protected $type='adultsbook';
	
	public function __construct($page, $image ,$text)
	{
		parent::__construct($page, $image ,$text);
		if($text == null) $this->type = 'childrenbook';
	}
	
	public function getType(){
		return $this->type;
	}
}

$book = new Book(200, 'picture', null);
echo $book->getType();
echo '<br>';

//Класс Человечество
abstract class HumanBeing{
	
	protected $hand = 2;
	
	protected $foot = 2;
	
	abstract function live();
	
}

//Объект - человек
class Man{
	
	protected $hand = 2;
	
	protected $foot = 2;
	
	protected $name;
	
	protected $gender;
	
	protected $age;
	
	
	public function __construct($name, $gender)
	{
		
		$this->name = $name;
		$this->gender = $gender;
		
	}
	
	public function live($age)
	{
		$this->age = $age;
		if($age==7) echo 'Пошел в первый класс';
		if($age==25) echo 'Создал семью';
		if($age==65) echo 'Ушел на персию';
	
	}
	
	
	
}

$man = new Man('Mike', 'male');
$man->live(65);


echo '<br>';
echo '<br>';
echo '<hr>';

// Класс Здание
abstract class Building{
	
	protected $walls = 4;
	protected $roof ;
	protected $floor;
	
	
	abstract function changeWall();
}
 
//Объект - дом
class House
{
	protected $type;
	
	public function changeWall($type)
	{
		$this->type = $type; 
		if($type=='circus') $this->walls = 1;
	}
}

$house = new House();
echo $house->walls;
echo '<br>';

$house->changeWall('circus');
echo 'Число стен у цирка -'.$house->walls;
echo '<hr>';
echo '<br>';

// Класс Транспортное средство
abstract class Vehicle{
	
	abstract function drive();
}

//Объект - автомобиль
class Auto
{
	 
	 protected $speed = 0;
	 protected $breakingDistance= 0;
	 
	 public function drive($tank = 'empty')
	 {
		 
		 if($tank=='full')
		 {
			 $this->speed = 200;
			 $this->breakingDistance = 120;
		 } 
		 if($tank=='little')
		 {
			$this->speed = 70;
			$this->breakingDistance = 30; 
		 }
	 }
			 
		 public function getSpeed(){
			 return $this->speed;
		 }	
		public function getBreakingDistance(){
			 return $this->breakingDistance;
		 }	 
	
		
	
}
$obj= new Auto();
echo $obj->getSpeed();
echo '<br>';
$obj->drive('little');
echo 'Тормозной путь - '.$obj->getBreakingDistance();
echo '<hr>';

// Класс член семьи
abstract class FamilyMember{
	
	protected $name;
	public function __construct( $name ){
		$this->name = $name;
	}
}

//Объект - дети
class Children extends FamilyMember {

 protected $name;

 public static $child = 0;

 

 public function __construct( $name ) 
 {
  parent::__construct($name);
  self::$child++;

 }

}
echo Children::$child;
echo '<br>';

$aMember = new Children( "Анна" );

echo Children::$child;
echo '<br>';

$anotherMember = new Children( "Кирилл" );

echo Children::$child;
echo '<br>';
echo '<hr>';



