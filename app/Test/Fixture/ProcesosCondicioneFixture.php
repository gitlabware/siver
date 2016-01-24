<?php
/**
 * ProcesosCondicione Fixture
 */
class ProcesosCondicioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'proceso_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'condicion_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'tipo' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modififed' => array('type' => 'datetime', 'null' => true, 'default' => null),
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
			'proceso_id' => 1,
			'condicion_id' => 1,
			'tipo' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-01-23 16:22:01',
			'modififed' => '2016-01-23 16:22:01'
		),
	);

}
