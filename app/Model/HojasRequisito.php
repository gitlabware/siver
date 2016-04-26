<?php
App::uses('AppModel', 'Model');
/**
 * HojasRequisito Model
 *
 * @property HojasRuta $HojasRuta
 * @property Requisito $Requisito
 * @property User $User
 */
class HojasRequisito extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'HojasRuta' => array(
			'className' => 'HojasRuta',
			'foreignKey' => 'hojas_ruta_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Requisito' => array(
			'className' => 'Requisito',
			'foreignKey' => 'requisito_id',
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
