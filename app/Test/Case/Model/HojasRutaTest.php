<?php
App::uses('HojasRuta', 'Model');

/**
 * HojasRuta Test Case
 */
class HojasRutaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hojas_ruta',
		'app.cliente',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->HojasRuta = ClassRegistry::init('HojasRuta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->HojasRuta);

		parent::tearDown();
	}

}
