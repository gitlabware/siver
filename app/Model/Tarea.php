<?php
App::uses('AppModel', 'Model');
/**
 * Tarea Model
 *
 * @property User $User
 * @property Asignado $Asignado
 * @property Proceso $Proceso
 * @property FlujosUser $FlujosUser
 */
class Tarea extends AppModel {


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
		'Asignado' => array(
			'className' => 'User',
			'foreignKey' => 'asignado_id',
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
