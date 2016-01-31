<?php

class AdjuntosController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Adjunto');

  public function adjunto($idFlujosUser = null, $idProceso = null, $idTarea = null) {
    $this->layout = 'ajax';
    $this->set(compact('idFlujosUser', 'idProceso', 'idTarea'));
  }

  public function guarda_archivo() {
    //debug($this->request->data);exit;
    $archivo = $this->request->data['Adjunto']['archivo'];
    $nombreOriginal = $this->request->data['Adjunto']['archivo']['name'];
    //$extencion = split('.', $nombreOriginal);
    $extension = explode('.', $nombreOriginal);
    $ext = end($extension);
    $this->request->data['Adjunto']['nombre_original'] = $nombreOriginal;
    //debug($archivo);exit;
    App::uses('String', 'Utility');
    $nombre = String::uuid() . '.' . $ext;
    if ($this->guarda_archivo2($archivo, $nombre)) {
      $this->request->data['Adjunto']['ubicacion'] = $nombre;
      $this->Adjunto->create();
      $this->Adjunto->save($this->request->data['Adjunto']);

      //$this->Session->setFlash('Se ha registrado correctamente el archivo!!!', 'msgbueno');
    } else {
      //$this->Session->setFlash("No se ha podido cargar el archivo, intente nuevamente!!", 'msgerror');
    }
    exit;
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

  public function get_adjuntos($idFlujosUser = null, $idProceso = null, $idTarea = null) {
    $condiciones = array();
    if (!empty($idFlujosUser)) {
      $condiciones['Adjunto.flujos_user_id'] = $idFlujosUser;
    }else{
      $condiciones['Adjunto.flujos_user_id'] = 0;
    }
    if (!empty($idProceso)) {
      $condiciones['Adjunto.proceso_id'] = $idProceso;
    }else{
      $condiciones['Adjunto.proceso_id'] = 0;
    }
    if (!empty($idTarea)) {
      $condiciones['Adjunto.tarea_id'] = $idTarea;
    }else{
      $condiciones['Adjunto.tarea_id'] = 0;
    }
    return $this->Adjunto->find('all', array(
        'recursive' => 0,
        'conditions' => $condiciones,
        'fields' => array('Adjunto.*', 'User.nombre_completo'),
        'order' => array('Adjunto.created DESC')
    ));
  }

  public function eliminar($idAdjunto = null) {
    $adjunto = $this->Adjunto->findByid($idAdjunto, null, null, -1);
    $this->elimina_archivo($adjunto['Adjunto']['ubicacion']);
    $this->Adjunto->delete($idAdjunto);
    $this->Session->setFlash("Se ha eliminado correctamente el adjunto!!", 'msgbueno');
    $this->redirect($this->referer());
  }

  public function elimina_archivo($nombre = null) {
    $directorio = WWW_ROOT . 'files' . DS . $nombre;
    //debug($directorio);exit;
    if (file_exists($directorio)) {
      //debug('Si existe');exit;
      unlink($directorio);
      return true;
    } else {
      return false;
    }
  }

  public function descargar($idAdjunto = null) {
    $adjunto = $this->Adjunto->findByid($idAdjunto, null, null, -1);
    $file = WWW_ROOT . 'files' . DS . $adjunto['Adjunto']['ubicacion'];

    if (file_exists($file)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="' . basename($file) . '"');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file));
      readfile($file);
      exit;
    } else {
      $this->Session->setFlash("No se ha encontrado el archivo!!", 'msgerror');
      $this->redirect($this->referer());
    }
  }

}
