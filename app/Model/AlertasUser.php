<?php
App::uses('AppModel', 'Model');
/**
 * AlertasUser Model
 *
 * @property Alerta $Alerta
 * @property User $User
 */
class AlertasUser extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Alerta' => array(
			'className' => 'Alerta',
			'foreignKey' => 'alerta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
