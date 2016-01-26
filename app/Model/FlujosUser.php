<?php
App::uses('AppModel', 'Model');
/**
 * FlujosUser Model
 *
 * @property User $User
 * @property Flujo $Flujo
 */
class FlujosUser extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Flujo' => array(
			'className' => 'Flujo',
			'foreignKey' => 'flujo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
