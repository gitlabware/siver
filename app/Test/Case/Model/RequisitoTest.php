<?php
App::uses('Requisito', 'Model');

/**
 * Requisito Test Case
 */
class RequisitoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.requisito'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Requisito = ClassRegistry::init('Requisito');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Requisito);

		parent::tearDown();
	}

}
