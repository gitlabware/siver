<?php
App::uses('AlertasUser', 'Model');

/**
 * AlertasUser Test Case
 */
class AlertasUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.alertas_user',
		'app.alerta',
		'app.user',
		'app.flujos_user',
		'app.flujo',
		'app.adjunto',
		'app.tarea',
		'app.proceso'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AlertasUser = ClassRegistry::init('AlertasUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AlertasUser);

		parent::tearDown();
	}

}
