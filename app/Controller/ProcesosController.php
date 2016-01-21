<?php

class ProcesosController extends AppController{
  
  public $layout = 'svergara';
  
  public $uses = array('Proceso');
  
  public function proceso($idFlujo = null,$idProceso = null){
    $this->layout = 'ajax';
    if(!empty($this->request->data['Proceso'])){
      $this->Proceso->create();
      $this->Proceso->save($this->request->data['Proceso']);
      $this->Session->setFlash('Se ha registrado correctamente el registro!!','msgbueno');
      $this->redirect($this->referer());
    }
    $this->Proceso->id = $idProceso;
    $this->request->data = $this->Proceso->read();
    $this->request->data['Proceso']['flujo_id'] = $idFlujo;
    $this->request->data['Proceso']['user_id'] = $this->Session->read('Auth.User.id');
  }
}