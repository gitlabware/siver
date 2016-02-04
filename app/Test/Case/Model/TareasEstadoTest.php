<?php
App::uses('TareasEstado', 'Model');

/**
 * TareasEstado Test Case
 */
class TareasEstadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tareas_estado',
		'app.user',
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
		$this->TareasEstado = ClassRegistry::init('TareasEstado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TareasEstado);

		parent::tearDown();
	}

}
