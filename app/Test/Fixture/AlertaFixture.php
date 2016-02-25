<?php
/**
 * Alerta Fixture
 */
class AlertaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'flujos_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'proceso_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'mensaje' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'tipo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'estado' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fecha_vencimiento' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'fecha_activacion' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'flujos_user_id' => 1,
			'proceso_id' => 1,
			'mensaje' => 'Lorem ipsum dolor sit amet',
			'tipo' => 'Lorem ipsum dolor sit amet',
			'estado' => 'Lorem ipsum dolor sit amet',
			'fecha_vencimiento' => '2016-02-25 18:06:34',
			'fecha_activacion' => '2016-02-25 18:06:34',
			'created' => '2016-02-25 18:06:34',
			'modified' => '2016-02-25 18:06:34'
		),
	);

}
