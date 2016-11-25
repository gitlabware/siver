<?php
App::uses('FlujosUsersAsesore', 'Model');

/**
 * FlujosUsersAsesore Test Case
 */
class FlujosUsersAsesoreTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.flujos_users_asesore',
		'app.flujos_user',
		'app.user',
		'app.flujo',
		'app.adjunto',
		'app.tarea',
		'app.proceso',
		'app.regione',
		'app.hojas_ruta',
		'app.cliente'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FlujosUsersAsesore = ClassRegistry::init('FlujosUsersAsesore');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FlujosUsersAsesore);

		parent::tearDown();
	}

}
