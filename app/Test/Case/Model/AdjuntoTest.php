<?php
App::uses('Adjunto', 'Model');

/**
 * Adjunto Test Case
 */
class AdjuntoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.adjunto',
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
		$this->Adjunto = ClassRegistry::init('Adjunto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Adjunto);

		parent::tearDown();
	}

}
