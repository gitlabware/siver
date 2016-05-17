<?php
App::uses('FlujosUsersTributo', 'Model');

/**
 * FlujosUsersTributo Test Case
 */
class FlujosUsersTributoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.flujos_users_tributo',
		'app.flujos_user',
		'app.user',
		'app.flujo',
		'app.adjunto',
		'app.tarea',
		'app.proceso',
		'app.regione',
		'app.hojas_ruta',
		'app.cliente',
		'app.tributo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FlujosUsersTributo = ClassRegistry::init('FlujosUsersTributo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FlujosUsersTributo);

		parent::tearDown();
	}

}
