<?php

class ProcesosController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Proceso', 'ProcesosCondicione');

  public function proceso($idFlujo = null, $idProceso = null) {
    $this->layout = 'ajax';
    if (!empty($this->request->data['Proceso'])) {
      $this->Proceso->create();
      $this->Proceso->save($this->request->data['Proceso']);
      $this->Session->setFlash('Se ha registrado correctamente el registro!!', 'msgbueno');
      $this->redirect($this->referer());
    }
    $this->Proceso->id = $idProceso;
    $this->request->data = $this->Proceso->read();
    $this->request->data['Proceso']['flujo_id'] = $idFlujo;
    $this->request->data['Proceso']['user_id'] = $this->Session->read('Auth.User.id');
  }

  public function condiciones($idFlujo = null, $idProceso = NULL) {
    $this->layout = 'ajax';
    $condiciones_l = $this->ProcesosCondicione->find('list', array(
      'recursive' => -1,
      'conditions' => array(
        'ProcesosCondicione.proceso_id' => $idProceso
      ),
      'fields' => array('ProcesosCondicione.id', 'ProcesosCondicione.condicion_id')
    ));
    $condiciones = array();
    $condiciones['Proceso.flujo_id'] = $idFlujo;
    //$condiciones['Proceso.id !='] = $idProceso;
    array_push($condiciones_l, $idProceso);
    if (!empty($condiciones_l)) {
      if(count($condiciones_l) > 1){
        $condiciones['Proceso.id NOT IN'] = $condiciones_l;
      }else{
        $condiciones['Proceso.id !='] = $condiciones_l;
      }
    }
    $opciones = $this->Proceso->find('list', array(
      'recursive' => -1,
      'conditions' => $condiciones,
      'fields' => array('Proceso.id', 'Proceso.nombre')
    ));

    $proceso = $this->Proceso->find('first', array(
      'recursive' => -1,
      'conditions' => array(
        'Proceso.id' => $idProceso
      )
    ));
    
    $condiciones_g = $this->ProcesosCondicione->find('all',array(
      'recursive' => 0,
      'conditions' => array('ProcesosCondicione.proceso_id' => $idProceso),
      'fields' => array('Condicion.nombre','ProcesosCondicione.*')
    ));
    $this->set(compact('opciones', 'proceso','condiciones_g'));
  }
  
  public function registra_condicion(){
    if(!empty($this->request->data['ProcesosCondicione'])){
      $this->ProcesosCondicione->create();
      $this->ProcesosCondicione->save($this->request->data['ProcesosCondicione']);
    }
    exit;
  }
  
  public function eliminar_cond($idProcCond = null){
    $this->ProcesosCondicione->delete($idProcCond);
    exit;
  }

}
