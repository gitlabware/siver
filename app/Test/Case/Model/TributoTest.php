<?php
App::uses('Tributo', 'Model');

/**
 * Tributo Test Case
 */
class TributoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tributo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tributo = ClassRegistry::init('Tributo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tributo);

		parent::tearDown();
	}

}
