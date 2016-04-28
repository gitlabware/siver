<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class HojasRutasController extends AppController {

    public $layout = 'svergara';
    public $uses = array(
        'HojasRuta', 'Requisito', 'Cliente', 
        'HojasRequisito', 'Flujo', 'User', 
        'Proceso', 'Regione','FlujosUser',
        'Adjunto'
        );

    public function index() {
        $hojas = $this->HojasRuta->find('all', array(
            'recursive' => 0,
            'order' => array('HojasRuta.id DESC')
        ));
        $this->set(compact('hojas'));
    }

    public function hoja_ruta($idCliente = null) {
        if (!empty($this->request->data['HojasRuta'])) {
            $idUser = $this->Session->read('Auth.User.id');

            $this->HojasRuta->create();
            $this->HojasRuta->save($this->request->data['HojasRuta']);
            $idHojaruta = $this->HojasRuta->getLastInsertID();
            foreach ($this->request->data['requisitos'] as $re) {
                $dato_r['hojas_ruta_id'] = $idHojaruta;
                $dato_r['requisito_id'] = $re['requisito_id'];
                $dato_r['estado'] = $re['estado'];
                $dato_r['user_id'] = $idUser;
                $this->HojasRequisito->create();
                $this->HojasRequisito->save($dato_r);
            }

            foreach ($this->request->data['orequisitos'] as $re) {
                $dato_r2['hojas_ruta_id'] = $idHojaruta;
                $dato_r2['estado'] = 1;
                $dato_r2['user_id'] = $idUser;
                $dato_r2['descripcion'] = $re['requisito'];
                $this->HojasRequisito->create();
                $this->HojasRequisito->save($dato_r2);
            }
            $this->Session->setFlash("Se ha registrado correctamente la hoja de ruta!!", 'msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        $requisitos = $this->Requisito->find('all', array(
            'recursive' => -1
        ));
        $cliente = $this->Cliente->find('first', array(
            'recursive' => -1,
            'conditions' => array('Cliente.id' => $idCliente)
        ));
        $this->set(compact('requisitos', 'cliente'));
    }

    public function ver_hoja($idHojasRuta = null) {
        $hojasRuta = $this->HojasRuta->find('first', array(
            'recursive' => 0,
            'conditions' => array('HojasRuta.id' => $idHojasRuta)
        ));
        $flujos = $this->Flujo->find('all', array(
            'recursive' => -1
        ));
        $this->FlujosUser->virtualFields = array(
            'estado_color' => "(IF(FlujosUser.estado = 'Finalizado','success',''))"
        );
        $flujos_c = $this->FlujosUser->find('all', array(
            'recursive' => 0,
            'conditions' => array('FlujosUser.hojas_ruta_id' => $idHojasRuta),
            'fields' => array('Flujo.*', 'User.*', 'FlujosUser.*', 'Cliente.nombre'),
            'order' => array('FlujosUser.created DESC')
        ));

        $this->set(compact('hojasRuta', 'flujos','flujos_c'));
    }

    public function iniciar_caso($idHojasRuta = null, $idFlujo = null) {
        $this->layout = 'ajax';
        if (!empty($this->request->data['FlujosUser'])) {
            
            $this->FlujosUser->create();
            $d_flujo = $this->request->data['FlujosUser'];
            //$d_flujo['descripcion'] = $this->request->data['FlujosUser']['descripcion'];
            $d_flujo['flujo_id'] = $idFlujo;
            $d_flujo['user_id'] = $this->Session->read('Auth.User.id');
            $error = $this->validar('FlujosUser');
            if (empty($error)) {

                $this->FlujosUser->save($d_flujo);
                if (empty($idFlujosUser)) {
                    $idFlujosUser = $this->FlujosUser->getLastInsertID();
                    $folder = new Folder();

                    if ($folder->create(WWW_ROOT . 'files' . DS . $d_flujo['expediente'])) {
// Successfully created the nested folders
                        $this->Adjunto->create();
                        $adj['nombre_original'] = $adj['nombre'] = $d_flujo['expediente'];
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
                        $this->Session->setFlash('Se ha registrado correctamente!!', 'msgbueno');
                    }
                } else {
                    $flujo = $this->FlujosUser->findByid($idFlujosUser, NULL, NULL, 0);

                    $this->Adjunto->id = $flujo['FlujosUser']['adjunto_id'];
                    $adj['nombre_original'] = $adj['nombre'] = $d_flujo['expediente'];
                    $this->Adjunto->save($adj);

                    $folder = new Folder(WWW_ROOT . 'files' . DS . $flujo['Adjunto']['nombre_original']);
                    $folder->move(WWW_ROOT . 'files' . DS . $d_flujo['expediente']);
                    $this->Session->setFlash('Se ha registrado correctamente!!', 'msgbueno');
                    $this->redirect($this->referer());
                }
            } else {
                $this->Session->setFlash($error, 'msgerror');
                $this->redirect($this->referer());
            }

            $this->Session->write('swdocumentos', true);
            //debug($this->Session->read('swdocumentos'));exit;
            $this->redirect(array('controller' => 'Flujos','action' => 'enflujo', $idFlujosUser));
        }
        $flujo = $this->Flujo->find('first', array(
            'recursive' => -1,
            'conditions' => array('Flujo.id' => $idFlujo)
        ));
        $usuarios = $this->User->find('list', arraY(
            'recursive' => -1,
            'conditions' => array('User.role' => 'Usuario'),
            'fields' => array('User.id', 'User.nombre_completo')
        ));
        $regiones = $this->Regione->find('list', array(
            'fields' => array('Regione.id', 'Regione.nombre'),
            'order' => array('Regione.nombre ASC')
        ));
        $procesos = $this->Proceso->find('list', array(
            'recursive' => -1,
            'conditions' => array('Proceso.flujo_id' => $idFlujo),
            'fields' => array('Proceso.id', 'Proceso.nombre')
        ));
        $this->set(compact('flujo', 'usuarios', 'regiones', 'procesos','idHojasRuta'));
    }

}
