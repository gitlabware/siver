<?php
App::uses('ProcesosEstado', 'Model');

/**
 * ProcesosEstado Test Case
 */
class ProcesosEstadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.procesos_estado',
		'app.user',
		'app.flujos_user',
		'app.flujo',
		'app.proceso'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProcesosEstado = ClassRegistry::init('ProcesosEstado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProcesosEstado);

		parent::tearDown();
	}

}
