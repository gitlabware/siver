<?php
/**
 * FlujosUsersTributo Fixture
 */
class FlujosUsersTributoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'flujos_user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'tributo_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'estado' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 1, 'unsigned' => false),
		'periodo_fiscal' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'deuda_tributaria' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
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
			'tributo_id' => 1,
			'estado' => 1,
			'periodo_fiscal' => 'Lorem ipsum dolor sit amet',
			'deuda_tributaria' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-05-14 17:42:25',
			'modified' => '2016-05-14 17:42:25'
		),
	);

}
