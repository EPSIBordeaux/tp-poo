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
}