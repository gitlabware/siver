<?php
App::uses('AppModel', 'Model');
/**
 * UsersVisible Model
 *
 * @property User $User
 * @property Adjunto $Adjunto
 */
class UsersVisible extends AppModel {


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
		'Adjunto' => array(
			'className' => 'Adjunto',
			'foreignKey' => 'adjunto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
