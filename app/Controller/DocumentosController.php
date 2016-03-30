<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class DocumentosController extends AppController {

    public $layout = 'svergara';
    public $uses = array('Adjunto', 'FlujosUser', 'User', 'Documento');
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        if ($this->RequestHandler->responseType() == 'json') {
            $this->RequestHandler->setContent('json', 'application/json');
        }
        //$this->Auth->allow();
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

}
