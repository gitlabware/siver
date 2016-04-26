<?php
App::uses('HojasRequisito', 'Model');

/**
 * HojasRequisito Test Case
 */
class HojasRequisitoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hojas_requisito',
		'app.hojas_ruta',
		'app.cliente',
		'app.user',
		'app.requisito'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HojasRequisito = ClassRegistry::init('HojasRequisito');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HojasRequisito);

		parent::tearDown();
	}

}
