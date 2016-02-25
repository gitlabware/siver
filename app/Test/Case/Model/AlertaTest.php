<?php
App::uses('Alerta', 'Model');

/**
 * Alerta Test Case
 */
class AlertaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Alerta = ClassRegistry::init('Alerta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Alerta);

		parent::tearDown();
	}

}
