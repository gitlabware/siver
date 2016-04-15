<?php

class ClientesController extends AppController {

    public $layout = 'svergara';
    public $uses = array('Cliente');

    public function index() {
        $clientes = $this->Cliente->find('all', array(
            'recursive' => -1,
            'order' => array('Cliente.created DESC')
        ));
        $this->set(compact('clientes'));
    }

    public function cliente($idCliente = null) {
        
        if (!empty($this->request->data['Cliente'])) {
            $this->Cliente->create();
            $this->Cliente->save($this->request->data['Cliente']);
            $this->Session->setFlash("Se ha guardado correctamente los datos del cliente!!!", 'msgbueno');
            
            $this->redirect(array('action' => 'index'));
        }
        $this->Cliente->id = $idCliente;
        $this->request->data = $this->Cliente->read();
    }
    
    public function registro_print($idCliente = null){
        $this->layout = 'ajax';
        $cliente = $this->Cliente->find('first',array(
            'recursive' => -1,
            'conditions' => array('Cliente.id' => $idCliente)
        ));
        $this->set(compact('cliente'));
    }

}
