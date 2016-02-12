<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class AdjuntosController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Adjunto', 'FlujosUser');
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

  public function adjunto($idFlujosUser = null, $idProceso = null, $idTarea = null) {
    $this->layout = 'ajax';
    $this->set(compact('idFlujosUser', 'idProceso', 'idTarea'));
  }

  public function adjunto2($idCarpeta = null) {
    $this->layout = 'ajax';
    $this->set(compact('idCarpeta'));
  }

  public function index($idCarpeta = null) {



    /* if ($this->Session->check('Adjunto')) {
      $this->request->data = $this->Session->read('Adjunto');
      $this->Session->delete('Adjunto');
      }

      if (!empty($this->request->data)) {

      if (!empty($this->request->data['Adjunto']['direccion_a'])) {
      $direccion = $this->request->data['Adjunto']['direccion_a'];
      }
      if (!empty($this->request->data['Adjunto']['direccion'])) {
      if (empty($direccion)) {
      $direccion = DS . $this->request->data['Adjunto']['direccion'];
      } else {
      $direccion = $direccion . DS . $this->request->data['Adjunto']['direccion'];
      }
      }

      } else {
      $direccion = '';
      }
      $dir = new Folder(WWW_ROOT . 'files' . $direccion);

      if (WWW_ROOT . 'files' . DS === $dir->path) {
      $direccion = '';
      }
      $files = $dir->read();

      $dir2 = new Folder(WWW_ROOT . 'files' . DS);
      $files2 = $dir2->read();
      $array_f = explode("/", $direccion); */

    /* debug($array_f);
      debug($files2);
      debug($direccion);
      exit; */
    $carpetas = $this->Adjunto->find('all', array(
      'recursive' => -1,
      'conditions' => array('Adjunto.parent_id' => $idCarpeta, 'Adjunto.tipo LIKE' => 'Carpeta','Adjunto.estado !=' => 'Eliminado')
    ));
    //debug($carpetas);exit;
    $archivos = $this->Adjunto->find('all', array(
      'recursive' => -1,
      'conditions' => array('Adjunto.parent_id' => $idCarpeta, 'Adjunto.tipo LIKE' => 'Archivo','Adjunto.estado !=' => 'Eliminado')
    ));
    /* debug($idCarpeta);
      debug($archivos);exit; */

    /* $arbol_car = $this->Adjunto->find('all', array(
      'recursive' => -1,
      'conditions' => array('Adjunto.tipo LIKE' => 'Carpeta'),
      'fields' => array('Adjunto.nombre_original', 'Adjunto.id', 'Adjunto.parent_id', 'Adjunto.tipo')
      )); */
    //$arbol = $this->Adjunto->children(NULL, true, array('Adjunto.nombre_original', 'Adjunto.clase', 'Adjunto.id', 'Adjunto.parent_id', 'Adjunto.tipo'));
    //$menuTree = $this->treeForm($arbol, 0, 'Adjunto');
    //debug($menuTree);exit;
    /* debug($arbol);
      exit; */
    $direcciones = $this->Adjunto->getPath($idCarpeta);
    $this->set(compact('carpetas', 'archivos', 'idCarpeta', 'direcciones'));
  }

  public function guarda_archivo() {
    //debug($this->request->data);exit;
    $archivo = $this->request->data['Adjunto']['archivo'];
    $nombreOriginal = $this->request->data['Adjunto']['archivo']['name'];
    //$extencion = split('.', $nombreOriginal);
    //$extension = explode('.', $nombreOriginal);
    //$ext = end($extension);
    $this->request->data['Adjunto']['nombre_original'] = $nombreOriginal;
    //debug($archivo);exit;
    $direcciones = $this->Adjunto->getPath($this->request->data['Adjunto']['parent_id']);
    $directorio = '';
    foreach ($direcciones as $dir) {
      $directorio = $directorio . DS . $dir['Adjunto']['nombre_original'];
    }

    //App::uses('String', 'Utility');
    //$nombre = String::uuid() . '.' . $ext;
    $file = new File(WWW_ROOT . 'files' . $directorio . DS . $nombreOriginal);
    $array['error'] = '';

    if (!$file->exists()) {
      if ($this->guarda_archivo2($archivo, $directorio . DS . $nombreOriginal)) {
        $this->Adjunto->create();
        $this->Adjunto->save($this->request->data['Adjunto']);

        //$this->Session->setFlash('Se ha registrado correctamente el archivo!!!', 'msgbueno');
      } else {

        //$this->Session->setFlash("No se ha podido cargar el archivo, intente nuevamente!!", 'msgerror');
      }
    } else {
      $array['error'] = 'Ya existe un archivo con el mismo nombre!!!';
    }
    /* debug($array);
      exit; */

    $this->respond($array, true);
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

  public function get_adjuntos($idFlujosUser = null, $idProceso = null, $idTarea = null) {
    $condiciones = array();
    if (!empty($idFlujosUser)) {
      $condiciones['Adjunto.flujos_user_id'] = $idFlujosUser;
    } else {
      $condiciones['Adjunto.flujos_user_id'] = 0;
    }
    if (!empty($idProceso)) {
      $condiciones['Adjunto.proceso_id'] = $idProceso;
    } else {
      $condiciones['Adjunto.proceso_id'] = 0;
    }
    if (!empty($idTarea)) {
      $condiciones['Adjunto.tarea_id'] = $idTarea;
    } else {
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
      $this->Adjunto->id = $adjunto['Adjunto']['id'];
      $this->Adjunto->save($adj);
      $this->Session->setFlash("Se ha eliminado correctamente el archivo!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se ha podido eliminar el archivo!!", 'msgerror');
    }
    $this->redirect($this->referer());
  }

  public function descargar($idAdjunto = null) {
    $adjunto = $this->Adjunto->findByid($idAdjunto, null, null, -1);
    $direcciones = $this->Adjunto->getPath($adjunto['Adjunto']['parent_id']);
    $directorio = '';
    foreach ($direcciones as $dir) {
      $directorio = $directorio . DS . $dir['Adjunto']['nombre_original'];
    }

    $file = WWW_ROOT . 'files' . $directorio . DS . $adjunto['Adjunto']['nombre_original'];

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

  public function descargar2() {
    $direccion = '';
    if (!empty($this->request->data['Adjunto']['direccion_a'])) {
      $direccion = $this->request->data['Adjunto']['direccion_a'];
    }
    if (!empty($this->request->data['Adjunto']['direccion'])) {
      if (empty($direccion)) {
        $direccion = DS . $this->request->data['Adjunto']['direccion'];
      } else {
        $direccion = $direccion . DS . $this->request->data['Adjunto']['direccion'];
      }
    }
    if (!empty($direccion)) {
      $file = WWW_ROOT . 'files' . $direccion;

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
    } else {
      $this->Session->setFlash("No se ha encontrado el archivo!!", 'msgerror');
      $this->redirect($this->referer());
    }
  }

  public function prueba() {
    /* $dir = new Folder('/home/eynar/Downloads');
      $files = $dir->find();
      debug($files);exit; */
    //$dir = new Folder('/home/eynar/Music', true, 0755);
    //$path = Folder::addPathElement('/home/eynar', 'Music');
    //$files = $dir->findRecursive('(test|index).*');
    /* $Folder = new Folder(WWW_ROOT);
      $result = $Folder->inPath(WWW_ROOT . 'img' . DS, true );
      debug($result); */
    //$dir = new Folder(WWW_ROOT);
    //$files = $dir->read();
    //debug($files);
    //$folder = new Folder();
    /* if ($folder->create(WWW_ROOT . 'files' . DS .'eyyynar')) {
      // Successfully created the nested folders
      debug('creo la carpeta correctamente');
      } */

    /* $folder = new Folder(WWW_ROOT . 'files' . DS .'eyyynar');
      if ($folder->delete()) {
      debug('elimino correctamente!!');
      // Successfully deleted foo and its nested folders
      } */
    //echo $folder->path; // Prints /foo
    /* foreach ($files as $file) {
      $file = new File($dir->pwd() . DS . $file);

      $contents = $file->read();

      // $file->write('I am overwriting the contents of this file');
      // $file->append('I am adding to the bottom of this file.');
      // $file->delete(); // I am deleting this file

      $file->close(); // Be sure to close the file when you're done
      //debug($contents);
      } */


    exit;
  }

  public function ver_adjunto($idAdjunto = null) {
    $this->layout = 'ajax';


    /* debug($direccion);
      exit; */
    $adjunto = $this->Adjunto->find('first', array(
      'recursive' => -1,
      'conditions' => array('Adjunto.id' => $idAdjunto)
    ));

    $this->set(compact('idAdjunto', 'adjunto'));

    /* debug($direccion);
      debug($adjunto);
      exit; */
  }

  public function arbol($idAdjunto = null) {
    $this->layout = 'ajax';
    /* debug($this->request->data);
      exit; */
    $adjunto = $this->Adjunto->findByid($idAdjunto, null, null, -1);
    $this->Adjunto->virtualFields = array(
      'clase' => "IF(Adjunto.tipo = 'Carpeta','folder','')"
    );
    $arbol = $this->Adjunto->children($idAdjunto, true, array('Adjunto.nombre_original', 'Adjunto.clase', 'Adjunto.id', 'Adjunto.parent_id', 'Adjunto.tipo'));
    $this->set(compact('adjunto', 'arbol'));
  }

  public function carpeta($idCarpeta = null) {
    $this->layout = 'ajax';
    $carpeta = $this->Adjunto->findByid($idCarpeta, null, null, -1);
    if (!empty($this->request->data['Adjunto']['nombre'])) {

      $this->request->data['Adjunto']['nombre_original'] = $this->request->data['Adjunto']['nombre'];
      if (!empty($carpeta)) {
        $direccion = $carpeta['Adjunto']['nombre_original'] . DS . $this->request->data['Adjunto']['nombre_original'];
      } else {
        $direccion = $this->request->data['Adjunto']['nombre_original'];
      }
      $folder = new Folder();
      if ($folder->create(WWW_ROOT . 'files' . DS . $direccion)) {
        $this->Adjunto->create();
        $this->Adjunto->save($this->request->data['Adjunto']);
        $this->Session->setFlash("Se ha registrado correctamente la carpeta!!", 'msgbueno');
      } else {
        $this->Session->setFlash("No se ha podido crear la carpeta. Intente nuevamente!!!", 'msgerror');
      }
      $this->redirect($this->referer());
    }


    /* debug($carpeta);
      exit; */
    $this->set(compact('carpeta', 'idCarpeta'));
  }

}
