<?php
App::uses('FlujosUser', 'Model');

/**
 * FlujosUser Test Case
 */
class FlujosUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.flujos_user',
		'app.user',
		'app.flujo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FlujosUser = ClassRegistry::init('FlujosUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FlujosUser);

		parent::tearDown();
	}

}
