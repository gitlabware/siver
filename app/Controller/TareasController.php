<?php

class TareasController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Tarea', 'User', 'Proceso', 'FlujosUser', 'ProcesosEstado');
  public $components = array('RequestHandler');

  public function beforeFilter() {
    parent::beforeFilter();
    if ($this->RequestHandler->responseType() == 'json') {
      $this->RequestHandler->setContent('json', 'application/json');
    }
    //$this->Auth->allow();
  }

  function respond($message = null, $json = false) {
    if ($message != null) {
      if ($json == true) {
        $this->RequestHandler->setContent('json', 'application/json');
        $message = json_encode($message);
      }
      $this->set('message', $message);
    }
    $this->render('message');
  }

  public function tarea($idFlujoUser = null, $idProceso = null, $idTarea = null) {

    if (!empty($this->request->data['Tarea'])) {
      $this->request->data['Tarea']['fecha_inicio'] = $this->request->data['Tarea']['fechainicio'];
      $this->request->data['Tarea']['fecha_fin'] = $this->request->data['Tarea']['fechafin'];
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
      $this->request->data['Tarea']['fechainicio'] = $this->request->data['Tarea']['fecha_inicio'];
      $this->request->data['Tarea']['fechafin'] = $this->request->data['Tarea']['fecha_fin'];
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

  public function ver_tarea($idFlujoUser = null, $idProceso = null, $idTarea = null) {
    $tarea = $this->Tarea->find('first', array(
      'recursive' => 0,
      'conditions' => array('Tarea.id' => $idTarea),
      'fields' => array('Tarea.*', 'User.nombre_completo', 'Asignado.nombre_completo')
    ));
    $proceso = $this->Proceso->findByid($idProceso, null, null, -1);
    $flujo = $this->FlujosUser->findByid($idFlujoUser, null, null, -1);
    $this->set(compact('tarea', 'proceso', 'flujo'));
  }

  public function calendario() {
    $tareas_re = $this->Tarea->find('all', array(
      'recursive' => -1,
      'conditions' => array('Tarea.fecha_inicio !=' => NULL),
      'limit' => 5,
      'order' => array('Tarea.created DESC')
    ));
    $tareas_pe = $this->Tarea->find('all', array(
      'recursive' => -1,
      'conditions' => array('Tarea.fecha_inicio' => NULL, 'Tarea.fecha_fin' => NULL),
      'limit' => 5,
      'order' => array('Tarea.created DESC')
    ));
    $this->set(compact('tareas_re', 'tareas_pe'));
  }

  public function get_tarea($idTarea = null) {
    return $this->Tarea->find('first', array(
        'recursive' => 0,
        'conditions' => array('Tarea.id' => $idTarea),
        'fields' => array('Tarea.*', 'Asignado.nombre_completo')
    ));
  }

  public function eliminar($idTarea = null) {
    $this->Tarea->delete($idTarea);
    $this->Session->setFlash("Se ha eliminado correctamente la tarea!!!", 'msgbueno');
    $this->redirect($this->referer());
  }

  public function tarea_ajax() {
    $this->layout = 'ajax';
    if (!empty($this->request->data['Tarea'])) {
      $this->request->data['Tarea']['fecha_inicio'] = $this->request->data['Tarea']['fechainicio'];
      $this->request->data['Tarea']['fecha_fin'] = $this->request->data['Tarea']['fechafin'];
      if (empty($this->request->data['Tarea']['proceso_id'])) {
        $this->request->data['Tarea']['proceso_id'] = 0;
      }
      if (empty($this->request->data['Tarea']['flujos_user_id'])) {
        $this->request->data['Tarea']['flujos_user_id'] = 0;
      }
      $this->Tarea->create();
      $this->Tarea->save($this->request->data['Tarea']);
      $this->Session->setFlash("Se ha registrado correctamente la tarea!!", 'msgbueno');
      $this->redirect($this->referer());
    }
    $idUser = $this->Session->read('Auth.User.id');
    $usuarios = $this->User->find('list', array(
      'recursive' => -1,
      'conditions' => array('User.id !=' => $idUser),
      'fields' => array('User.id', 'User.nombre_completo')
    ));
    $flujos = $this->FlujosUser->find('list', array(
      'recursive' => -1,
      'conditions' => array(
        'FlujosUser.estado LIKE' => 'Activo'
      ),
      'order' => array('FlujosUser.created DESC'),
      'fields' => array('FlujosUser.id', 'FlujosUser.descripcion')
    ));
    $this->set(compact('usuarios', 'flujos'));
  }

  public function registra_fecha() {
    if (!empty($this->request->data['id'])) {
      //debug(date('Y-m-d', (($this->request->data['start'] - 25568) * 86400)));
      $d_tarea['fecha_inicio'] = $this->request->data['start'];
      if (!empty($this->request->data['end'])) {
        $d_tarea['fecha_fin'] = date('Y-m-d H:i:s', strtotime($this->request->data['end'] . ' -1 day'));
      } else {
        $d_tarea['fecha_fin'] = NULL;
      }
      $this->Tarea->id = $this->request->data['id'];
      $this->Tarea->save($d_tarea);
    }
    //debug($this->request->data);
    exit;
  }

  public function get_json_tareas() {
    //debug($_POST);
    /* debug($this->request->data);
      exit; */
    //$this->layout = null;
    //$fecha_inicio = $this->request->data['inicio'];
    $tareas = $this->Tarea->find('all', array(
      'recursive' => -1,
      'conditions' => array(
        'DATE(Tarea.fecha_inicio) >=' => $this->request->data['inicio'],
        'DATE(Tarea.fecha_inicio) <=' => $this->request->data['fin']
      ),
      'fields' => array('Tarea.*', 'DATE(Tarea.fecha_inicio) AS fecha_inicio', 'DATE(Tarea.fecha_fin) AS fecha_fin', "DATE_FORMAT(Tarea.fecha_inicio,'%H:%i:%s') AS tiempo_inicial", "DATE_FORMAT(Tarea.fecha_fin,'%H:%i:%s') AS tiempo_fin")
    ));
    //debug($tareas);exit;
    $array = array();
    foreach ($tareas as $key => $ta) {
      $fecha_fin = '';
      $fecha_ini = $ta[0]['fecha_inicio'];
      if ($ta[0]['tiempo_inicial'] !== '00:00:00') {
        $fecha_ini = $fecha_ini .' '. $ta[0]['tiempo_inicial'];
      }
      if (!empty($ta[0]['fecha_fin']) && $ta[0]['tiempo_fin'] !== '00:00:00') {
        $fecha_fin = $ta[0]['fecha_fin'].' '.$ta[0]['tiempo_fin'];
        /*$fecha_fin = date('Y-m-d', strtotime($ta[0]['fecha_fin'] . ' +1 day'));
        if ($ta[0]['tiempo_fin'] !== '00:00:00') {
          $fecha_fin = $fecha_fin.' ' . $ta[0]['tiempo_fin'];
        }*/
      }elseif (!empty($ta[0]['fecha_fin']) && $ta[0]['tiempo_fin'] === '00:00:00') {
        $fecha_fin = date('Y-m-d', strtotime($ta[0]['fecha_fin'] . ' +1 day'));
      }
      $array[$key] = array(
        "id" => $ta['Tarea']['id'],
        "title" => $ta['Tarea']['descripcion'],
        "start" => $fecha_ini,
        "end" => $fecha_fin,
        "className" => 'fc-event-success'
      );
    }


    /* debug(date('Y-m-d', strtotime($ta['Tarea']['fecha_fin'] . ' -1 day')));
      exit; */
    $this->respond($array, true);
  }

}
