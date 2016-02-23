<?php
App::uses('Vinculacione', 'Model');

/**
 * Vinculacione Test Case
 */
class VinculacioneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.vinculacione',
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
		$this->Vinculacione = ClassRegistry::init('Vinculacione');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Vinculacione);

		parent::tearDown();
	}

}
