<?php
App::uses('UsersVisible', 'Model');

/**
 * UsersVisible Test Case
 */
class UsersVisibleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.users_visible',
		'app.user',
		'app.adjunto',
		'app.tarea',
		'app.proceso',
		'app.flujo',
		'app.flujos_user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsersVisible = ClassRegistry::init('UsersVisible');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsersVisible);

		parent::tearDown();
	}

}
