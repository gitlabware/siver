<?php

class FlujosController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Flujo', 'Proceso', 'FlujosUser');

  public function index() {
    $flujos = $this->Flujo->find('all', array(
      'recursive' => -1,
      'order' => 'modified DESC'
    ));
    $this->set(compact('flujos'));
  }

  public function flujo($idFlujo = null) {
    $this->layout = 'ajax';
    if (!empty($this->request->data['Flujo'])) {
      $this->Flujo->create();
      $this->Flujo->save($this->request->data['Flujo']);
      $this->Session->setFlash("Se ha registrado correctamente el flujo!!", 'msgbueno');
      $this->redirect($this->referer());
    }
    $this->Flujo->id = $idFlujo;
    $this->request->data = $this->Flujo->read();
    $this->request->data['Flujo']['user_id'] = $this->Session->read('Auth.User.id');
  }

  public function accion_flujo($idFlujo = null) {
    $flujo = $this->Flujo->find('first', array(
      'recuusive' => -1,
      'conditions' => array('Flujo.id' => $idFlujo)
    ));
    $procesos = $this->Proceso->find('all', array(
      'recursive' => -1,
      'conditions' => array('Proceso.flujo_id' => $idFlujo),
      'order' => array('Proceso.id')
    ));
    $flujos = $this->FlujosUser->find('all', array(
      'recursive' => 0,
      'conditions' => array('FlujosUser.flujo_id' => $idFlujo),
      'fields' => array('Flujo.*', 'User.*', 'FlujosUser.*')
    ));
    $this->set(compact('flujo', 'procesos', 'flujos'));
  }

  public function eliminar($idFlujo = null) {
    $this->Flujo->delete($idFlujo);
    $this->Proceso->deleteAll(array('Proceso.flujo_id' => $idFlujo));
    $this->Session->setFlash("Se ha eliminado correctamente el flujo y sus procesos...!!", 'msgbueno');
    $this->redirect(array('action' => 'index'));
  }

  public function iniciar_flujo($idFlujo = null) {
    $this->layout = 'ajax';
    if (!empty($this->request->data['FlujosUser'])) {
      $this->FlujosUser->create();
      $d_flujo['descripcion'] = $this->request->data['FlujosUser']['descripcion'];
      $d_flujo['flujo_id'] = $idFlujo;
      $d_flujo['user_id'] = $this->Session->read('Auth.User.id');
      $this->FlujosUser->save($d_flujo);
      $idFlujoUser = $this->FlujosUser->getLastInsertID();
      $this->redirect(array('action' => 'enflujo', $idFlujoUser));
    }
    
  }

  public function enflujo($idFlujoUser = null) {
    $flujo = $this->FlujosUser->find('first', array(
      'recursive' => 0,
      'conditions' => array('FlujosUser.id' => $idFlujoUser),
      'fields' => array('Flujo.*')
    ));
    $procesos = $this->Proceso->find('all', array(
      'recursive' => -1,
      'conditions' => array('Proceso.flujo_id' => $flujo['Flujo']['id'])
    ));
    $this->set(compact('flujo', 'procesos'));
  }

}
