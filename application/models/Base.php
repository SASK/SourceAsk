<?php
class Base{
	private $name='sfds';

	public function toArray(){
		return get_class_vars(__CLASS__);
	}
}
/*
$base = new Base();
var_dump($base->toArray());
*/
?>