<?php

class TareasController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Tarea', 'User', 'Proceso', 'FlujosUser', 'ProcesosEstado', 'TareasEstado', 'Comentario');
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

  public function tablero() {
    $idUser = $this->Session->read('Auth.User.id');
    $span1 = '<span class="text-primary">';
    $span2 = '</span>';
    $com = '"';
    $icono_tarea = '<div class="timeline-icon bg-dark light"><span class="fa fa-tags"></span></div>';
    $icono_flujo = '<div class="timeline-icon bg-info light"><span class="fa fa-desktop"></span></div>';
    $icono_adjuntos = '<div class="timeline-icon bg-system light"><span class="fa fa-file"></span></div>';
    $icono_adjuntos_e = '<div class="timeline-icon bg-danger light"><span class="fa fa-file"></span></div>';
    $icono_tarea_estado = '<div class="timeline-icon bg-warning light"><span class="fa fa-bookmark-o"></span></div>';
    $icono_procesos_estado = '<div class="timeline-icon bg-primary light"><span class="fa fa-bookmark-o"></span></div>';
    $sql1 = "(SELECT ('$icono_tarea') AS icono, tareas.created, CONCAT('Tarea') AS tipo, CONCAT('<b>',users.nombre_completo,'</b>',' asigna la tarea de: <a href=$com ver_tarea/0/0/',tareas.id,'$com>',tareas.descripcion,'</a>', IF(ISNULL(asignado.nombre_completo),'',CONCAT(' a $span1 ',asignado.nombre_completo,' $span2'))) AS contenido FROM tareas LEFT JOIN users ON(users.id = tareas.user_id) LEFT JOIN users AS asignado ON(asignado.id = tareas.asignado_id) WHERE 1 ORDER BY tareas.created DESC LIMIT 20)";
    $sql2 = "(SELECT ('$icono_tarea_estado') AS icono, tareas_estados.created, CONCAT('Tarea Estado') AS tipo, CONCAT('<b>',IF(ISNULL(users.nombre_completo),'Sistema',users.nombre_completo),'</b> marco como ',tareas_estados.estado,' la tarea: <a href=$com ver_tarea/0/0/',tareas.id,'$com>',tareas.descripcion,'</a>') AS contenido FROM tareas_estados LEFT JOIN users ON(users.id = tareas_estados.user_id) LEFT JOIN tareas ON(tareas.id = tareas_estados.tarea_id) WHERE 1 ORDER BY tareas_estados.created DESC LIMIT 20)";
    $sql3 = "(SELECT ('$icono_procesos_estado') AS icono, procesos_estados.created, CONCAT('Proceso Estado') AS tipo, CONCAT('<b>',IF(ISNULL(users.nombre_completo),'Sistema',users.nombre_completo),'</b> marco como ',procesos_estados.estado,' el proceso: <a href=$com ../Procesos/ver_proceso/',procesos_estados.flujos_user_id,'/',procesos_estados.proceso_id,'$com>',procesos.nombre,'</a> de: ',flujos_users.descripcion) AS contenido FROM procesos_estados LEFT JOIN users ON(users.id = procesos_estados.user_id) LEFT JOIN procesos ON(procesos.id = procesos_estados.proceso_id) LEFT JOIN flujos_users ON(flujos_users.id = procesos_estados.flujos_user_id) WHERE 1 ORDER BY procesos_estados.created DESC LIMIT 20)";
    $sql4 = "(SELECT ('$icono_flujo') AS icono, flujos_users.created, CONCAT('Flujos Usuario') AS tipo, CONCAT('<b>',users.nombre_completo,'</b>',' creo el flujo: <a href=$com ../Flujos/enflujo/',flujos_users.id,'$com>',flujos_users.descripcion,'</a>') AS contenido FROM flujos_users LEFT JOIN users ON(users.id = flujos_users.user_id) WHERE 1 ORDER BY flujos_users.created DESC LIMIT 20)";
    $sql5 = "(SELECT ('$icono_adjuntos') AS icono, adjuntos.created, CONCAT('Adjuntos') AS tipo, CONCAT('<b>',users.nombre_completo,'</b>',' subio un archivo: ','<a href=$com ../Adjuntos/index/',IF(ISNULL(adjuntos.parent_id),'',adjuntos.parent_id),' $com>',adjuntos.nombre_original,'</a> ',IF(adjuntos.tarea_id != 0,CONCAT('en tarea <a href=$com ../Tareas/ver_tarea/0/0/',adjuntos.tarea_id,'$com>',tareas.descripcion,'</a>'),IF(adjuntos.proceso_id != 0,CONCAT('en proceso <a href=$com ../Procesos/ver_proceso/',adjuntos.flujos_user_id,'/',adjuntos.proceso_id,'$com>',procesos.nombre,'</a>'), IF(adjuntos.flujos_user_id != 0,CONCAT('en flujo <a href=$com ../Flujos/enflujo/',adjuntos.flujos_user_id,'$com>',flujos_users.descripcion,'</a>'),'' ) )  ) ) AS contenido FROM adjuntos LEFT JOIN users ON(users.id = adjuntos.user_id)  LEFT JOIN flujos_users ON(flujos_users.id = adjuntos.flujos_user_id)  LEFT JOIN procesos ON(procesos.id = adjuntos.proceso_id) LEFT JOIN tareas ON(tareas.id = adjuntos.tarea_id) WHERE ( IF(adjuntos.user_id = $idUser,1,IF(adjuntos.visible = 'Todos',1,  IF(adjuntos.visible = 'Seleccion Personalizada',( IF( ISNULL( (SELECT users_visibles.id FROM users_visibles WHERE users_visibles.user_id = $idUser AND users_visibles.adjunto_id = adjuntos.id AND users_visibles.visible = 1) ),0,1 ) ),0)  )) ) = 1 ORDER BY adjuntos.created DESC LIMIT 20)";
    $sql6 = "(SELECT ('$icono_adjuntos_e') AS icono, adjuntos.modified AS created, CONCAT('Adjuntos') AS tipo, CONCAT('<b>',users.nombre_completo,'</b>',' elimino un archivo: ','<a href=$com ../Adjuntos/index/',IF(ISNULL(adjuntos.parent_id),'',adjuntos.parent_id),' $com>',adjuntos.nombre_original,'</a> ',IF(adjuntos.tarea_id != 0,CONCAT('en tarea <a href=$com ../Tareas/ver_tarea/0/0/',adjuntos.tarea_id,'$com>',tareas.descripcion,'</a>'),IF(adjuntos.proceso_id != 0,CONCAT('en proceso <a href=$com ../Procesos/ver_proceso/',adjuntos.flujos_user_id,'/',adjuntos.proceso_id,'$com>',procesos.nombre,'</a>'), IF(adjuntos.flujos_user_id != 0,CONCAT('en flujo <a href=$com ../Flujos/enflujo/',adjuntos.flujos_user_id,'$com>',flujos_users.descripcion,'</a>'),'' ) )  ) ) AS contenido FROM adjuntos LEFT JOIN users ON(users.id = adjuntos.user_id)  LEFT JOIN flujos_users ON(flujos_users.id = adjuntos.flujos_user_id)  LEFT JOIN procesos ON(procesos.id = adjuntos.proceso_id) LEFT JOIN tareas ON(tareas.id = adjuntos.tarea_id) WHERE adjuntos.estado = 'Eliminado' AND ( IF(adjuntos.user_id = $idUser,1,IF(adjuntos.visible = 'Todos',1,  IF(adjuntos.visible = 'Seleccion Personalizada',( IF( ISNULL( (SELECT users_visibles.id FROM users_visibles WHERE users_visibles.user_id = $idUser AND users_visibles.adjunto_id = adjuntos.id AND users_visibles.visible = 1) ),0,1 ) ),0)  )) ) = 1 ORDER BY adjuntos.modified DESC LIMIT 20)";
    $sql_u = "$sql1 UNION $sql2 UNION $sql3 UNION $sql4 UNION $sql5 UNION $sql6 ORDER BY created DESC LIMIT 15";

    $actividades = $this->Tarea->query($sql_u);
     /*debug($actividades);
      exit; */
    $comentarios = $this->Comentario->find('all', array(
      'recursive' => 0,
      'order' => array('Comentario.created DESC'),
      'limit' => 10
    ));

    $sql_1 = "(SELECT tareas_estados.estado FROM tareas_estados WHERE Tarea.id = tareas_estados.tarea_id ORDER BY tareas_estados.created DESC LIMIT 1)";

    $this->Tarea->virtualFields = array(
      'estado' => "$sql_1"
    );

    $tareas = $this->Tarea->find('all', array(
      'recursive' => 0,
      'order' => array('Tarea.created DESC'),
      'limit' => 10
    ));
    
    $mis_tareas = $this->Tarea->find('all', array(
      'recursive' => 0,
      'conditions' => array(
        'Tarea.asignado_id' => $idUser
      ),
      'order' => array('Tarea.created DESC')
    ));

    $flujos = $this->FlujosUser->find('all', array(
      'recursive' => 0,
      'order' => array('FlujosUser.created DESC'),
      'limit' => 10
    ));
    $this->set(compact('actividades', 'comentarios', 'tareas', 'mis_tareas', 'flujos'));
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
      //'conditions' => array('User.id !=' => $idUser),
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
    $this->set(compact('usuarios', 'proceso', 'flujo','idFlujoUser','idProceso'));
  }

  public function ver_tarea($idFlujoUser = null, $idProceso = null, $idTarea = null) {
    $tarea = $this->Tarea->find('first', array(
      'recursive' => 0,
      'conditions' => array('Tarea.id' => $idTarea),
      'fields' => array('Tarea.*', 'User.nombre_completo', 'Asignado.nombre_completo')
    ));
    $proceso = $this->Proceso->findByid($tarea['Tarea']['proceso_id'], null, null, -1);
    $flujo = $this->FlujosUser->findByid($tarea['Tarea']['flujos_user_id'], null, null, -1);
    $estados = $this->TareasEstado->find('all', array(
      'recursive' => -1,
      'conditions' => array('TareasEstado.tarea_id' => $idTarea),
      'order' => array('TareasEstado.created DESC')
    ));
    $estado = $this->TareasEstado->find('first', array(
      'recursive' => -1,
      'conditions' => array('TareasEstado.tarea_id' => $idTarea),
      'order' => array('TareasEstado.created DESC')
    ));
    
    
    $this->set(compact('tarea', 'proceso', 'flujo', 'idFlujoUser', 'idProceso', 'estados', 'estado'));
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

  public function tarea_ajax($idTarea = null) {
    $this->layout = 'ajax';
    if (!empty($this->request->data['Tarea'])) {
      //debug($this->request->data);exit;
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
      //'conditions' => array('User.id !=' => $idUser),
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
    $procesos = array();
    if (!empty($idTarea)) {
      $this->Tarea->id = $idTarea;
      $this->request->data = $this->Tarea->read();
      $this->request->data['Tarea']['fechainicio'] = $this->request->data['Tarea']['fecha_inicio'];
      $this->request->data['Tarea']['fechafin'] = $this->request->data['Tarea']['fecha_fin'];
      if (!empty($this->request->data['Tarea']['flujos_user_id'])) {
        $flujo = $this->FlujosUser->findByid($this->request->data['Tarea']['flujos_user_id'], null, null, -1);

        if (!empty($flujo)) {
          $procesos = $this->Proceso->find('list', array(
            'recursive' => -1,
            'conditions' => array('Proceso.flujo_id' => $flujo['FlujosUser']['flujo_id']),
            'fields' => array('Proceso.nombre')
          ));
        }
        //debug($this->request->data['Tarea']);exit;
      }
    }
    $this->set(compact('usuarios', 'flujos', 'procesos'));
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
        $fecha_ini = $fecha_ini . ' ' . $ta[0]['tiempo_inicial'];
      }
      if (!empty($ta[0]['fecha_fin']) && $ta[0]['tiempo_fin'] !== '00:00:00') {
        $fecha_fin = $ta[0]['fecha_fin'] . ' ' . $ta[0]['tiempo_fin'];
        /* $fecha_fin = date('Y-m-d', strtotime($ta[0]['fecha_fin'] . ' +1 day'));
          if ($ta[0]['tiempo_fin'] !== '00:00:00') {
          $fecha_fin = $fecha_fin.' ' . $ta[0]['tiempo_fin'];
          } */
      } elseif (!empty($ta[0]['fecha_fin']) && $ta[0]['tiempo_fin'] === '00:00:00') {
        $fecha_fin = date('Y-m-d', strtotime($ta[0]['fecha_fin'] . ' +1 day'));
      }
      if (!empty($ta['Tarea']['id'])) {
        $idTarea = $ta['Tarea']['id'];
      } else {
        $idTarea = 0;
      }
      if (!empty($ta['Tarea']['flujos_user_id'])) {
        $idFlujosUser = $ta['Tarea']['flujos_user_id'];
      } else {
        $idFlujosUser = 0;
      }
      if (!empty($ta['Tarea']['proceso_id'])) {
        $idProceso = $ta['Tarea']['proceso_id'];
      } else {
        $idProceso = 0;
      }
      $array[$key] = array(
        "id" => $ta['Tarea']['id'],
        "title" => $ta['Tarea']['descripcion'],
        "start" => $fecha_ini,
        "end" => $fecha_fin,
        "className" => 'fc-event-success',
        'url' => "ver_tarea/$idFlujosUser/$idProceso/$idTarea"
      );
    }


    /* debug(date('Y-m-d', strtotime($ta['Tarea']['fecha_fin'] . ' -1 day')));
      exit; */
    $this->respond($array, true);
  }

  public function completa_tarea($idTarea = null) {
    $this->TareasEstado->create();
    $datos['user_id'] = $this->Session->read('Auth.User.id');
    $datos['tarea_id'] = $idTarea;
    $datos['estado'] = 'Completado';
    $this->TareasEstado->save($datos);
    $this->Session->setFlash("Se ha completado la tarea correctamente!!", 'msgbueno');
    $this->redirect($this->referer());
  }

  public function reanudar_tarea($idTarea = null) {
    $this->TareasEstado->create();
    $datos['user_id'] = $this->Session->read('Auth.User.id');
    $datos['tarea_id'] = $idTarea;
    $datos['estado'] = 'Reanudado';
    $this->TareasEstado->save($datos);
    $this->Session->setFlash("Se ha Reanudado la tarea correctamente!!", 'msgbueno');
    $this->redirect($this->referer());
  }

  public function c_tareas_vencidas() {
    $hoy = date("Y-m-d H:i:s");
    //$hoy = date("Y-m-d");
    //$hoy_t = date("H:i:s");
    //debug($hoy_t);exit;
    $sql1 = "(SELECT tareas_estados.id FROM tareas_estados WHERE tareas_estados.tarea_id = Tarea.id AND tareas_estados.estado = 'Vencido' LIMIT 1)";
    $sql2 = "(SELECT tareas_estados.estado FROM tareas_estados WHERE tareas_estados.tarea_id = Tarea.id ORDER BY tareas_estados.created DESC LIMIT 1)";
    $sql3 = "(ISNULL($sql1))";
    $sql4 = "IF(ISNULL($sql2),TRUE,($sql2 != 'Completado'))";
    $tareas = $this->Tarea->find('all', array(
      'recursive' => -1,
      'conditions' => array('DATE(Tarea.fecha_fin) <' => $hoy, $sql3, $sql4),
      'fields' => array('Tarea.id', 'Tarea.fecha_fin')
    ));

    foreach ($tareas as $ta) {
      $this->TareasEstado->create();
      $datos['user_id'] = 0;
      $datos['tarea_id'] = $ta['Tarea']['id'];
      $datos['estado'] = 'Vencido';
      $datos['created'] = $ta['Tarea']['fecha_fin'];
      $this->TareasEstado->save($datos);
    }
    /* debug($tareas);
      exit; */
  }

  public function ajax_sel_tareas($idFlujosUser = null,$idProceso = null,$idTarea = null) {
    //debug($idFlujosUser);exit;
    $this->layout = 'ajax';
    $flujo = $this->FlujosUser->findByid($idFlujosUser, null, null, -1);
    $tareas = array();
    if (!empty($flujo)) {
      $tareas = $this->Tarea->find('list', array(
        'recursive' => -1,
        'conditions' => array('Tarea.flujos_user_id' => $idFlujosUser,'Tarea.proceso_id' => $idProceso),
        'fields' => array('Tarea.descripcion')
      ));
    }
    $this->request->data['Adjunto']['tarea_id'] = $idTarea;
    //debug($procesos);exit;
    $this->set(compact('tareas'));
  }

}
