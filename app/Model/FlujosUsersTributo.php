<?php
App::uses('AppModel', 'Model');
/**
 * FlujosUsersTributo Model
 *
 * @property FlujosUser $FlujosUser
 * @property Tributo $Tributo
 */
class FlujosUsersTributo extends AppModel {


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
		'Tributo' => array(
			'className' => 'Tributo',
			'foreignKey' => 'tributo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
