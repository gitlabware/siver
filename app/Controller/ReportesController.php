<?php

class ReportesController extends AppController {

    public $layout = 'svergara';
    public $uses = array('Regione', 'Flujo', 'FlujosUser', 'ProcesosEstado','Feriado','Tarea');

    public function reporte_general() {
        $flujos = $this->Flujo->find('list', array(
            'recursive' => -1,
            'fields' => array('Flujo.id', 'Flujo.nombre')
        ));
        $regiones = $this->Regione->find('list', array('fields' => array('Regione.id', 'Regione.nombre')));


        $this->FlujosUser->virtualFields = array(
            'proceso' => "(SELECT procesos_estados.id FROM procesos_estados WHERE procesos_estados.flujos_user_id = FlujosUser.id ORDER BY procesos_estados.id DESC LIMIT 1)"
        );
        $flujos_user = $this->FlujosUser->find('all', array(
            'recursive' => 0,
            'conditions' => array('FlujosUser.estado' => 'Activo'),
            'fields' => array(
                'FlujosUser.id',
                'FlujosUser.expediente',
                'Cliente.nombre',
                'Regione.nombre',
                'FlujosUser.proceso',
                'Flujo.nombre',
                'FlujosUser.descripcion'
            )
        ));
        $this->set(compact('regiones', 'flujos','flujos_user'));
    }

    public function get_dat_proceso($idProceso_es = null) {
        //debug($idProceso_es);
        $p_estado = $this->ProcesosEstado->find('first', array(
            'recursive' => 0,
            'conditions' => array('ProcesosEstado.id' => $idProceso_es),
            'fields' => array('Proceso.*', 'ProcesosEstado.*', 'DATE(ProcesosEstado.created) AS creado')
        ));
        
        $p_estado['ProcesosEstado']['dias_v'] = '';
        //debug($p_estado);exit;
        if (!empty($p_estado['ProcesosEstado']['estado']) && $p_estado['ProcesosEstado']['estado'] == 'Activo' && !empty($p_estado['Proceso']['tiempo']) && !empty($p_estado['Proceso']['tipo_dias'])) {

            if ($p_estado['Proceso']['tipo_dias'] == 'Dias habiles y feriados') {
                $feriados = $this->Feriado->find('list', array(
                    'recursive' => -1,
                    'conditions' => array(
                        'Feriado.fecha >=' => $p_estado[0]['creado']
                    ),
                    'fields' => array('Feriado.id', 'Feriado.fecha')
                ));
                $p_estado['ProcesosEstado']['dias_v'] = $p_estado['Proceso']['tiempo']-$this->getWorkingDays($p_estado[0]['creado'], date('Y-m-d'), $feriados);
                //$p_estado['ProcesosEstado']['dias_v'] = $this->requestAction(array('controller' => 'Procesos', 'action' => 'getWorkingDays', $p_estado[0]['creado'], date('Y-m-d'), $feriados));
            } else {

                $datetime1 = date_create($p_estado[0]['creado']);
                $datetime2 = date_create(date('Y-m-d'));
                $interval = date_diff($datetime1, $datetime2);
                $p_estado['ProcesosEstado']['dias_v'] =  $p_estado['Proceso']['tiempo']-$interval;
                //$interval->format('%R%a días');
            }
        }
        return $p_estado;
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
    
    public function detalle_reporte($idFlujosUser = null){
        $this->layout = 'ajax';
        $this->FlujosUser->virtualFields = array(
            'proceso' => "(SELECT procesos_estados.id FROM procesos_estados WHERE procesos_estados.flujos_user_id = FlujosUser.id ORDER BY procesos_estados.id DESC LIMIT 1)"
        );
        $flujos_user = $this->FlujosUser->find('first',array(
            'recursive' => 0,
            'conditions' => array('FlujosUser.id' => $idFlujosUser)
        ));
        
        $procesos_estados = $this->ProcesosEstado->find('all',array(
            'recurisve' => 0,
            'conditions' => array('ProcesosEstado.flujos_user_id' => $idFlujosUser),
            'fields' => array('ProcesosEstado.*','Proceso.nombre')
        ));
        $tareas = $this->Tarea->find('all',array(
            'recursive' => 0,
            'conditions' => array('Tarea.flujos_user_id' => $idFlujosUser),
            'fields' => array('Tarea.*','User.nombre_completo','Asignado.nombre_completo')
        ));
        
        $this->set(compact('flujos_user','procesos_estados','tareas'));
    }

}
