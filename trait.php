<?php
trait Delivery{
	
	public function getDelivery(){
		if(isset($this->discount)) $this->delivery = 300;
		return $this->delivery;
	}
}


?>