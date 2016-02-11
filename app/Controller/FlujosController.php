<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class FlujosController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Flujo', 'Proceso', 'FlujosUser', 'ProcesosCondicione', 'ProcesosEstado');

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
    $this->set(compact('flujo', 'procesos', 'idFlujo'));
  }

  public function accion_flujo_m($idFlujo = null) {
    $this->layout = 'ajax';
    $flujos = $this->FlujosUser->find('all', array(
      'recursive' => 0,
      'conditions' => array('FlujosUser.flujo_id' => $idFlujo),
      'fields' => array('Flujo.*', 'User.*', 'FlujosUser.*')
    ));
    $this->set(compact('flujos'));
  }

  public function accion_flujo_d($idFlujo = null) {
    $this->layout = 'ajax';
    $flujos = $this->FlujosUser->find('all', array(
      'recursive' => 0,
      'conditions' => array('FlujosUser.flujo_id' => $idFlujo),
      'fields' => array('Flujo.*', 'User.*', 'FlujosUser.*'),
      'order' => array('FlujosUser.created DESC')
    ));
    $this->set(compact('flujos'));
  }

  public function eliminar($idFlujo = null) {
    $this->Flujo->delete($idFlujo);
    $this->Proceso->deleteAll(array('Proceso.flujo_id' => $idFlujo));
    $this->Session->setFlash("Se ha eliminado correctamente el flujo y sus procesos...!!", 'msgbueno');
    $this->redirect(array('action' => 'index'));
  }

  public function iniciar_flujo($idFlujo = null, $idFlujosUser = null) {
    $this->layout = 'ajax';
    if (!empty($this->request->data['FlujosUser'])) {
      $this->FlujosUser->create();
      $d_flujo['descripcion'] = $this->request->data['FlujosUser']['descripcion'];
      $d_flujo['flujo_id'] = $idFlujo;
      $d_flujo['user_id'] = $this->Session->read('Auth.User.id');
      $this->FlujosUser->save($d_flujo);
      $idFlujoUser = $this->FlujosUser->getLastInsertID();

      $folder = new Folder();
      if ($folder->create(WWW_ROOT . 'files' . DS . $d_flujo['descripcion'])) {
// Successfully created the nested folders
      }

      $this->redirect(array('action' => 'enflujo', $idFlujoUser));
    }
    if (!empty($idFlujosUser)) {
      $this->FlujosUser->id = $idFlujosUser;
      $this->request->data = $this->FlujosUser->read();
    }
  }

  public function enflujo($idFlujoUser = null) {
    $flujo = $this->FlujosUser->find('first', array(
      'recursive' => 0,
      'conditions' => array('FlujosUser.id' => $idFlujoUser),
      'fields' => array('Flujo.*', 'FlujosUser.*')
    ));
    $this->update_proceso_est($flujo['Flujo']['id'], $idFlujoUser);
    $sql1 = "(SELECT pres.estado FROM procesos_estados pres WHERE pres.flujos_user_id = $idFlujoUser AND pres.proceso_id = Proceso.id ORDER BY pres.id DESC LIMIT 1)";
    $this->Proceso->virtualFields = array(
      'estado' => "$sql1"
    );
    $procesos = $this->Proceso->find('all', array(
      'recursive' => -1,
      'conditions' => array('Proceso.flujo_id' => $flujo['Flujo']['id'])
    ));
    /* debug($procesos);
      exit; */
    $this->set(compact('flujo', 'procesos'));
  }

  public function update_proceso_est($idFlujo = null, $idFlujoUser = null) {
    $sql1 = "(SELECT pres.estado FROM procesos_estados pres WHERE pres.flujos_user_id = $idFlujoUser AND pres.proceso_id = Proceso.id ORDER BY pres.id LIMIT 1)";
    $this->Proceso->virtualFields = array(
      'estado' => "$sql1"
    );
    $procesos = $this->Proceso->find('all', array(
      'recursive' => -1,
      'conditions' => array('Proceso.flujo_id' => $idFlujo)
    ));
    foreach ($procesos as $pro) {
      if (empty($pro['Proceso']['estado'])) {
        $condiciones_nec = $this->ProcesosCondicione->find('all', array(
          'recursive' => -1,
          'conditions' => array('ProcesosCondicione.proceso_id' => $pro['Proceso']['id'], 'ProcesosCondicione.tipo LIKE' => 'Necesario')
        ));
        $condiciones_opc = $this->ProcesosCondicione->find('all', array(
          'recursive' => -1,
          'conditions' => array('ProcesosCondicione.proceso_id' => $pro['Proceso']['id'], 'ProcesosCondicione.tipo LIKE' => 'Opcional')
        ));
        $habilitar = TRUE;
        if (!empty($condiciones_nec)) {
          foreach ($condiciones_nec as $con) {
            $verifica = $this->ProcesosEstado->find('first', array(
              'recursive' => -1,
              'conditions' => array('ProcesosEstado.flujos_user_id' => $idFlujoUser, 'ProcesosEstado.proceso_id' => $con['ProcesosCondicione']['condicion_id'], 'ProcesosEstado.estado LIKE' => 'Finalizado'),
              'fields' => array('ProcesosEstado.id'),
              'order' => array('ProcesosEstado.id DESC')
            ));
            if (empty($verifica)) {
              $habilitar = FALSE;
            }
          }
        }
        if (!empty($condiciones_opc)) {
          $cantidad = 0;
          foreach ($condiciones_opc as $con) {
            $verifica = $this->ProcesosEstado->find('first', array(
              'recursive' => -1,
              'conditions' => array('ProcesosEstado.flujos_user_id' => $idFlujoUser, 'ProcesosEstado.proceso_id' => $con['ProcesosCondicione']['condicion_id'], 'ProcesosEstado.estado LIKE' => 'Finalizado'),
              'fields' => array('ProcesosEstado.id'),
              'order' => array('ProcesosEstado.id DESC')
            ));
            if (!empty($verifica)) {
              $cantidad++;
            }
          }
          if ($cantidad == 0) {
            $habilitar = FALSE;
          }
        }
        if ($habilitar) {
          $d_proest['user_id'] = 0;
          $d_proest['flujos_user_id'] = $idFlujoUser;
          $d_proest['proceso_id'] = $pro['Proceso']['id'];
          $d_proest['estado'] = 'Activo';
          $this->ProcesosEstado->create();
          $this->ProcesosEstado->save($d_proest);
        }
      } elseif (!empty($pro['Proceso']['tiempo'])) {
        
      }
    }
  }

  public function eliminar_e_flujo($idFlujoUser = null) {
    $this->FlujosUser->delete($idFlujoUser);
    $this->Session->setFlash("Se ha eliminado correctamente el flujo!!", 'msgbueno');
    $this->redirect(array('action' => 'index'));
  }

}
