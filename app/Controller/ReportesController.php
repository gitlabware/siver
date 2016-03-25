<?php

class ReportesController extends AppController{
    
    public $layout = 'svergara';
    public $uses = array('Regione');


    public function reporte_general(){
        $dias_v = array(
            0 => ''
        );
        $regiones = $this->Regione->find('list',array('fields' => array('Regione.id','Regione.nombre')));
        $this->set(compact('regiones'));
    }
}