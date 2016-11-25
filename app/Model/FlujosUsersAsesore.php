<?php
App::uses('AppModel', 'Model');
/**
 * FlujosUsersAsesore Model
 *
 * @property FlujosUser $FlujosUser
 * @property Asesor $Asesor
 */
class FlujosUsersAsesore extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FlujosUser' => array(
			'className' => 'FlujosUser',
			'foreignKey' => 'flujos_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Asesor' => array(
			'className' => 'User',
			'foreignKey' => 'asesor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
