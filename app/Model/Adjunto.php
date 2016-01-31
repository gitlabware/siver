<?php
App::uses('AppModel', 'Model');
/**
 * Adjunto Model
 *
 * @property User $User
 * @property Tarea $Tarea
 * @property Proceso $Proceso
 * @property FlujosUser $FlujosUser
 */
class Adjunto extends AppModel {


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
		'Tarea' => array(
			'className' => 'Tarea',
			'foreignKey' => 'tarea_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Proceso' => array(
			'className' => 'Proceso',
			'foreignKey' => 'proceso_id',
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
