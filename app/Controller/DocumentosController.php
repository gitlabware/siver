<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class DocumentosController extends AppController {

    public $layout = 'svergara';
    public $uses = array('Adjunto', 'FlujosUser', 'User', 'Documento', 'UsersVisible');
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

    public function documentos($idFlujosUser = null) {
        $this->layout = 'ajax';

        $documentos = $this->Documento->find('list', array(
            'recursive' => -1,
            'group' => array('Documento.tipo'),
            'fields' => array('Documento.tipo', 'Documento.tipo')
        ));
        $this->set(compact('idFlujosUser', 'documentos'));
    }

    public function guarda_docuementos($idFlujosUser = null, $numero = null) {
        /* debug($this->request->data['documentos'][$numero]);
          exit; */
        //$this->request->data['documentos'][$numero];
        if (!empty($this->request->data['documentos'][$numero]['archivo']['size'])) {
            $flujos_user = $this->FlujosUser->find('first', array(
                'recursive' => -1,
                'conditions' => array('FlujosUser.id' => $idFlujosUser)
            ));
            $this->request->data['Adjunto']['parent_id'] = $flujos_user['FlujosUser']['adjunto_id'];
            $this->request->data['Adjunto']['archivo'] = $this->request->data['documentos'][$numero]['archivo'];
            $this->request->data['Adjunto']['flujos_user_id'] = $idFlujosUser;
            $this->request->data['Adjunto']['estado'] = 'Activo';
            $this->request->data['Adjunto']['tipo'] = 'Archivo';
            $this->request->data['Adjunto']['visible'] = 'Todos';
            $this->request->data['Adjunto']['user_id'] = $this->Session->read('Auth.User.id');

            $idAdjunto = $this->guarda_archivo();
            if (!empty($idAdjunto)) {
                $d_doc['adjunto_id'] = $idAdjunto;
            }
        }
        $d_doc['tipo'] = $this->request->data['documentos'][$numero]['tipo'];
        if (!empty($this->request->data['documentos'][$numero]['original']) && $this->request->data['documentos'][$numero]['original'] == 'on') {
            $d_doc['original'] = 1;
        } else {
            $d_doc['original'] = 0;
        }
        $d_doc['hojas'] = $this->request->data['documentos'][$numero]['hojas'];

        $d_doc['user_id'] = $this->Session->read('Auth.User.id');
        $d_doc['flujos_user_id'] = $idFlujosUser;
        $array['error'] = '';
        $this->Documento->create();
        if (!$this->Documento->save($d_doc)) {
            $array['error'] = 'No se ha podido registrar el documento!!!';
        }

        $this->respond($array, true);
    }

    public function guarda_docuemento() {
        /* debug($this->request->data);
          exit; */
        //$this->request->data['documentos'][$numero];
        $array['error'] = '';
        $documento = $this->Documento->find('first', array(
            'recurisve' => -1,
            'conditions' => array('Documento.id' => $this->request->data['Documento']['id'])
        ));
        $idFlujosUser = $documento['Documento']['flujos_user_id'];
        if (!empty($documento['Documento']['adjunto_id'])) {
            $this->eliminar_archivo($documento['Documento']['adjunto_id']);
        }
        if (!empty($this->request->data['Documento']['archivo']['size'])) {
            $flujos_user = $this->FlujosUser->find('first', array(
                'recursive' => -1,
                'conditions' => array('FlujosUser.id' => $idFlujosUser)
            ));
            $this->request->data['Adjunto']['parent_id'] = $flujos_user['FlujosUser']['adjunto_id'];
            $this->request->data['Adjunto']['archivo'] = $this->request->data['Documento']['archivo'];
            $this->request->data['Adjunto']['flujos_user_id'] = $idFlujosUser;
            $this->request->data['Adjunto']['estado'] = 'Activo';
            $this->request->data['Adjunto']['tipo'] = 'Archivo';
            $this->request->data['Adjunto']['visible'] = 'Todos';
            $this->request->data['Adjunto']['user_id'] = $this->Session->read('Auth.User.id');

            $idAdjunto = $this->guarda_archivo();
            if (!empty($idAdjunto)) {
                $d_doc['adjunto_id'] = $idAdjunto;
            } else {
                $array['error'] = 'No se ha podido guardar el archivo seleccionado!!';
            }
        }
        if (empty($array['error'])) {
            $d_doc['tipo'] = $this->request->data['Documento']['tipo'];
            $d_doc['original'] = $this->request->data['Documento']['original'];
            $d_doc['hojas'] = $this->request->data['Documento']['hojas'];
            $d_doc['id'] = $this->request->data['Documento']['id'];
            $d_doc['user_id'] = $this->Session->read('Auth.User.id');
            $d_doc['flujos_user_id'] = $idFlujosUser;

            $this->Documento->create();
            if (!$this->Documento->save($d_doc)) {
                $array['error'] = 'No se ha podido registrar el documento!!!';
            }
        }
        $this->respond($array, true);
    }

    public function eliminar_archivo($idAdjunto = null) {
        /* debug($this->request->data['Adjunto']['direccion']);
          exit; */
        $adjunto = $this->Adjunto->findByid($idAdjunto, null, null, -1);
        $direcciones = $this->Adjunto->getPath($adjunto['Adjunto']['parent_id']);
        $directorio = '';
        foreach ($direcciones as $dir) {
            $directorio = $directorio . DS . $dir['Adjunto']['nombre_original'];
        }

        $file = WWW_ROOT . 'files' . $directorio . DS . $adjunto['Adjunto']['nombre_original'];

        if (file_exists($file)) {
            //debug('Si existe');exit;
            unlink($file);
            $adj['estado'] = 'Eliminado';
            //$adj['created'] = date('Y-m-d');
            $this->Adjunto->id = $adjunto['Adjunto']['id'];
            $this->Adjunto->save($adj);
            return true;
            //$this->Session->setFlash("Se ha eliminado correctamente el archivo!!", 'msgbueno');
        } else {
            return false;
            //$this->Session->setFlash("No se ha podido eliminar el archivo!!", 'msgerror');
        }
    }

    public function guarda_archivo() {
        //debug($this->request->data);exit;
        $archivo = $this->request->data['Adjunto']['archivo'];
        $nombreOriginal = $this->request->data['Adjunto']['archivo']['name'];
        //$extencion = split('.', $nombreOriginal);
        //$extension = explode('.', $nombreOriginal);
        //$ext = end($extension);
        //$this->request->data['Adjunto']['extension'] = $this->request->data['Adjunto']['archivo']['type'];
        $extension = explode('.', $nombreOriginal);
        $ext = end($extension);
        if (!empty($ext)) {
            $this->request->data['Adjunto']['extension'] = $ext;
        } else {
            $this->request->data['Adjunto']['extension'] = '';
        }

        if (empty($this->request->data['Adjunto']['flujos_user_id'])) {
            $this->request->data['Adjunto']['flujos_user_id'] = 0;
        }
        if (empty($this->request->data['Adjunto']['proceso_id'])) {
            $this->request->data['Adjunto']['proceso_id'] = 0;
        }
        if (empty($this->request->data['Adjunto']['tarea_id'])) {
            $this->request->data['Adjunto']['tarea_id'] = 0;
        }
        $this->request->data['Adjunto']['nombre'] = $this->request->data['Adjunto']['nombre_original'] = $nombreOriginal;
        //debug($archivo);exit;
        $direcciones = $this->Adjunto->getPath($this->request->data['Adjunto']['parent_id']);
        $directorio = '';
        foreach ($direcciones as $dir) {
            $directorio = $directorio . DS . $dir['Adjunto']['nombre_original'];
        }

        //App::uses('String', 'Utility');
        //$nombre = String::uuid() . '.' . $ext;
        $file = new File(WWW_ROOT . 'files' . $directorio . DS . $nombreOriginal);
        //$array['error'] = '';
        $idAdjunto = NULL;
        if (!$file->exists()) {
            if ($this->guarda_archivo2($archivo, $directorio . DS . $nombreOriginal)) {
                $this->Adjunto->create();
                $this->Adjunto->save($this->request->data['Adjunto']);
                $idAdjunto = $this->Adjunto->getLastInsertID();


                //$this->Session->setFlash('Se ha registrado correctamente el archivo!!!', 'msgbueno');
            } else {

                //$this->Session->setFlash("No se ha podido cargar el archivo, intente nuevamente!!", 'msgerror');
            }
        } else {
            //$array['error'] = 'Ya existe un archivo con el mismo nombre!!!';
        }
        /* debug($array);
          exit; */

        return $idAdjunto;
        //exit;
    }

    public function guarda_archivo2($archivo = null, $nombre = null) {
        if ($archivo['error'] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($archivo['tmp_name'], WWW_ROOT . 'files' . DS . $nombre)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function get_documentos($idFlujosUser = NULL) {
        $this->Documento->virtualFields = array(
            'original_a' => "(IF(Documento.original = 1,'Original','Copia'))"
        );
        $documentos = $this->Documento->find('all', array(
            'recursive' => 0,
            'conditions' => array('Documento.flujos_user_id' => $idFlujosUser),
            'fields' => array('Documento.*', 'Adjunto.*'),
            'order' => array('Documento.created DESC')
        ));
        return $documentos;
    }

    public function documento($idDocumento = null) {
        $this->layout = 'ajax';
        $documentos = $this->Documento->find('list', array(
            'recursive' => -1,
            'group' => array('Documento.tipo'),
            'fields' => array('Documento.tipo', 'Documento.tipo')
        ));
        $this->Documento->id = $idDocumento;
        $this->request->data = $this->Documento->read();
        $this->set(compact('documentos'));
    }

    public function eliminar($idDocumento = null) {
        $documento = $this->Documento->findByid($idDocumento, null, null, -1);

        if (!empty($documento['Documento']['adjunto_id'])) {
            $this->eliminar_archivo($documento['Documento']['adjunto_id']);
        }
        $this->Documento->delete($idDocumento);
        $this->Session->setFlash("Se ha eliminado correctamente el documento!!", 'msgbueno');
        $this->redirect($this->referer());
    }

}
