<?php

class ComentariosController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Comentario');

  public function registra_comentario() {
    if (!empty($this->request->data['Comentario'])) {
      $this->Comentario->create();
      $this->Comentario->save($this->request->data['Comentario']);
      $this->Session->setFlash("Se ha registrado su comentario!!", 'msgbueno');
    }
    $this->redirect($this->referer());
  }

  public function get_comentarios($idFlujosUser = null, $idProceso = null, $idTarea = null) {
    $condiciones = array();
    if (!empty($idFlujosUser)) {
      $condiciones['Comentario.flujos_user_id'] = $idFlujosUser;
    } else {
      $condiciones['Comentario.flujos_user_id'] = 0;
    }
    if (!empty($idProceso)) {
      $condiciones['Comentario.proceso_id'] = $idProceso;
    } else {
      $condiciones['Comentario.proceso_id'] = 0;
    }
    if (!empty($idTarea)) {
      $condiciones['Comentario.tarea_id'] = $idTarea;
    } else {
      $condiciones['Comentario.tarea_id'] = 0;
    }
    return $this->Comentario->find('all', array(
        'recursive' => 0,
        'conditions' => $condiciones,
        'fields' => array('Comentario.*', 'User.nombre_completo'),
        'order' => array('Comentario.created DESC')
    ));
  }

  public function eliminar($idComentario = null) {
    //debug($idComentario);exit;
    $this->Comentario->delete($idComentario);
    $this->Session->setFlash('Se ha eliminado correctamente el comentario!!', 'msgbueno');
    $this->redirect($this->referer());
  }

}
