<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class HojasRutasController extends AppController {

    public $layout = 'svergara';
    public $uses = array(
        'HojasRuta', 'Requisito', 'Cliente',
        'HojasRequisito', 'Flujo', 'User',
        'Proceso', 'Regione', 'FlujosUser',
        'Adjunto', 'Resultado', 'FlujosUsersResultado',
        'ProcesosEstado', 'Tributo', 'FlujosUsersTributo'
    );
    public $components = array('RequestHandler');

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

    public function index() {
        $hojas = $this->HojasRuta->find('all', array(
            'recursive' => 0,
            'order' => array('HojasRuta.id DESC')
        ));
        $this->set(compact('hojas'));
    }

    public function hoja_ruta($idCliente = null, $idHojaruta = null) {

        if (!empty($this->request->data['HojasRuta'])) {
            $idUser = $this->Session->read('Auth.User.id');

            //---------------- GUARDA Y CREA LA CARPETA PARA HOJAS-RUTA
            $folder = new Folder();

            if (!empty($this->request->data['HojasRuta']['id'])) {
                $idHojaruta = $this->request->data['HojasRuta']['id'];
                $idAdjunto = $this->request->data['HojasRuta']['adjunto_id'];
                $this->Adjunto->id = $this->request->data['HojasRuta']['adjunto_id'];
                $adj['nombre_original'] = $adj['nombre'] = $this->request->data['HojasRuta']['codigo_caso'];
                $this->Adjunto->save($adj);

                $folder = new Folder(WWW_ROOT . 'files' . DS . $this->request->data['HojasRuta']['codigo_caso']);
                $folder->move(WWW_ROOT . 'files' . DS . $this->request->data['HojasRuta']['codigo_caso']);
            } else {
                if ($folder->create(WWW_ROOT . 'files' . DS . $this->request->data['HojasRuta']['codigo_caso'])) {
                    $this->HojasRuta->create();
                    $this->HojasRuta->save($this->request->data['HojasRuta']);
                    $idHojaruta = $this->HojasRuta->getLastInsertID();
                    $this->Adjunto->create();
                    $adj['nombre_original'] = $adj['nombre'] = $this->request->data['HojasRuta']['codigo_caso'];
                    $adj['user_id'] = $this->Session->read('Auth.User.id');
                    $adj['tipo'] = 'Carpeta';
                    $adj['estado'] = 'Activo';
                    $adj['flujos_user_id'] = 0;
                    $adj['proceso_id'] = 0;
                    $adj['hojas_ruta_id'] = $idHojaruta;
                    $adj['tarea_id'] = 0;
                    $this->Adjunto->save($adj);
                    $idAdjunto = $this->Adjunto->getLastInsertID();
                    $this->HojasRuta->id = $idHojaruta;
                    $d_hoja['adjunto_id'] = $idAdjunto;
                    $this->HojasRuta->save($d_hoja);
                    //$this->Session->setFlash('Se ha registrado correctamente!!', 'msgbueno');
                }
                $idHojaruta = $this->HojasRuta->getLastInsertID();
            }


            //------------------ TERMINA LA CREACION DE LA CARPETA
            //------------------ REGISTRA REQUISITOS --------------
            if (!empty($this->request->data['requisitos'])) {
                foreach ($this->request->data['requisitos'] as $re) {
                    $re['hojas_ruta_id'] = $idHojaruta;
                    $re['user_id'] = $idUser;
                    $this->HojasRequisito->create();
                    $this->HojasRequisito->save($re);
                }
            }
            $array_oreq = array();

            if (!empty($this->request->data['orequisitos'])) {
                foreach ($this->request->data['orequisitos'] as $key => $re) {
                    if (!empty($re['id'])) {
                        $array_oreq[$key] = $re['id'];
                    }
                }
                if (count($array_oreq) > 1) {
                    $this->HojasRequisito->deleteAll(array(
                        'HojasRequisito.hojas_ruta_id' => $idHojaruta, 'HojasRequisito.id !=' => $array_oreq, 'HojasRequisito.requisito_id' => NULL
                    ));
                } elseif (count($array_oreq) == 1) {
                    $this->HojasRequisito->deleteAll(array(
                        'HojasRequisito.hojas_ruta_id' => $idHojaruta, 'HojasRequisito.id !=' => current($array_oreq), 'HojasRequisito.requisito_id' => NULL
                    ));
                }
                foreach ($this->request->data['orequisitos'] as $key => $re) {

                    $re['hojas_ruta_id'] = $idHojaruta;
                    $re['estado'] = 1;
                    $re['user_id'] = $idUser;
                    $this->HojasRequisito->create();
                    $this->HojasRequisito->save($re);
                }
            } else {
                $this->HojasRequisito->deleteAll(array(
                    'HojasRequisito.hojas_ruta_id' => $idHojaruta, 'HojasRequisito.requisito_id' => NULL
                ));
            }
            //------------------------- TERMINA REGISTRO DE REQUISITOS ----------------
            //
            //------------------------- REGISTRO DE FLUJOS/RECURSOS PARA CADA UNO ----------------
            if (!empty($this->request->data['FlujosUser'])) {
                foreach ($this->request->data['FlujosUser'] as $flu) {
                    //---------------- Guarda uno a uno los FlujosuSER --------------
                    $flu['hojas_ruta_id'] = $idHojaruta;
                    $this->request->data = array();
                    $this->request->data = $flu;

                    $this->FlujosUser->create();
                    //$d_flujo = $this->request->data['FlujosUser'] = $flu;
                    //$d_flujo['flujo_id'] = $idFlujo;
                    $flu['adjunto_id'] = $idAdjunto;
                    $flu['user_id'] = $this->Session->read('Auth.User.id');
                    //$idFlujo = $d_flujo['flujo_id'] ;
                    //debug( $this->request->data);exit;
                    $this->FlujosUser->save($flu);
                    if (!empty($this->request->data['id'])) {
                        $idFlujosUser = $this->request->data['id'];
                        //debug('enytro aki');exit;
                    } else {
                        $idFlujosUser = $this->FlujosUser->getLastInsertID();
                    }
                    
                    //debug($idFlujosUser);exit;
                    //$flujo = $this->FlujosUser->findByid($idFlujosUser, NULL, NULL, 0);
                    $this->guarda_resultados($idFlujosUser);
                    $this->guarda_tributos($idFlujosUser);
                    //-------------- Termina FlujosUser -----------------------
                }
            }
            //-------------------------- TERMINA REGISTRO DE RECURSOS --------------------------

            $this->Session->setFlash("Se ha registrado correctamente la hoja de ruta!!", 'msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        $this->HojasRuta->id = $idHojaruta;
        $this->request->data = $this->HojasRuta->read();
        if (!empty($idHojaruta)) {
            $requisitos = $this->HojasRequisito->find('all', array(
                'recursive' => 0,
                'conditions' => array('HojasRequisito.hojas_ruta_id' => $idHojaruta, 'HojasRequisito.requisito_id <>' => NULL),
                'fields' => array('HojasRequisito.*', 'Requisito.*')
            ));
            foreach ($requisitos as $key => $re) {
                $this->request->data['requisitos'][$key] = $re['HojasRequisito'];
            }
            $requisitos_ad = $this->HojasRequisito->find('all', array(
                'recursive' => 0,
                'conditions' => array('HojasRequisito.hojas_ruta_id' => $idHojaruta, 'HojasRequisito.requisito_id' => NULL),
                'fields' => array('HojasRequisito.*')
            ));
            ///debug($requisitos_ad);exit;

            foreach ($requisitos_ad as $key => $re) {

                $this->request->data['orequisitos'][$key] = $re['HojasRequisito'];
            }
        } else {
            $requisitos = $this->Requisito->find('all', array(
                'recursive' => -1
            ));
        }

        $flujos = $this->FlujosUser->find('all', array(
            'recursive' => 0,
            'conditions' => array('FlujosUser.hojas_ruta_id' => $idHojaruta),
            'fields' => array('FlujosUser.*', 'Flujo.*')
        ));
        if (empty($flujos)) {
            $flujos = $this->Flujo->find('all', array(
                'recursive' => -1,
                'conditions' => array('Flujo.hoja_ruta' => 1)
            ));
        }

        foreach ($flujos as $key_f => $flu) {


            if (!empty($flu['FlujosUser']['id'])) {
                $flujos[$key_f]['Flujo']['resultados'] = $this->FlujosUsersResultado->find('all', array(
                    'recursive' => 0,
                    'conditions' => array('FlujosUsersResultado.flujos_user_id' => $flu['FlujosUser']['id']),
                    'fields' => array('FlujosUsersResultado.*', 'Resultado.*')
                ));
                $this->request->data['FlujosUser'][$key_f] = $flu['FlujosUser'];
            }
            if (empty($flujos[$key_f]['Flujo']['resultados'])) {
                $flujos[$key_f]['Flujo']['resultados'] = $this->Resultado->find('all', array(
                    'recursive' => -1,
                    'conditions' => array('Resultado.flujo_id' => $flu['Flujo']['id'])
                ));
            }
            if (!empty($flu['Flujo']['tributos_determinados'])) {
                if (!empty($flu['FlujosUser']['id'])) {
                    $flujos[$key_f]['Flujo']['tributos'] = $this->FlujosUsersTributo->find('all', array(
                        'recursive' => 0,
                        'conditions' => array('FlujosUsersTributo.flujos_user_id' => $flu['FlujosUser']['id']),
                        'fields' => array('Tributo.*', 'FlujosUsersTributo.*')
                    ));
                }
                if (empty($flujos[$key_f]['Flujo']['tributos'])) {
                    $flujos[$key_f]['Flujo']['tributos'] = $this->Tributo->find('all', array(
                        'recursive' => -1
                    ));
                } else {
                    foreach ($flujos[$key_f]['Flujo']['tributos'] as $key => $tri) {
                        $this->request->data['FlujosUser'][$key_f]['tributos'][$key] = $tri['FlujosUsersTributo'];
                    }
                }
            }
        }
         /*debug($flujos);
          exit; */

        $cliente = $this->Cliente->find('first', array(
            'recursive' => -1,
            'conditions' => array('Cliente.id' => $idCliente)
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

        $this->set(compact('requisitos', 'cliente', 'requisitos_ad', 'flujos', 'usuarios', 'regiones'));
    }

    public function get_num_reg($idRegion = null) {
        $this->layout = 'ajax';
        $numero_sucur = $this->HojasRuta->find('first', array(
            'recursive' => -1,
            'conditions' => array('HojasRuta.regione_id' => $idRegion)
        ));
        $region = $this->Regione->find('first', array(
            'recursive' => -1,
            'conditions' => array('Regione.id' => $idRegion),
            'fields' => array('Regione.sigla')
        ));
        $numero = 1;
        if (!empty($numero_sucur['HojasRuta']['numero_codigo'])) {
            $numero = $numero_sucur['HojasRuta']['numero_codigo'] + 1;
        }
        //debug($numero);exit;
        $array['numero'] = $region['Regione']['sigla'] . '-' . $numero;
        $this->respond($array, true);
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
            'joins' => array(
                array(
                    'table' => 'clientes',
                    'alias' => 'Cliente',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'Cliente.id = HojasRuta.cliente_id',
                    ),
                )
            ),
            'conditions' => array('FlujosUser.hojas_ruta_id' => $idHojasRuta),
            'fields' => array('Flujo.*', 'User.*', 'FlujosUser.*', 'Cliente.nombre', 'Asesor.nombre_completo'),
            'order' => array('Flujo.id ASC')
        ));
        $this->HojasRequisito->virtualFields = array(
            'estado2' => "IF(HojasRequisito.estado = 1,'<b>SI</b>','NO')",
            'requisito' => "IF(ISNULL(HojasRequisito.requisito_id),CONCAT('<b>',HojasRequisito.descripcion,'</b>'),Requisito.descripcion)"
        );
        $hojas_requisitos = $this->HojasRequisito->find('all', array(
            'recursive' => 0,
            'conditions' => array('HojasRequisito.hojas_ruta_id' => $idHojasRuta,'HojasRequisito.requisito_id <>' => NULL)
        ));
        
        $hojas_requisitos_otros = $this->HojasRequisito->find('all', array(
            'recursive' => 0,
            'conditions' => array('HojasRequisito.hojas_ruta_id' => $idHojasRuta,'HojasRequisito.requisito_id' => NULL),
            //'fields' => array('HojasRequisito.descripcion')
        ));
        //debug($hojas_requisitos_otros);exit;

        $this->set(compact('hojasRuta', 'flujos', 'flujos_c', 'hojas_requisitos','hojas_requisitos_otros'));
    }

    public function get_procesos($idFlujo = null, $idFlujosUser = null) {
        $procesos = $this->Proceso->find('all', array(
            'recursive' => -1,
            'conditions' => array('Proceso.flujo_id' => $idFlujo, 'Proceso.hoja_ruta' => 1)
        ));
        foreach ($procesos as $key => $pro) {
            $pro_fecha_ini = $this->ProcesosEstado->find('first', array(
                'recursive' => -1,
                'conditions' => array('ProcesosEstado.flujos_user_id' => $idFlujosUser, 'ProcesosEstado.proceso_id' => $pro['Proceso']['id'], 'ProcesosEstado.estado LIKE' => 'Activo'),
                'fields' => array('ProcesosEstado.created'),
                'order' => array('ProcesosEstado.id DESC')
            ));
            $pro_fecha_fin = $this->ProcesosEstado->find('first', array(
                'recursive' => -1,
                'conditions' => array('ProcesosEstado.flujos_user_id' => $idFlujosUser, 'ProcesosEstado.proceso_id' => $pro['Proceso']['id'], 'ProcesosEstado.estado LIKE' => 'Finalizado'),
                'fields' => array('ProcesosEstado.created'),
                'order' => array('ProcesosEstado.id DESC')
            ));
            $procesos[$key]['Proceso']['fecha_inicio'] = NULL;
            if (!empty($pro_fecha_ini)) {
                $procesos[$key]['Proceso']['fecha_inicio'] = $pro_fecha_ini['ProcesosEstado']['created'];
            }
            $procesos[$key]['Proceso']['fecha_fin'] = NULL;
            if (!empty($pro_fecha_fin)) {
                $procesos[$key]['Proceso']['fecha_fin'] = $pro_fecha_ini['ProcesosEstado']['created'];
            }
        }

        return $procesos;
    }

    public function get_resultados($idFlujosUser = null) {
        return $this->FlujosUsersResultado->find('all', array(
                    'recursive' => 0,
                    'conditions' => array('FlujosUsersResultado.flujos_user_id' => $idFlujosUser),
                    'fields' => array('Resultado.*', 'FlujosUsersResultado.respuesta')
        ));
    }

    public function get_tributos($idFlujosUser = null) {
        return $this->FlujosUsersTributo->find('all', array(
                    'recursive' => 0,
                    'conditions' => array('FlujosUsersTributo.flujos_user_id' => $idFlujosUser),
                    'fields' => array('Tributo.*', 'FlujosUsersTributo.*')
        ));
    }

    public function iniciar_caso($idHojasRuta = null, $idFlujo = null, $idFlujosUser = NULL) {
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
                    $this->guarda_resultados($idFlujosUser);
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
                    $this->guarda_resultados($idFlujosUser);
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
            $this->redirect(array('controller' => 'Flujos', 'action' => 'enflujo', $idFlujosUser));
        }

        if (!empty($idFlujosUser)) {
            $this->FlujosUser->id = $idFlujosUser;
            $this->request->data = $this->FlujosUser->read();
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

        $resultados = $this->FlujosUsersResultado->find('all', array(
            'recursive' => 0,
            'conditions' => array('FlujosUsersResultado.flujos_user_id' => $idFlujosUser),
            'fields' => array('FlujosUsersResultado.*', 'Resultado.*')
        ));
        if (empty($resultados)) {
            $resultados = $this->Resultado->find('all', array(
                'recursive' => -1,
                'conditions' => array('Resultado.flujo_id' => $idFlujo)
            ));
        }
        $this->set(compact('flujo', 'usuarios', 'regiones', 'procesos', 'idHojasRuta', 'resultados'));
    }

    public function caso($idHojasRuta = null, $idFlujo = null, $idFlujosUser = NULL) {

        if (!empty($this->request->data['FlujosUser'])) {

            $this->FlujosUser->create();
            $d_flujo = $this->request->data['FlujosUser'];
            //$d_flujo['descripcion'] = $this->request->data['FlujosUser']['descripcion'];
            $d_flujo['flujo_id'] = $idFlujo;
            $d_flujo['user_id'] = $this->Session->read('Auth.User.id');
            $error = $this->validar('FlujosUser');
            if (empty($error)) {

                $this->FlujosUser->save($d_flujo);
                $flujo = $this->FlujosUser->findByid($idFlujosUser, NULL, NULL, 0);
                $this->guarda_resultados($idFlujosUser);
                $this->guarda_tributos($idFlujosUser);
                $this->Adjunto->id = $flujo['FlujosUser']['adjunto_id'];
                $adj['nombre_original'] = $adj['nombre'] = $d_flujo['expediente'];
                $this->Adjunto->save($adj);

                $folder = new Folder(WWW_ROOT . 'files' . DS . $flujo['Adjunto']['nombre_original']);
                $folder->move(WWW_ROOT . 'files' . DS . $d_flujo['expediente']);
                $this->Session->setFlash('Se ha registrado correctamente!!', 'msgbueno');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash($error, 'msgerror');
                $this->redirect($this->referer());
            }

            $this->Session->write('swdocumentos', true);
            //debug($this->Session->read('swdocumentos'));exit;
            $this->redirect(array('controller' => 'Flujos', 'action' => 'enflujo', $idFlujosUser));
        }

        if (!empty($idFlujosUser)) {
            $this->FlujosUser->id = $idFlujosUser;
            $this->request->data = $this->FlujosUser->read();
        }
        $flujo = $this->Flujo->find('first', array(
            'recursive' => -1,
            'conditions' => array('Flujo.id' => $idFlujo)
        ));
        $flujo_user = $this->FlujosUser->find('first', array(
            'recursive' => 0,
            'conditions' => array('FlujosUser.id' => $idFlujosUser)
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

        $sql_1 = "(SELECT pres.estado FROM procesos_estados pres WHERE pres.flujos_user_id = $idFlujosUser AND pres.proceso_id = Proceso.id ORDER BY pres.id DESC LIMIT 1)";
        $this->Proceso->virtualFields = array(
            'estado' => "$sql_1"
        );
        $procesos_2 = $this->Proceso->find('all', array(
            'recursive' => -1,
            'conditions' => array('Proceso.flujo_id' => $flujo['Flujo']['id']),
            'order' => array('Proceso.orden ASC', 'Proceso.id ASC')
        ));

        $resultados = $this->FlujosUsersResultado->find('all', array(
            'recursive' => 0,
            'conditions' => array('FlujosUsersResultado.flujos_user_id' => $idFlujosUser),
            'fields' => array('FlujosUsersResultado.*', 'Resultado.*')
        ));
        if (empty($resultados)) {
            $resultados = $this->Resultado->find('all', array(
                'recursive' => -1,
                'conditions' => array('Resultado.flujo_id' => $idFlujo)
            ));
        }
        $procesos = $this->Proceso->find('list', array(
            'recursive' => -1,
            'conditions' => array('Proceso.flujo_id' => $idFlujo),
            'fields' => array('Proceso.id', 'Proceso.nombre')
        ));

        if (!empty($flujo['Flujo']['tributos_determinados'])) {
            $tributos = $this->FlujosUsersTributo->find('all', array(
                'recursive' => 0,
                'conditions' => array('FlujosUsersTributo.flujos_user_id' => $idFlujosUser),
                'fields' => array('Tributo.*', 'FlujosUsersTributo.*')
            ));
            if (empty($tributos)) {
                $tributos = $this->Tributo->find('all', array(
                    'recursive' => -1
                ));
            } else {
                foreach ($tributos as $key => $tri) {
                    $this->request->data['tributos'][$key] = $tri['FlujosUsersTributo'];
                }
            }
        }
        $this->set(compact('flujo', 'usuarios', 'regiones', 'procesos', 'procesos_2', 'idHojasRuta', 'resultados', 'flujo_user', 'idFlujosUser', 'tributos'));
    }

    public function guarda_resultados($idFlujosUser = null) {
        if (!empty($this->request->data['Resultados'])) {
            foreach ($this->request->data['Resultados'] as $resu) {
                $resu['flujos_user_id'] = $idFlujosUser;
                $this->FlujosUsersResultado->create();
                $this->FlujosUsersResultado->save($resu);
            }
        }
    }

    public function guarda_tributos($idFlujosUser = null) {
        if (!empty($this->request->data['tributos'])) {
            foreach ($this->request->data['tributos'] as $tri) {
                $tri['flujos_user_id'] = $idFlujosUser;
                $this->FlujosUsersTributo->create();
                $this->FlujosUsersTributo->save($tri);
            }
        }
    }

    public function eliminar($idHojaRuta = null) {
        $this->HojasRuta->delete($idHojaRuta, TRUE);
        $this->Session->setFlash("Se ha eliminado correctamente la hoja-ruta!!", 'msgbueno');
        $this->redirect($this->referer());
    }

}
