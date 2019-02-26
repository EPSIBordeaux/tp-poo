<?php

namespace Example;

use Example\VisibilityExample;

class HeritageExample extends VisibilityExample {
	
	public function __construct($private, $protected, $public){
		parent::__construct($private,$protected,$public);
	}

	public function callMyParentPrivateMethod() {
		return parent::privateMethod();
	}

	public function getMyParentProtectedAttribute() {
		return $this->protected_attribute;
	}
	
	public function callMyParentProtectedMethod() {
		return parent::protectedMethod();
	}

	public function getMyParentPublicAttribute() {
		return $this->public_attribute;
	}

	public function callMyParentPublicMethod() {
		return parent::publicMethod();
	}

	
}