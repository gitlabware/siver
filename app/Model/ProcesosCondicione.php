<?php
App::uses('AppModel', 'Model');
/**
 * ProcesosCondicione Model
 *
 * @property User $User
 * @property Proceso $Proceso
 * @property Condicion $Condicion
 */
class ProcesosCondicione extends AppModel {


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
		'Proceso' => array(
			'className' => 'Proceso',
			'foreignKey' => 'proceso_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Condicion' => array(
			'className' => 'Proceso',
			'foreignKey' => 'condicion_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
