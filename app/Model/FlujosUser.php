<?php
App::uses('AppModel', 'Model');
/**
 * FlujosUser Model
 *
 * @property User $User
 * @property Flujo $Flujo
 */
class FlujosUser extends AppModel {


  
  
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
		'Flujo' => array(
			'className' => 'Flujo',
			'foreignKey' => 'flujo_id',
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
  
  
  
  
  public $validate = array(
        'descripcion' => array(
            'limitDuplicates' => array(
                'rule' => array('limitDuplicates', 1),
                'message' => 'Ya existe un flujo con la misma descripcion!!'
            )
        )
    );
    
    public function limitDuplicates($check, $limit) {
        // $check will have value: array('promotion_code' => 'some-value')
        // $limit will have value: 25
        if(!empty($check['descripcion']))
        {
            if(!empty($this->data['FlujosUser']['id']))
            {
                $check['FlujosUser.id !='] = $this->data['FlujosUser']['id'];
            }
            $existingPromoCount = $this->find('count', array(
                'conditions' => $check,
                'recursive' => -1
            ));
            return $existingPromoCount < $limit;
        }
        else{
            return TRUE;
        }
        
    }
}
