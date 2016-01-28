<?php
/**
 * Tarea Fixture
 */
class TareaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'asignado_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'fecha_inicio' => array('type' => 'date', 'null' => true, 'default' => null),
		'fecha_fin' => array('type' => 'date', 'null' => true, 'default' => null),
		'prioridad' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'porcentaje' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 5, 'unsigned' => false),
		'descripcion' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'proceso_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'flujos_user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'asignado_id' => 1,
			'fecha_inicio' => '2016-01-27',
			'fecha_fin' => '2016-01-27',
			'prioridad' => 'Lorem ipsum dolor sit amet',
			'porcentaje' => 1,
			'descripcion' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'proceso_id' => 1,
			'flujos_user_id' => 1,
			'created' => '2016-01-27 22:41:17',
			'modified' => '2016-01-27 22:41:17'
		),
	);

}
