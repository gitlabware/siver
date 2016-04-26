<?php
class HojasRutasController extends AppController{
    
    public $layout = 'svergara';
    
    public $uses = array('HojasRuta','Requisito','Cliente','HojasRequisito');
    
    public function index(){
        
    }

    public function hoja_ruta($idCliente = null){
        if(!empty($this->request->data['HojasRuta'])){
            $idUser = $this->Session->read('Auth.User.id');
            
            $this->HojasRuta->create();
            $this->HojasRuta->save($this->request->data['HojasRuta']);
            $idHojaruta = $this->HojasRuta->getLastInsertID();
            foreach ($this->request->data['requisitos'] as $re){
                $dato_r['hojas_ruta_id'] = $idHojaruta;
                $dato_r['requisito_id'] = $re['requisito_id'];
                $dato_r['estado'] = $re['estado'];
                $dato_r['user_id'] = $idUser;
                $this->HojasRequisito->create();
                $this->HojasRequisito->save($dato_r);
            }
            
            foreach ($this->request->data['orequisitos'] as $re){
                $dato_r2['hojas_ruta_id'] = $idHojaruta;
                $dato_r2['estado'] = 1;
                $dato_r2['user_id'] = $idUser;
                $dato_r2['descripcion'] = $re['requisito'];
                $this->HojasRequisito->create();
                $this->HojasRequisito->save($dato_r2);
            }
            $this->Session->setFlash("Se ha registrado correctamente la hoja de ruta!!",'msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        $requisitos = $this->Requisito->find('all',array(
            'recursive' => -1
        ));
        $cliente = $this->Cliente->find('first',array(
            'recursive' => -1,
            'conditions' => array('Cliente.id' => $idCliente)
        ));
        $this->set(compact('requisitos','cliente'));
    }
    
}