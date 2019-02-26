<?php

namespace Example\Tests;

use Example\HeritageExample;

use PHPUnit\Framework\TestCase;

class HeritageExampleTest extends TestCase {

	protected $instance;

    public function setUp() {
        $this->instance = new HeritageExample("privé", "protégé", "publique");
	}

	/**
	 * @expectedException Error
	 * @expectedExceptionMessage Call to private method Example\VisibilityExample::privateMethod() from context 'Example\HeritageExample'
	 */
	public function testParentPrivateMethodAccessibilty() {
		// Le code de ce test génère une erreur php avec le message :
		// 'Call to private method Example\VisibilityExample::privateMethod() from context 'Example\HeritageExample'
		// Car nous essayons d'accéder à une methode privé depuis l'exterieur de la classe
		$privateMethod = $this->instance->callMyParentPrivateMethod();
	}
	
	public function testParentProtectedMethodAccessibilty() {
		// Le code de ce test ne génère aucune erreur, car nous tentons
		// d'acceder a une méthode protégée, donc accéssible depuis
		// une classe fille
		$protectedMethod = $this->instance->callMyParentProtectedMethod();
		$this->assertEquals($protectedMethod, "I'm a protected method");
	}

	public function testParentProtectedAttributeAccessibilty() {
		// Le code de ce test ne génère aucune erreur, car nous tentons
		// d'acceder a un attribut protégé, donc accéssible depuis
		// une classe fille
		$protectedAttribute = $this->instance->getMyParentProtectedAttribute();
		$this->assertEquals($protectedAttribute, "protégé");
	}

	public function testParentPublicMethodAccessibilty() {
		// Le code de ce test ne génère aucune erreur, car nous tentons
		// d'acceder a une méthode publique, donc accéssible depuis
		// l'exterieur de la classe
		$protectedMethod = $this->instance->callMyParentPublicMethod();
		$this->assertEquals($protectedMethod, "I'm a public method");
	}

	public function testParentPublicAttributeAccessibilty() {
		// Le code de ce test ne génère aucune erreur, car nous tentons
		// d'acceder a un attribut publique, donc accéssible depuis
		// l'exterieur de la classe
		$protectedAttribute = $this->instance->getMyParentPublicAttribute();
		$this->assertEquals($protectedAttribute, "publique");
	}
}