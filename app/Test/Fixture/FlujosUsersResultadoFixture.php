<?php
/**
 * FlujosUsersResultado Fixture
 */
class FlujosUsersResultadoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'flujos_user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'resultado_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'respuesta' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'flujos_user_id' => 1,
			'resultado_id' => 1,
			'respuesta' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-04-28 18:05:27',
			'modified' => '2016-04-28 18:05:27'
		),
	);

}
