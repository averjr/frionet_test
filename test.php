<?php
class Foo{
	
	protected $state = null;
	protected $level = null;
	
	public function setState($state){
		$this->state = $state;
	}
	public function setLevel($level){
		$this->level = $level;
	}
	
	//...more methods and props
	
	public function report(){
		echo 'State is ['.$this->state.'], level is ['.$this->level.']';
	}
	
}

class Decorator  {
	private $foo;
	public function __construct(Foo $foo) {
		$this->foo = $foo;
	}
	
	public function __call($method_name, $args) {
		$arg = isset($args[0])?"\"$args[0]\"":'';
		echo "log: before method {$method_name}, args [".$arg."]\n";
		
		ob_start();
		call_user_func_array(array($this->foo, $method_name), $args) ;
		$output = ob_get_contents();
		ob_end_clean();
		if($output){
			echo $output . "\n";
		}
		
		
		echo "log: after method {$method_name}\n";
		
	}
	
}



$f = new Decorator(new Foo());

$f->setState('empty');
$f->setLevel('5');
$f->report();


