<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class FlujosController extends AppController {

    public $layout = 'svergara';
    public $uses = array('Flujo', 'Proceso', 'FlujosUser', 'ProcesosCondicione', 'ProcesosEstado', 'Adjunto', 'Cliente', 'Regione');

    public function index() {

        $flujos = $this->Flujo->find('all', array(
            'recursive' => -1,
            'order' => 'modified DESC'
        ));
        $this->FlujosUser->virtualFields = array(
            'estado_color' => "(IF(FlujosUser.estado = 'Finalizado','success',''))"
        );
        $flujos_c = $this->FlujosUser->find('all', array(
            'recursive' => 0,
            'fields' => array('Flujo.*', 'User.*', 'FlujosUser.*'),
            'order' => array('FlujosUser.created DESC')
        ));
        //debug($flujos_c);exit;
        $this->set(compact('flujos', 'flujos_c'));
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

        $this->Proceso->virtualFields = array(
            'requisitos' => "(SELECT GROUP_CONCAT(condiciones.nombre SEPARATOR ', ') FROM procesos_condiciones pro_condiciones LEFT JOIN procesos AS condiciones ON (condiciones.id = pro_condiciones.condicion_id) WHERE pro_condiciones.proceso_id = Proceso.id GROUP BY pro_condiciones.proceso_id)"
        );

        $procesos = $this->Proceso->find('all', array(
            'recursive' => -1,
            'conditions' => array('Proceso.flujo_id' => $idFlujo),
            'order' => array('Proceso.id')
        ));
        //debug($procesos);exit;
        $this->FlujosUser->virtualFields = array(
            'estado_color' => "(IF(FlujosUser.estado = 'Finalizado','success',''))"
        );
        $flujos_c = $this->FlujosUser->find('all', array(
            'recursive' => 0,
            'conditions' => array('FlujosUser.flujo_id' => $idFlujo),
            'fields' => array('Flujo.*', 'User.*', 'FlujosUser.*'),
            'order' => array('FlujosUser.created DESC')
        ));
        $flujos = $this->Flujo->find('all', array(
            'recursive' => -1,
            'order' => 'modified DESC'
        ));
        $this->set(compact('flujo', 'procesos', 'idFlujo', 'flujos', 'flujos_c'));
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
            $d_flujo = $this->request->data['FlujosUser'];
            //$d_flujo['descripcion'] = $this->request->data['FlujosUser']['descripcion'];
            $d_flujo['flujo_id'] = $idFlujo;
            $d_flujo['user_id'] = $this->Session->read('Auth.User.id');
            $error = $this->validar('FlujosUser');
            if (empty($error)) {
                if (!empty($this->request->data['Cliente']['nombre'])){
                    $this->Cliente->create();
                    $this->Cliente->save($this->request->data['Cliente']);
                    $d_flujo['cliente_id'] = $this->Cliente->getLastInsertID();
                }
                
                $this->FlujosUser->save($d_flujo);
                if (empty($idFlujosUser)) {
                    $idFlujosUser = $this->FlujosUser->getLastInsertID();
                    $folder = new Folder();

                    if ($folder->create(WWW_ROOT . 'files' . DS . $d_flujo['descripcion'])) {
// Successfully created the nested folders
                        $this->Adjunto->create();
                        $adj['nombre_original'] = $adj['nombre'] = $d_flujo['descripcion'];
                        $adj['user_id'] = $this->Session->read('Auth.User.id');
                        $adj['tipo'] = 'Carpeta';
                        $adj['estado'] = 'Activo';
                        $adj['flujos_user_id'] = $idFlujosUser;
                        $adj['proceso_id'] = 0;
                        $adj['tarea_id'] = 0;
                        $this->Adjunto->save($adj);
                        

                        $dflujo['adjunto_id'] = $this->Adjunto->getLastInsertID();
                        $this->FlujosUser->id = $idFlujosUser;
                        $this->FlujosUser->save($dflujo);
                        
                    }
                } else {
                    $flujo = $this->FlujosUser->findByid($idFlujosUser, NULL, NULL, 0);

                    $this->Adjunto->id = $flujo['FlujosUser']['adjunto_id'];
                    $adj['nombre_original'] = $adj['nombre'] = $d_flujo['descripcion'];
                    $this->Adjunto->save($adj);

                    $folder = new Folder(WWW_ROOT . 'files' . DS . $flujo['Adjunto']['nombre_original']);
                    $folder->move(WWW_ROOT . 'files' . DS . $d_flujo['descripcion']);
                    $this->Session->setFlash('Se ha registrado correctamente!!', 'msgbueno');
                    $this->redirect($this->referer());
                }
            } else {
                $this->Session->setFlash($error, 'msgerror');
                $this->redirect($this->referer());
            }


            $this->redirect(array('action' => 'enflujo', $idFlujosUser));
        }
        if (!empty($idFlujosUser)) {
            $this->FlujosUser->id = $idFlujosUser;
            $this->request->data = $this->FlujosUser->read();
        }
        $clientes = $this->Cliente->find('list', array(
            'fields' => array('Cliente.id', 'Cliente.nombre'),
            'order' => array('Cliente.nombre ASC')
        ));
        $regiones = $this->Regione->find('list',array(
            'fields' => array('Regione.id' ,'Regione.nombre'),
            'order' => array('Regione.nombre ASC')
        ));
        
        $this->set(compact('clientes','regiones'));
    }

    public function enflujo($idFlujoUser = null) {

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
        $sql1 = "(SELECT ('$icono_tarea') AS icono, tareas.created, CONCAT('Tarea') AS tipo, CONCAT('<b>',users.nombre_completo,'</b>',' asigna la tarea de: <a href=$com ver_tarea/0/0/',tareas.id,'$com>',tareas.descripcion,'</a>', IF(ISNULL(asignado.nombre_completo),'',CONCAT(' a $span1 ',asignado.nombre_completo,' $span2'))) AS contenido FROM tareas LEFT JOIN users ON(users.id = tareas.user_id) LEFT JOIN users AS asignado ON(asignado.id = tareas.asignado_id) WHERE tareas.flujos_user_id = $idFlujoUser ORDER BY tareas.created DESC LIMIT 20)";
        $sql2 = "(SELECT ('$icono_tarea_estado') AS icono, tareas_estados.created, CONCAT('Tarea Estado') AS tipo, CONCAT('<b>',IF(ISNULL(users.nombre_completo),'Sistema',users.nombre_completo),'</b> marco como ',tareas_estados.estado,' la tarea: <a href=$com ver_tarea/0/0/',tareas.id,'$com>',tareas.descripcion,'</a>') AS contenido FROM tareas_estados LEFT JOIN users ON(users.id = tareas_estados.user_id) LEFT JOIN tareas ON(tareas.id = tareas_estados.tarea_id) WHERE tareas.flujos_user_id = $idFlujoUser ORDER BY tareas_estados.created DESC LIMIT 20)";
        $sql3 = "(SELECT ('$icono_procesos_estado') AS icono, procesos_estados.created, CONCAT('Proceso Estado') AS tipo, CONCAT('<b>',IF(ISNULL(users.nombre_completo),'Sistema',users.nombre_completo),'</b> marco como ',procesos_estados.estado,' el proceso: <a href=$com ../../Procesos/ver_proceso/',procesos_estados.flujos_user_id,'/',procesos_estados.proceso_id,'$com>',procesos.nombre,'</a> de: ',flujos_users.descripcion) AS contenido FROM procesos_estados LEFT JOIN users ON(users.id = procesos_estados.user_id) LEFT JOIN procesos ON(procesos.id = procesos_estados.proceso_id) LEFT JOIN flujos_users ON(flujos_users.id = procesos_estados.flujos_user_id) WHERE procesos_estados.flujos_user_id = $idFlujoUser ORDER BY procesos_estados.created DESC LIMIT 20)";
        $sql4 = "(SELECT ('$icono_flujo') AS icono, flujos_users.created, CONCAT('Flujos Usuario') AS tipo, CONCAT('<b>',users.nombre_completo,'</b>',' creo el flujo: <a href=$com ../../Flujos/enflujo/',flujos_users.id,'$com>',flujos_users.descripcion,'</a>') AS contenido FROM flujos_users LEFT JOIN users ON(users.id = flujos_users.user_id) WHERE flujos_users.id = $idFlujoUser ORDER BY flujos_users.created DESC LIMIT 20)";
        $sql5 = "(SELECT ('$icono_adjuntos') AS icono, adjuntos.created, CONCAT('Adjuntos') AS tipo, CONCAT('<b>',users.nombre_completo,'</b>',' subio un archivo: ','<a href=$com ../../Adjuntos/index/',IF(ISNULL(adjuntos.parent_id),'',adjuntos.parent_id),' $com>',adjuntos.nombre_original,'</a> ',IF(adjuntos.tarea_id != 0,CONCAT('en tarea <a href=$com ../../Tareas/ver_tarea/0/0/',adjuntos.tarea_id,'$com>',tareas.descripcion,'</a>'),IF(adjuntos.proceso_id != 0,CONCAT('en proceso <a href=$com ../../Procesos/ver_proceso/',adjuntos.flujos_user_id,'/',adjuntos.proceso_id,'$com>',procesos.nombre,'</a>'), IF(adjuntos.flujos_user_id != 0,CONCAT('en flujo <a href=$com ../../Flujos/enflujo/',adjuntos.flujos_user_id,'$com>',flujos_users.descripcion,'</a>'),'' ) )  ) ) AS contenido FROM adjuntos LEFT JOIN users ON(users.id = adjuntos.user_id)  LEFT JOIN flujos_users ON(flujos_users.id = adjuntos.flujos_user_id)  LEFT JOIN procesos ON(procesos.id = adjuntos.proceso_id) LEFT JOIN tareas ON(tareas.id = adjuntos.tarea_id) WHERE ( IF(adjuntos.user_id = $idUser,1,IF(adjuntos.visible = 'Todos',1,  IF(adjuntos.visible = 'Seleccion Personalizada',( IF( ISNULL( (SELECT users_visibles.id FROM users_visibles WHERE users_visibles.user_id = $idUser AND users_visibles.adjunto_id = adjuntos.id AND users_visibles.visible = 1) ),0,1 ) ),0)  )) ) = 1 AND adjuntos.flujos_user_id = $idFlujoUser AND adjuntos.tipo LIKE 'Archivo' ORDER BY adjuntos.created DESC LIMIT 20)";
        $sql6 = "(SELECT ('$icono_adjuntos_e') AS icono, adjuntos.modified AS created, CONCAT('Adjuntos') AS tipo, CONCAT('<b>',users.nombre_completo,'</b>',' elimino un archivo: ','<a href=$com ../../Adjuntos/index/',IF(ISNULL(adjuntos.parent_id),'',adjuntos.parent_id),' $com>',adjuntos.nombre_original,'</a> ',IF(adjuntos.tarea_id != 0,CONCAT('en tarea <a href=$com ../../Tareas/ver_tarea/0/0/',adjuntos.tarea_id,'$com>',tareas.descripcion,'</a>'),IF(adjuntos.proceso_id != 0,CONCAT('en proceso <a href=$com ../../Procesos/ver_proceso/',adjuntos.flujos_user_id,'/',adjuntos.proceso_id,'$com>',procesos.nombre,'</a>'), IF(adjuntos.flujos_user_id != 0,CONCAT('en flujo <a href=$com ../../Flujos/enflujo/',adjuntos.flujos_user_id,'$com>',flujos_users.descripcion,'</a>'),'' ) )  ) ) AS contenido FROM adjuntos LEFT JOIN users ON(users.id = adjuntos.user_id)  LEFT JOIN flujos_users ON(flujos_users.id = adjuntos.flujos_user_id)  LEFT JOIN procesos ON(procesos.id = adjuntos.proceso_id) LEFT JOIN tareas ON(tareas.id = adjuntos.tarea_id) WHERE adjuntos.estado = 'Eliminado' AND ( IF(adjuntos.user_id = $idUser,1,IF(adjuntos.visible = 'Todos',1,  IF(adjuntos.visible = 'Seleccion Personalizada',( IF( ISNULL( (SELECT users_visibles.id FROM users_visibles WHERE users_visibles.user_id = $idUser AND users_visibles.adjunto_id = adjuntos.id AND users_visibles.visible = 1) ),0,1 ) ),0)  )) ) = 1 AND adjuntos.flujos_user_id = $idFlujoUser AND adjuntos.tipo LIKE 'Archivo' ORDER BY adjuntos.modified DESC LIMIT 20)";
        $sql_u = "$sql1 UNION $sql2 UNION $sql3 UNION $sql4 UNION $sql5 UNION $sql6 ORDER BY created DESC LIMIT 15";

        $actividades = $this->Flujo->query($sql_u);

        $flujo = $this->FlujosUser->find('first', array(
            'recursive' => 0,
            'conditions' => array('FlujosUser.id' => $idFlujoUser),
            'fields' => array('Flujo.*', 'FlujosUser.*')
        ));
        $this->update_proceso_est($flujo['Flujo']['id'], $idFlujoUser);
        $sql_1 = "(SELECT pres.estado FROM procesos_estados pres WHERE pres.flujos_user_id = $idFlujoUser AND pres.proceso_id = Proceso.id ORDER BY pres.id DESC LIMIT 1)";
        $this->Proceso->virtualFields = array(
            'estado' => "$sql_1"
        );
        $procesos = $this->Proceso->find('all', array(
            'recursive' => -1,
            'conditions' => array('Proceso.flujo_id' => $flujo['Flujo']['id'])
        ));
        /* debug($procesos);
          exit; */
        $this->set(compact('flujo', 'procesos', 'idFlujoUser', 'actividades'));
    }

    public function get_procesos($idFlujoUser) {
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
        //debug($procesos);exit;
        return $procesos;
    }

    public function update_proceso_est($idFlujo = null, $idFlujoUser = null) {
        $sql1 = "(SELECT pres.estado FROM procesos_estados pres WHERE pres.flujos_user_id = $idFlujoUser AND pres.proceso_id = Proceso.id ORDER BY pres.id LIMIT 1)";
        $this->Proceso->virtualFields = array(
            'estado' => "$sql1"
        );
        $procesos = $this->Proceso->find('all', array(
            'recursive' => -1,
            'conditions' => array('Proceso.flujo_id' => $idFlujo, 'Proceso.auto_inicio' => 1)
        ));
        /* debug($procesos);
          debug($idFlujo);
          debug($idFlujoUser);exit; */
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
