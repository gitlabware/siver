<?php
App::uses('AppModel', 'Model');
/**
 * Resultado Model
 *
 * @property Flujo $Flujo
 */
class Resultado extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Flujo' => array(
			'className' => 'Flujo',
			'foreignKey' => 'flujo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
