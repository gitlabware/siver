<?php

class ProcesosController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Proceso', 'ProcesosCondicione', 'ProcesosEstado', 'FlujosUser', 'Tarea');

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
      if (count($condiciones_l) > 1) {
        $condiciones['Proceso.id NOT IN'] = $condiciones_l;
      } else {
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

    $condiciones_g = $this->ProcesosCondicione->find('all', array(
      'recursive' => 0,
      'conditions' => array('ProcesosCondicione.proceso_id' => $idProceso),
      'fields' => array('Condicion.nombre', 'ProcesosCondicione.*')
    ));
    $this->set(compact('opciones', 'proceso', 'condiciones_g'));
  }

  public function registra_condicion() {
    if (!empty($this->request->data['ProcesosCondicione'])) {
      $this->ProcesosCondicione->create();
      $this->ProcesosCondicione->save($this->request->data['ProcesosCondicione']);
    }
    exit;
  }

  public function eliminar_cond($idProcCond = null) {
    $this->ProcesosCondicione->delete($idProcCond);
    exit;
  }

  public function get_hab_proc($idProceso = null) {
    
  }

  public function verproceso($idFlujoUser = null, $idProceso = null) {
    $this->layout = 'ajax';

    /* debug($idProceso);
      exit; */
    $tareas = $this->Tarea->find('all', array(
      'recursive' => 0,
      'conditions' => array('Tarea.flujos_user_id' => $idFlujoUser, 'Tarea.proceso_id' => $idProceso),
      'fields' => array('Tarea.*', 'Asignado.nombre_completo'),
      'order' => array('Tarea.id DESC')
    ));
    $this->set(compact('idFlujoUser', 'idProceso', 'tareas'));
  }

  public function ver_proceso($idFlujoUser = null, $idProceso = null) {

    $flujo = $this->FlujosUser->findByid($idFlujoUser, null, null, -1);
    $proceso = $this->Proceso->findByid($idProceso, null, null, -1);
    $sql1 = "(SELECT tareas.id, tareas.created, CONCAT('Tarea') AS tipo_t, users.nombre_completo FROM tareas LEFT JOIN users ON (users.id = tareas.user_id) WHERE tareas.flujos_user_id = $idFlujoUser AND tareas.proceso_id = $idProceso)";
    $sql2 = "(SELECT adjuntos.id, adjuntos.created, CONCAT('Adjunto') AS tipo_t, users.nombre_completo FROM adjuntos LEFT JOIN users ON (users.id = adjuntos.user_id) WHERE adjuntos.flujos_user_id = $idFlujoUser AND adjuntos.proceso_id = $idProceso)";
    $sql3 = "(SELECT comentarios.id, comentarios.created, CONCAT('Comentario') AS tipo_t, users.nombre_completo FROM comentarios LEFT JOIN users ON (users.id = comentarios.user_id) WHERE comentarios.flujos_user_id = $idFlujoUser AND comentarios.proceso_id = $idProceso)";
    $sql4 = "$sql1 UNION $sql2 UNION $sql3 ORDER BY created DESC";
    $linea_tiempo = $this->Proceso->query($sql4);
    /* debug($linea_tiempo);
      exit; */
    $tareas = $this->Tarea->find('all', array(
      'recursive' => 0,
      'conditions' => array('Tarea.flujos_user_id' => $idFlujoUser, 'Tarea.proceso_id' => $idProceso),
      'fields' => array('Tarea.*', 'Asignado.nombre_completo', 'User.nombre_completo'),
      'order' => array('Tarea.created DESC')
    ));
    $estados = $this->ProcesosEstado->find('all',array(
      'recursive' => -1,
      'conditions' => array('ProcesosEstado.flujos_user_id' => $idFlujoUser,'ProcesosEstado.proceso_id' => $idProceso),
      'order' => array('ProcesosEstado.created DESC')
    ));
    
    $this->set(compact('flujo', 'proceso', 'linea_tiempo', 'idFlujoUser', 'idProceso', 'tareas','estados'));
  }

  public function finaliza_proceso($idFlujoUser = null, $idProceso = null) {
    $d_proest['user_id'] = $this->Session->read('Auth.User.id');
    $d_proest['flujos_user_id'] = $idFlujoUser;
    $d_proest['proceso_id'] = $idProceso;
    $d_proest['estado'] = 'Finalizado';
    $this->ProcesosEstado->create();
    $this->ProcesosEstado->save($d_proest);
    $flujo = $this->FlujosUser->findByid($idFlujoUser, null, null, -1);
    $this->update_proceso_est($flujo['FlujosUser']['flujo_id'], $idFlujoUser);
    $this->Session->setFlash('Se ha finalizado correctamente el proceso!!', 'msgbueno');
    $this->redirect($this->referer());
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

  public function ajax_sel_procesos($idFlujosUser = null) {
    //debug($idFlujosUser);exit;
    $this->layout = 'ajax';
    $flujo = $this->FlujosUser->findByid($idFlujosUser, null, null, -1);
    $procesos = array();
    if (!empty($flujo)) {
      $procesos = $this->Proceso->find('list', array(
        'recursive' => -1,
        'conditions' => array('Proceso.flujo_id' => $flujo['FlujosUser']['flujo_id']),
        'fields' => array('Proceso.nombre')
      ));
    }

    //debug($procesos);exit;
    $this->set(compact('procesos'));
  }

}
