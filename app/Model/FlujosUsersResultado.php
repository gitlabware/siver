<?php
App::uses('AppModel', 'Model');
/**
 * FlujosUsersResultado Model
 *
 * @property FlujosUser $FlujosUser
 * @property Resultado $Resultado
 */
class FlujosUsersResultado extends AppModel {


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
		'Resultado' => array(
			'className' => 'Resultado',
			'foreignKey' => 'resultado_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
