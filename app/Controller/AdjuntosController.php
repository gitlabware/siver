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

  public function index() {



    if ($this->Session->check('Adjunto')) {
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
      /* debug($direccion);
        exit; */
    } else {
      $direccion = '';
    }
    $dir = new Folder(WWW_ROOT . 'files' . $direccion);

    /* debug($dir->tree());
      exit; */

    if (WWW_ROOT . 'files' . DS === $dir->path) {
      $direccion = '';
    }
    $files = $dir->read();
    
    $dir2 = new Folder(WWW_ROOT . 'files' . DS);
    $files2 = $dir2->read();
    $array_f = explode("/", $direccion);
    
    /*debug($array_f);
    debug($files2);
    debug($direccion);
    exit;*/


    $this->set(compact('files', 'direccion','array_f','files2'));
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
    $directorio = '';
    if (!empty($this->request->data['Adjunto']['flujos_user_id'])) {
      $flujo = $this->FlujosUser->find('first', array(
        'recursive' => -1,
        'conditions' => array('FlujosUser.id' => $this->request->data['Adjunto']['flujos_user_id'])
      ));
      $directorio = DS . $flujo['FlujosUser']['descripcion'] . DS;
    }
    //App::uses('String', 'Utility');
    //$nombre = String::uuid() . '.' . $ext;
    $file = new File(WWW_ROOT . 'files' . $directorio . $nombreOriginal);
    $array['error'] = '';

    if (!$file->exists()) {
      if ($this->guarda_archivo2($archivo, $directorio . $nombreOriginal)) {
        $this->request->data['Adjunto']['ubicacion'] = $directorio . $nombreOriginal;
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

  public function eliminar_archivo() {
    /* debug($this->request->data['Adjunto']['direccion']);
      exit; */
    $nombre = $this->request->data['Adjunto']['direccion'];
    $array['Adjunto']['direccion_a'] = $nombre . DS . '..';
    $this->Session->write('Adjunto', $array);
    $directorio = WWW_ROOT . 'files' . $nombre;
    //debug($directorio);exit;

    if (file_exists($directorio)) {
      //debug('Si existe');exit;
      unlink($directorio);
      $adjunto = $this->Adjunto->find('first', array(
        'recursive' => -1,
        'conditions' => array('Adjunto.ubicacion LIKE' => $nombre)
      ));
      if (!empty($adjunto)) {
        $this->Adjunto->delete($adjunto['Adjunto']['id']);
      }
      $this->Session->setFlash("Se ha eliminado correctamente el archivo!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se ha podido eliminar el archivo!!", 'msgerror');
    }
    $this->redirect($this->referer());
  }

  public function descargar($idAdjunto = null) {

    $adjunto = $this->Adjunto->findByid($idAdjunto, null, null, -1);
    $file = WWW_ROOT . 'files' . $adjunto['Adjunto']['ubicacion'];

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
    /*$dir = new Folder('/home/eynar/Downloads');
    $files = $dir->find();
    debug($files);exit;*/
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

  public function ver_adjunto() {
    $this->layout = 'ajax';

    $direccion = '';
    if (!empty($_POST['direccion'])) {
      $direccion = $_POST['direccion'];
    }
    if (!empty($_POST['nombre'])) {
      $direccion = $direccion . DS . $_POST['nombre'];
    }
    /* debug($direccion);
      exit; */
    $adjunto = $this->Adjunto->find('first', array(
      'recursive' => -1,
      'conditions' => array('Adjunto.ubicacion LIKE' => $direccion)
    ));

    $this->set(compact('adjunto', 'direccion'));

    /* debug($direccion);
      debug($adjunto);
      exit; */
  }
  
  
  public function arbol(){
    $this->layout = 'ajax';
    /*debug($this->request->data);
    exit;*/
  }
  
  public function carpeta(){
    $this->layout = 'ajax';
    
    
  }

}
