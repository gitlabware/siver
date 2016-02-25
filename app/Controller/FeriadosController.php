<?php

class FeriadosController extends AppController {

  public $uses = array('Feriado');
  public $layout = 'svergara';

  public function feriado($CidFeriado = null) {
    if (!empty($CidFeriado)) {
      $idFeriado = substr($CidFeriado, 2);
    } else {
      $idFeriado = NULL;
    }
    /*debug($CidFeriado);
    debug($idFeriado);
    exit;*/
    $this->layout = 'ajax';
    if (!empty($this->request->data['Feriado'])) {
      $this->Feriado->create();
      $this->Feriado->save($this->request->data['Feriado']);
      $this->Session->setFlash("Se ha registrado correctamente el feriado!!", 'msgbueno');
      $this->redirect($this->referer());
    }
    $this->Feriado->id = $idFeriado;
    $this->request->data = $this->Feriado->read();
  }

}
