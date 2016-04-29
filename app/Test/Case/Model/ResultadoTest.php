<?php
App::uses('Resultado', 'Model');

/**
 * Resultado Test Case
 */
class ResultadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.resultado',
		'app.flujo',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Resultado = ClassRegistry::init('Resultado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Resultado);

		parent::tearDown();
	}

}
