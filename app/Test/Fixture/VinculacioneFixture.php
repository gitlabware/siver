<?php
/**
 * Vinculacione Fixture
 */
class VinculacioneFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'adjunto_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'flujos_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'proceso_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'tarea_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'user_id' => 1,
			'adjunto_id' => 1,
			'flujos_user_id' => 1,
			'proceso_id' => 1,
			'tarea_id' => 1,
			'created' => '2016-02-20 17:18:11',
			'modified' => '2016-02-20 17:18:11'
		),
	);

}
