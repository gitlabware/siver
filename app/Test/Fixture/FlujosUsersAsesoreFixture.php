<?php
/**
 * FlujosUsersAsesore Fixture
 */
class FlujosUsersAsesoreFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'flujos_user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'asesor_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'asesor_id' => 1,
			'created' => '2016-11-21 18:33:54',
			'modified' => '2016-11-21 18:33:54'
		),
	);

}
