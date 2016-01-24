<?php
App::uses('ProcesosCondicione', 'Model');

/**
 * ProcesosCondicione Test Case
 */
class ProcesosCondicioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.procesos_condicione',
		'app.user',
		'app.proceso',
		'app.flujo',
		'app.condicion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ProcesosCondicione = ClassRegistry::init('ProcesosCondicione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ProcesosCondicione);

		parent::tearDown();
	}

}
