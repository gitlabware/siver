<?php
App::uses('FlujosUsersResultado', 'Model');

/**
 * FlujosUsersResultado Test Case
 */
class FlujosUsersResultadoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.flujos_users_resultado',
		'app.flujos_user',
		'app.user',
		'app.flujo',
		'app.adjunto',
		'app.tarea',
		'app.proceso',
		'app.cliente',
		'app.regione',
		'app.hojas_ruta',
		'app.resultado'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->FlujosUsersResultado = ClassRegistry::init('FlujosUsersResultado');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->FlujosUsersResultado);

		parent::tearDown();
	}

}
