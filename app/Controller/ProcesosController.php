<?php

class ProcesosController extends AppController {

    public $layout = 'svergara';
    public $uses = array('Proceso', 'ProcesosCondicione', 'ProcesosEstado', 'FlujosUser', 'Tarea', 'Feriado', 'Alerta');
    
    public function proceso($idFlujo = null, $idProceso = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data['Proceso'])) {
            //debug($this->request->data);exit;
            $this->Proceso->create();
            $this->Proceso->save($this->request->data['Proceso']);
            $this->Session->setFlash('Se ha registrado correctamente el registro!!', 'msgbueno');
            $this->redirect($this->referer());
        }
        $this->Proceso->id = $idProceso;
        $this->request->data = $this->Proceso->read();
        $this->request->data['Proceso']['flujo_id'] = $idFlujo;
        $this->request->data['Proceso']['user_id'] = $this->Session->read('Auth.User.id');
        //debug($this->request->data);exit;
        $n_procesos = $this->Proceso->find('count', array(
            'recursive' => -1,
            'conditions' => array('Proceso.flujo_id' => $idFlujo)
        ));
        if (empty($idProceso)) {
            $n_procesos++;
        }
        $ordens = array();
        for ($i = 1; $i <= $n_procesos; $i++) {
            $ordens[$i] = $i;
        }
        $this->set(compact('ordens'));
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


        $estados = $this->ProcesosEstado->find('all', array(
            'recursive' => 0,
            'conditions' => array('ProcesosEstado.flujos_user_id' => $idFlujoUser, 'ProcesosEstado.proceso_id' => $idProceso),
            'order' => array('ProcesosEstado.created DESC'),
            'fields' => array('ProcesosEstado.*','Proceso.tiempo','Proceso.tipo_dias', 'DATE(ProcesosEstado.created) AS creado')
        ));
        //debug($estados);exit;
        $this->set(compact('flujo', 'proceso', 'linea_tiempo', 'idFlujoUser', 'idProceso', 'tareas', 'estados'));
    }

    public function get_estados($idFlujoUser = null, $idProceso = null) {
        $estados = $this->ProcesosEstado->find('all', array(
            'recursive' => 0,
            'conditions' => array('ProcesosEstado.flujos_user_id' => $idFlujoUser, 'ProcesosEstado.proceso_id' => $idProceso),
            'order' => array('ProcesosEstado.created DESC'),
            'fields' => array('ProcesosEstado.*','Proceso.tiempo','Proceso.tipo_dias', 'DATE(ProcesosEstado.created) AS creado')
        ));
        
        return $estados;
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

    public function ajax_sel_procesos($idFlujosUser = null, $modelo = null, $idProceso = null, $idTarea = null) {
        //debug($idTarea);exit;
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
        $this->request->data[$modelo]['proceso_id'] = $idProceso;
        //debug($procesos);exit;
        $this->set(compact('procesos', 'modelo', 'idTarea', 'idProceso'));
    }

    public function activacion($idFlujosUser = null, $idProceso = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data['ProcesosEstado'])) {
            $this->ProcesosEstado->create();
            $this->ProcesosEstado->save($this->request->data['ProcesosEstado']);
            $this->Session->setFlash("Se ha registrado el proceso activo!!", 'msgbueno');
            $this->redirect($this->referer());
        }

        $this->set(compact('idFlujosUser', 'idProceso'));
    }
    public function finaliza_proceso($idFlujosUser = null, $idProceso = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data['ProcesosEstado'])) {
            $this->ProcesosEstado->create();
            $this->ProcesosEstado->save($this->request->data['ProcesosEstado']);
            $this->Session->setFlash("Se ha registrado el proceso finalizado!!", 'msgbueno');
            $this->redirect($this->referer());
        }

        $this->set(compact('idFlujosUser', 'idProceso'));
    }
    public function finaliza_proceso2($idFlujoUser = null, $idProceso = null) {
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
    public function eliminar_estado($idProcesosEstado = null) {
        if ($this->ProcesosEstado->delete($idProcesosEstado)) {
            $this->Session->setFlash("Se ha eliminado correctamente el estado del Proceso!!", 'msgbueno');
        } else {
            $this->Session->setFlash("No se ha podido eliminar el estado. Intente nuevamente!!", 'msgerror');
        }
        $this->redirect($this->referer());
    }

    public function getWorkingDays($startDate, $endDate, $holidays) {
        // do strtotime calculations just once
        $endDate = strtotime($endDate);
        $startDate = strtotime($startDate);

        //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
        //We add one to inlude both dates in the interval.
        $days = ($endDate - $startDate) / 86400 + 1;

        $no_full_weeks = floor($days / 7);
        $no_remaining_days = fmod($days, 7);

        //It will return 1 if it's Monday,.. ,7 for Sunday
        $the_first_day_of_week = date("N", $startDate);
        $the_last_day_of_week = date("N", $endDate);

        //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
        //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.


        if ($the_first_day_of_week <= $the_last_day_of_week) {
            if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week)
                $no_remaining_days--;
            if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week)
                $no_remaining_days--;
        }
        else {
            // (edit by Tokes to fix an edge case where the start day was a Sunday
            // and the end day was NOT a Saturday)
            // the day of the week for start is later than the day of the week for end
            if ($the_first_day_of_week == 7) {
                // if the start date is a Sunday, then we definitely subtract 1 day
                $no_remaining_days--;

                if ($the_last_day_of_week == 6) {
                    // if the end date is a Saturday, then we subtract another day
                    $no_remaining_days--;
                }
            } else {
                // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
                // so we skip an entire weekend and subtract 2 days
                $no_remaining_days -= 2;
            }
        }

        //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
//---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
        $workingDays = $no_full_weeks * 5;
        if ($no_remaining_days > 0) {
            $workingDays += $no_remaining_days;
        }

        //We subtract the holidays
        foreach ($holidays as $holiday) {
            $time_stamp = strtotime($holiday);
            //If the holiday doesn't fall in weekend
            if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N", $time_stamp) != 6 && date("N", $time_stamp) != 7)
                $workingDays--;
        }


        return $workingDays;
    }

    public function get_fecha_xdias($fecha_ini = null, $dias_l = null, $feriados = NULL) {
        $i = 0;
        $fecha_un = $fecha_ini;
        while ($i < $dias_l) {
            $fecha_un = date('Y-m-d', strtotime($fecha_un . ' +1 day'));
            $time_stamp = strtotime($fecha_un);
            $c_dia_e = date("N", $time_stamp);
            if ($c_dia_e != 6 && $c_dia_e != 7 && !in_array($fecha_un, $feriados)) {
                $i++;
            }
        }
        return $fecha_un;
    }

    public function get_fecha_final($fecha_ini = null, $dias_l = null, $tipo = null) {
        //debug($dias_l);exit;
        $dias_l--;
        
        if ($tipo == 'Dias habiles y feriados') {
            $feriados = $this->Feriado->find('list', array(
                'recursive' => -1,
                'conditions' => array(
                    'Feriado.fecha >=' => $fecha_ini
                ),
                'fields' => array('Feriado.id', 'Feriado.fecha')
            ));
            return $this->get_fecha_xdias($fecha_ini, $dias_l, $feriados);
        } else {
            return date('Y-m-d', strtotime($fecha_ini . " +$dias_l day"));
        }
    }

//Example:
    public function prueba() {
        debug(date('Y-m-d', strtotime("2016-03-24" . " +2 day")));
        exit;
        $feeee = $this->get_fecha_xdias("2016-03-24", 5, array(0 => "2016-03-28"));
        debug($feeee);
        exit;
        $fecha_un = date('Y-m-d', strtotime(date('Y-m-d') . ' -1 day'));

        debug($fecha_un);
        //exit;
        //$holidays = array("2008-12-25", "2008-12-26", "2009-01-01");
        $holidays = array();


        $fecha1 = new DateTime("2016-02-15");
        $fecha2 = new DateTime("2016-03-02");
        // desde el dia siguiente
        $fecha = $fecha1->diff($fecha2);

        //printf('%d años, %d meses, %d días, %d horas, %d minutos', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
        debug($fecha->days + 1);
        //exit;
        $time_stamp = strtotime("2016-02-28");
        debug(date("N", $time_stamp));

        debug($this->getWorkingDays("2016-02-15", "2016-03-02", $holidays));
        exit;
    }

//script para ejecutar con cronjob para que pueda generar automaticamente alertas de aviso para procesos en flujos
    public function creaalertas() {

        $sql1 = "(SELECT pres.estado FROM procesos_estados pres WHERE pres.flujos_user_id = ProcesosEstado.flujos_user_id AND pres.proceso_id = ProcesosEstado.proceso_id ORDER BY pres.id DESC LIMIT 1)";
        $sql2 = "(SELECT DATE(pres.created) FROM procesos_estados pres WHERE pres.flujos_user_id = ProcesosEstado.flujos_user_id AND pres.proceso_id = ProcesosEstado.proceso_id ORDER BY pres.id DESC LIMIT 1)";
        $sql3 = "(SELECT DATE(alertas.fecha_activacion) FROM alertas WHERE alertas.proceso_id = ProcesosEstado.proceso_id AND alertas.flujos_user_id = ProcesosEstado.flujos_user_id AND alertas.tipo LIKE 'Alerta Proceso' LIMIT 1)";
        $this->ProcesosEstado->virtualFields = array(
            'estado' => "$sql1",
            'fecha_activado' => "$sql2"
        );
        $procesos = $this->ProcesosEstado->find('all', array(
            'recursive' => 0,
            'conditions' => array(
                "IF(ISNULL($sql1),FALSE,IF($sql1 = 'Activo',TRUE,FALSE))",
                'FlujosUser.estado LIKE' => 'Activo',
                'Proceso.tiempo !=' => NULL,
                'Proceso.tiempo_alertas !=' => NULL,
                "IF(ISNULL($sql3),TRUE,IF($sql3 = $sql2,FALSE,TRUE))"
            ),
            'group' => array('ProcesosEstado.flujos_user_id', 'ProcesosEstado.proceso_id'),
            'fields' => array('Proceso.*', 'ProcesosEstado.*', 'FlujosUser.descripcion', 'FlujosUser.expediente', 'FlujosUser.expediente')
        ));
        /* debug($procesos);
          exit; */
        foreach ($procesos as $pro) {
            if ($pro['Proceso']['tipo_dias'] === 'Dias habiles y feriados') {
                $feriados = $this->Feriado->find('list', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'Feriado.fecha >=' => $pro['ProcesosEstado']['fecha_activado'],
                        'Feriado.fecha <=' => date('Y-m-d')
                    ),
                    'fields' => array('Feriado.id', 'Feriado.fecha')
                ));
                $g_dias = $this->getWorkingDays($pro['ProcesosEstado']['fecha_activado'], date('Y-m-d'), $feriados);
                if ($g_dias >= ($pro['Proceso']['tiempo'] - $pro['Proceso']['tiempo_alertas'])) {
                    $this->Alerta->create();
                    $d_alerta['user_id'] = 0;
                    $d_alerta['flujos_user_id'] = $pro['ProcesosEstado']['flujos_user_id'];
                    $d_alerta['proceso_id'] = $pro['ProcesosEstado']['proceso_id'];
                    $d_alerta['mensaje'] = 'El proceso de ' . $pro['Proceso']['nombre'] . ' en el flujo ' . $pro['FlujosUser']['expediente'] . ' va a terminar su periodo en ' . $pro['Proceso']['tiempo_alertas'] . ' dias (' . date('Y-m-d') . ')';
                    $d_alerta['tipo'] = 'Alerta Proceso';
                    $d_alerta['estado'] = 'Activo';
                    $d_alerta['fecha_activacion'] = $pro['ProcesosEstado']['fecha_activado'];
                    $this->Alerta->save($d_alerta);
                }
            } else {
                $fecha1 = new DateTime($pro['ProcesosEstado']['fecha_activado']);
                $fecha2 = new DateTime(date('Y-m-d'));
                // desde el dia siguiente
                $fecha = $fecha1->diff($fecha2);
                $g_dias = ($fecha->days + 1);
                if ($g_dias >= ($pro['Proceso']['tiempo'] - $pro['Proceso']['tiempo_alertas'])) {
                    $this->Alerta->create();
                    $d_alerta['user_id'] = 0;
                    $d_alerta['flujos_user_id'] = $pro['ProcesosEstado']['flujos_user_id'];
                    $d_alerta['proceso_id'] = $pro['ProcesosEstado']['proceso_id'];
                    $d_alerta['mensaje'] = 'El proceso de ' . $pro['Proceso']['nombre'] . ' en el flujo ' . $pro['FlujosUser']['expediente'] . ' va a terminar su periodo en ' . $pro['Proceso']['tiempo_alertas'] . ' dias (' . date('Y-m-d') . ')';
                    $d_alerta['tipo'] = 'Alerta Proceso';
                    $d_alerta['estado'] = 'Activo';
                    $d_alerta['fecha_activacion'] = $pro['ProcesosEstado']['fecha_activado'];
                    $this->Alerta->save($d_alerta);
                }
            }
        }

        //debug($procesos);
        exit;
    }

    //finaliza el proceso en caso de que este activado la auto  finalizacion para cronjob
//script para ejecutar con cronjob para que pueda generar automaticamente alertas de finalizacion para procesos en flujos
    public function creaalertasfin() {

        $sql1 = "(SELECT pres.estado FROM procesos_estados pres WHERE pres.flujos_user_id = ProcesosEstado.flujos_user_id AND pres.proceso_id = ProcesosEstado.proceso_id ORDER BY pres.id DESC LIMIT 1)";
        $sql2 = "(SELECT DATE(pres.created) FROM procesos_estados pres WHERE pres.flujos_user_id = ProcesosEstado.flujos_user_id AND pres.proceso_id = ProcesosEstado.proceso_id ORDER BY pres.id DESC LIMIT 1)";
        $sql3 = "(SELECT DATE(alertas.fecha_activacion) FROM alertas WHERE alertas.proceso_id = ProcesosEstado.proceso_id AND alertas.flujos_user_id = ProcesosEstado.flujos_user_id AND alertas.tipo LIKE 'Alerta Fin Proceso' LIMIT 1)";
        $this->ProcesosEstado->virtualFields = array(
            'estado' => "$sql1",
            'fecha_activado' => "$sql2"
        );
        $procesos = $this->ProcesosEstado->find('all', array(
            'recursive' => 0,
            'conditions' => array(
                //'Proceso.auto_fin' => 1,
                'FlujosUser.estado LIKE' => 'Activo',
                'Proceso.tiempo !=' => NULL,
                "IF(ISNULL($sql1),FALSE,IF($sql1 = 'Activo',TRUE,FALSE))",
                "IF(ISNULL($sql3),TRUE,IF($sql3 = $sql2,FALSE,TRUE))"
            ),
            'group' => array('ProcesosEstado.flujos_user_id', 'ProcesosEstado.proceso_id'),
            'fields' => array('Proceso.*', 'ProcesosEstado.*', 'FlujosUser.descripcion', 'FlujosUser.expediente')
        ));
        /* debug($procesos);
          exit; */
        foreach ($procesos as $pro) {
            if ($pro['Proceso']['tipo_dias'] === 'Dias habiles y feriados') {
                $feriados = $this->Feriado->find('list', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'Feriado.fecha >=' => $pro['ProcesosEstado']['fecha_activado'],
                        'Feriado.fecha <=' => date('Y-m-d')
                    ),
                    'fields' => array('Feriado.id', 'Feriado.fecha')
                ));
                $g_dias = $this->getWorkingDays($pro['ProcesosEstado']['fecha_activado'], date('Y-m-d'), $feriados);
            } else {
                $fecha1 = new DateTime($pro['ProcesosEstado']['fecha_activado']);
                $fecha2 = new DateTime(date('Y-m-d'));
                // desde el dia siguiente
                $fecha = $fecha1->diff($fecha2);
                $g_dias = ($fecha->days + 1);
            }
            //Crea la alerta 
            if ($g_dias == ($pro['Proceso']['tiempo'])) {
                $fecha_un = date('Y-m-d');

                $time_stamp = strtotime($fecha_un);
                if (date("N", $time_stamp) == 6) {
                    $fecha_un = date('Y-m-d', strtotime($fecha_un . " +2 day"));
                } elseif (date("N", $time_stamp) == 7) {
                    $fecha_un = date('Y-m-d', strtotime($fecha_un . " +1 day"));
                }
                $mensaje_ad = "";
                if ($pro['Proceso']['auto_fin'] == 1) {
                    $d_estado['user_id'] = 0;
                    $d_estado['flujos_user_id'] = $pro['ProcesosEstado']['flujos_user_id'];
                    $d_estado['proceso_id'] = $pro['ProcesosEstado']['proceso_id'];
                    $d_estado['estado'] = 'Finalizado';
                    $d_estado['created'] = $fecha_un;
                    $this->ProcesosEstado->create();
                    $this->ProcesosEstado->save($d_estado);
                    $mensaje_ad = " y se ha finalizado el proceso ";
                }

                $this->Alerta->create();
                $d_alerta['user_id'] = 0;
                $d_alerta['flujos_user_id'] = $pro['ProcesosEstado']['flujos_user_id'];
                $d_alerta['proceso_id'] = $pro['ProcesosEstado']['proceso_id'];
                $d_alerta['mensaje'] = 'El proceso de ' . $pro['Proceso']['nombre'] . ' en el flujo ' . $pro['FlujosUser']['expediente'] . ' termino su tiempo (' . $fecha_un . ") $mensaje_ad";
                $d_alerta['tipo'] = 'Alerta Fin Proceso';
                $d_alerta['estado'] = 'Activo';
                $d_alerta['fecha_activacion'] = $pro['ProcesosEstado']['fecha_activado'];
                $d_alerta['created'] = $fecha_un;
                $this->Alerta->save($d_alerta);
            } elseif ($g_dias > ($pro['Proceso']['tiempo'])) {

                $a_dias = ($g_dias - $pro['Proceso']['tiempo']);
                $fecha_un = date('Y-m-d', strtotime(date('Y-m-d') . " -$a_dias day"));

                $time_stamp = strtotime($fecha_un);
                if (date("N", $time_stamp) == 6) {
                    $fecha_un = date('Y-m-d', strtotime($fecha_un . " +2 day"));
                } elseif (date("N", $time_stamp) == 7) {
                    $fecha_un = date('Y-m-d', strtotime($fecha_un . " +1 day"));
                }

                $mensaje_ad = "";
                if ($pro['Proceso']['auto_fin'] == 1) {
                    $d_estado['user_id'] = 0;
                    $d_estado['flujos_user_id'] = $pro['ProcesosEstado']['flujos_user_id'];
                    $d_estado['proceso_id'] = $pro['ProcesosEstado']['proceso_id'];
                    $d_estado['estado'] = 'Finalizado';
                    $d_estado['created'] = $fecha_un;
                    $this->ProcesosEstado->create();
                    $this->ProcesosEstado->save($d_estado);
                    $mensaje_ad = " y se ha finalizado el proceso ";
                }

                $this->Alerta->create();
                $d_alerta['user_id'] = 0;
                $d_alerta['flujos_user_id'] = $pro['ProcesosEstado']['flujos_user_id'];
                $d_alerta['proceso_id'] = $pro['ProcesosEstado']['proceso_id'];
                $d_alerta['mensaje'] = 'El proceso de ' . $pro['Proceso']['nombre'] . ' en el flujo ' . $pro['FlujosUser']['expediente'] . ' termino su tiempo (' . $fecha_un . ") $mensaje_ad";
                $d_alerta['tipo'] = 'Alerta Fin Proceso';
                $d_alerta['estado'] = 'Activo';
                $d_alerta['fecha_activacion'] = $pro['ProcesosEstado']['fecha_activado'];
                $d_alerta['created'] = $fecha_un;
                $this->Alerta->save($d_alerta);
            }
        }

        //debug($procesos);
        exit;
    }

}
