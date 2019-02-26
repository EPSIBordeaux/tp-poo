<?php

namespace Example;

class VisibilityExample {
	
	private $private_attribute;
	protected $protected_attribute;
	public $public_attribute;

	public function __construct($private, $protected, $public){
		$this->private_attribute = $private;
		$this->protected_attribute = $protected;
		$this->public_attribute = $public;
	}

	private function privateMethod() {
		return "I'm a private method";
	}

	protected function protectedMethod() {
		return "I'm a protected method";
	}

	public function publicMethod() {
		return "I'm a public method";
	}
}