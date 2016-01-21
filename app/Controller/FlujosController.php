<?php

class FlujosController extends AppController{
  public $layout = 'svergara';
  public $uses = array('Flujo','Proceso');


  public function index(){
    $flujos = $this->Flujo->find('all',array(
      'recursive' => -1,
      'order' => 'modified DESC'
    ));
    $this->set(compact('flujos'));
  }
  
  public function flujo($idFlujo = null){
    $this->layout = 'ajax';
    if(!empty($this->request->data['Flujo'])){
      $this->Flujo->create();
      $this->Flujo->save($this->request->data['Flujo']);
      $this->Session->setFlash("Se ha registrado correctamente el flujo!!",'msgbueno');
      $this->redirect($this->referer());
    }
    $this->Flujo->id = $idFlujo;
    $this->request->data = $this->Flujo->read();
    $this->request->data['Flujo']['user_id'] = $this->Session->read('Auth.User.id');
  }
  
  public function accion_flujo($idFlujo = null){
    $flujo = $this->Flujo->find('first',array(
      'recuusive' => -1,
      'conditions' => array('Flujo.id' => $idFlujo)
    ));
    $procesos = $this->Proceso->find('all',array(
      'recursive' => -1,
      'conditions' => array('Proceso.flujo_id' => $idFlujo),
      'order' => array('Proceso.id')
    ));
    $this->set(compact('flujo','procesos'));
  }
}