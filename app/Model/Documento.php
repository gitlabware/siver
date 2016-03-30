<?php
App::uses('AppModel', 'Model');
/**
 * Documento Model
 *
 * @property Adjunto $Adjunto
 * @property User $User
 * @property FlujosUser $FlujosUser
 */
class Documento extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Adjunto' => array(
			'className' => 'Adjunto',
			'foreignKey' => 'adjunto_id',
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
		),
		'FlujosUser' => array(
			'className' => 'FlujosUser',
			'foreignKey' => 'flujos_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
