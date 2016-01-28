<?php

class TareasController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Tarea', 'User', 'Proceso', 'FlujosUser', 'ProcesosEstado');

  public function tarea($idFlujoUser = null, $idProceso = null, $idTarea = null) {

    if (!empty($this->request->data['Tarea'])) {
      $this->Tarea->create();
      $this->Tarea->save($this->request->data['Tarea']);
      $this->Session->setFlash("Se ha registrado correctamente la tarea!!", 'msgbueno');
      $this->redirect(array('controller' => 'Procesos', 'action' => 'ver_proceso', $idFlujoUser, $idProceso));
    }

    $idUser = $this->Session->read('Auth.User.id');
    $usuarios = $this->User->find('list', array(
      'recursive' => -1,
      'conditions' => array('User.id !=' => $idUser),
      'fields' => array('User.id', 'User.nombre_completo')
    ));
    $proceso = $this->Proceso->findByid($idProceso, null, null, -1);
    $flujo = $this->FlujosUser->findByid($idFlujoUser, null, null, -1);
    if (!empty($idTarea)) {
      $this->Tarea->id = $idTarea;
      $this->request->data = $this->Tarea->read();
    } else {
      $this->request->data['Tarea']['fecha_inicio'] = date('Y-m-d');

      $p_estado = $this->ProcesosEstado->find('first', array(
        'recursive' => -1,
        'conditions' => array('ProcesosEstado.proceso_id' => $idProceso, 'ProcesosEstado.flujos_user_id' => $idFlujoUser, 'ProcesosEstado.estado LIKE' => 'Activo'),
        'fields' => array('ProcesosEstado.created'),
        'order' => array('ProcesosEstado.id DESC')
      ));
      if (!empty($p_estado['ProcesosEstado']['created']) && !empty($proceso['Proceso']['tiempo'])) {
        $fecha = $p_estado['ProcesosEstado']['created'];
        $dias = $proceso['Proceso']['tiempo'];
        $dias--;
        $nuevafecha = strtotime("+$dias day", strtotime($fecha));
        $nuevafecha = date('Y-m-j', $nuevafecha);
        if ($nuevafecha >= date('Y-m-d')) {
          $this->request->data['Tarea']['fecha_fin'] = $nuevafecha;
        }
      }
    }
    //debug($proceso);exit;
    $this->set(compact('usuarios', 'proceso', 'flujo'));
  }

  public function calendario() {
    
  }
  
  public function get_tarea($idTarea = null){
    return $this->Tarea->find('first',array(
      'recursive' => 0,
      'conditions' => array('Tarea.id' => $idTarea),
      'fields' => array('Tarea.*','Asignado.nombre_completo')
    ));
  }

}
