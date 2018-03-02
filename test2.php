<?php
interface iRectangularParallelepiped{
	public function getHeight();
	public function getWidth();
	public function getLength();
}

abstract class Registrator{
	
	private $allowed = array('getVolume');
	private $calculator;
	 
	public function __call($method_name, $args){
		if(in_array($method_name, $this->allowed)){
			return $this->calculator->$method_name($this);
		}
	}
	
	public function registerExt($cls){
		$this->calculator = $cls;
	}
}

class GarbageContainer extends Registrator implements iRectangularParallelepiped{
	public function __construct(){
		$this->registerExt(new VolumeCalculator);
	}
	
	public function getHeight(){
		return 10;
	}
	public function getWidth(){
		return 5;
	}
	public function getLength(){
		return 3;
	}

}

class Brick extends Registrator implements iRectangularParallelepiped{
	public function __construct(){
		$this->registerExt(new VolumeCalculator);
	}
	
	public function getHeight(){
		return 1;
	}
	public function getWidth(){
		return 2;
	}
	public function getLength(){
		return 3;
	}
	//...a lot of methods
}
		

class VolumeCalculator{
	public function getVolume($obj){
		return $obj->getHeight() * $obj->getLength() * $obj->getWidth();
	}
}


$gc = new GarbageContainer();
$b = new Brick();
echo $gc->getVolume().'⟨br⟩';
echo $b->getVolume();

