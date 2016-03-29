<?php

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class AdjuntosController extends AppController {

  public $layout = 'svergara';
  public $uses = array('Adjunto', 'FlujosUser', 'User', 'UsersVisible', 'Vinculacione');
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
    if (!empty($idFlujosUser)) {
      $flujo = $this->FlujosUser->find('first', array(
        'recursive' => 0,
        'conditions' => array('FlujosUser.id' => $idFlujosUser),
        'fields' => array('Adjunto.id')
      ));
      $idAdjunto = $flujo['Adjunto']['id'];
    }
    $users = $this->User->find('all', array(
      'recursive' => -1,
      'conditions' => array('User.id !=' => $this->Session->read('Auth.User.id')),
      'fields' => array('User.id', 'User.nombre_completo')
    ));
    $this->set(compact('idFlujosUser', 'idProceso', 'idTarea', 'idAdjunto', 'users'));
  }

  public function adjunto2($idCarpeta = null) {
    $this->layout = 'ajax';
    $flujos = $this->FlujosUser->find('list', array(
      'recursive' => -1,
      'conditions' => array(
        'FlujosUser.estado LIKE' => 'Activo'
      ),
      'order' => array('FlujosUser.created DESC'),
      'fields' => array('FlujosUser.id', 'FlujosUser.expediente')
    ));
    $users = $this->User->find('all', array(
      'recursive' => -1,
      'conditions' => array('User.id !=' => $this->Session->read('Auth.User.id')),
      'fields' => array('User.id', 'User.nombre_completo')
    ));
    $procesos = array();
    $this->set(compact('idCarpeta', 'flujos', 'procesos', 'users'));
  }

  public function index($idCarpeta = null) {

    $idUser = $this->Session->read('Auth.User.id');
    $condiciones_c = array();
    $condiciones_a = array();
    //$condiciones_a['Adjunto.parent_id'] = $idCarpeta;
    $condiciones_a['Adjunto.tipo LIKE'] = 'Archivo';
    $condiciones_a['Adjunto.estado !='] = 'Eliminado';
    $condiciones_a["( IF(Adjunto.user_id = $idUser,1,IF(Adjunto.visible = 'Todos',1,  IF(Adjunto.visible = 'Seleccion Personalizada',( IF( ISNULL( (SELECT users_visibles.id FROM users_visibles WHERE users_visibles.user_id = $idUser AND users_visibles.adjunto_id = Adjunto.id AND users_visibles.visible = 1) ),0,1 ) ),0)  )) )"] = 1;
    //$condiciones_a["(IF(Adjunto.user_id = $idUser,TRUE,IF(Adjunto.visible = 'Todos',TRUE,FALSE))) ="] = 'TRUE';
    //$condiciones_c['Adjunto.parent_id'] = $idCarpeta;
    $condiciones_c['Adjunto.tipo LIKE'] = 'Carpeta';
    $condiciones_c['Adjunto.estado !='] = 'Eliminado';
    $condiciones_c["( IF(Adjunto.user_id = $idUser,1,IF(Adjunto.visible = 'Todos',1,  IF(Adjunto.visible = 'Seleccion Personalizada',( IF( ISNULL( (SELECT users_visibles.id FROM users_visibles WHERE users_visibles.user_id = $idUser AND users_visibles.adjunto_id = Adjunto.id AND users_visibles.visible = 1) ),0,1 ) ),0)  )) )"] = 1;

    if (!empty($this->request->data['Adjunto']['dato'])) {
      $condiciones_a['Adjunto.nombre_original LIKE'] = '%' . $this->request->data['Adjunto']['dato'] . '%';
      $condiciones_c['Adjunto.nombre_original LIKE'] = '%' . $this->request->data['Adjunto']['dato'] . '%';
    } else {
      $condiciones_a['Adjunto.parent_id'] = $idCarpeta;
      $condiciones_c['Adjunto.parent_id'] = $idCarpeta;
    }


    $this->Adjunto->virtualFields = array(
      'filtro' => "(IF(Adjunto.user_id = $idUser,'mio','nomio'))",
      //'ext' => "SUBSTRING_INDEX(Adjunto.extension,'.',-1)"
    );
    $extensiones = $this->Adjunto->find('all', array(
      'recursive' => -1,
      'conditions' => $condiciones_a,
      'fields' => array('Adjunto.id', 'Adjunto.extension'),
      'group' => array('Adjunto.extension')
    ));
    /* debug($extensiones);
      exit; */
    $carpetas = $this->Adjunto->find('all', array(
      'recursive' => -1,
      'conditions' => $condiciones_c
    ));
    //debug($carpetas);exit;
    $archivos = $this->Adjunto->find('all', array(
      'recursive' => -1,
      'conditions' => $condiciones_a
    ));
    $direcciones = $this->Adjunto->getPath($idCarpeta);
    $this->set(compact('carpetas', 'archivos', 'idCarpeta', 'direcciones', 'extensiones'));
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
        $idAdjunto = $this->Adjunto->getLastInsertID();

        if ($this->request->data['Adjunto']['visible'] == 'Seleccion Personalizada') {
          foreach ($this->request->data['Usuarios'] as $key => $us) {
            $d_v_s['user_id'] = $us['user_id'];
            $d_v_s['adjunto_id'] = $idAdjunto;
            $d_v_s['visible'] = $us['visible'];
            $this->UsersVisible->create();
            $this->UsersVisible->save($d_v_s);
          }
        }

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
    //$condiciones = array();
    $idUser = $this->Session->read('Auth.User.id');
    $cond_visible = "( IF(Adjunto.user_id = $idUser,1,IF(Adjunto.visible = 'Todos',1,  IF(Adjunto.visible = 'Seleccion Personalizada',( IF( ISNULL( (SELECT users_visibles.id FROM users_visibles WHERE users_visibles.user_id = $idUser AND users_visibles.adjunto_id = Adjunto.id AND users_visibles.visible = 1) ),0,1 ) ),0)  )) ) = 1";
    $condiciones2 = "Adjunto.tipo LIKE 'Archivo' AND Adjunto.estado LIKE 'Activo' AND $cond_visible";

    $condiciones3 = "1";
    if (!empty($idFlujosUser)) {
      $condiciones2 = "$condiciones2 AND Adjunto.flujos_user_id = $idFlujosUser";
      $condiciones3 = "$condiciones3 AND Vinculacione.flujos_user_id = $idFlujosUser";
      //$condiciones['Adjunto.flujos_user_id'] = $idFlujosUser;
    } else {
      $condiciones2 = "$condiciones2 AND Adjunto.flujos_user_id = 0";
      $condiciones3 = "$condiciones3 AND Vinculacione.flujos_user_id = 0";
      //$condiciones['Adjunto.flujos_user_id'] = 0;
    }
    if (!empty($idProceso)) {
      $condiciones2 = "$condiciones2 AND Adjunto.proceso_id = $idProceso";
      $condiciones3 = "$condiciones3 AND Vinculacione.proceso_id = $idProceso";
      //$condiciones['Adjunto.proceso_id'] = $idProceso;
    } else {
      $condiciones2 = "$condiciones2 AND Adjunto.proceso_id = 0";
      $condiciones3 = "$condiciones3 AND Vinculacione.proceso_id = 0";
      //$condiciones['Adjunto.proceso_id'] = 0;
    }
    if (!empty($idTarea)) {
      $condiciones2 = "$condiciones2 AND Adjunto.tarea_id = $idTarea";
      $condiciones3 = "$condiciones3 AND Vinculacione.tarea_id = $idTarea";
      //$condiciones['Adjunto.tarea_id'] = $idTarea;
    } else {
      $condiciones2 = "$condiciones2 AND Adjunto.tarea_id = 0";
      $condiciones3 = "$condiciones3 AND Vinculacione.tarea_id = 0";
      //$condiciones['Adjunto.tarea_id'] = 0;
    }
    //debug($condiciones3);exit;
    $sql1 = "SELECT Adjunto.*, User.nombre_completo AS nombre_usuario, ('Adjuntos') AS atipo, (' ') AS mclase FROM adjuntos AS Adjunto LEFT JOIN users AS User ON (User.id = Adjunto.user_id) WHERE $condiciones2 ORDER BY Adjunto.created DESC";
    $sql2 = "SELECT Adjunto.*, User.nombre_completo AS nombre_usuario, ('Vinculados') AS atipo, ('info') AS mclase FROM vinculaciones AS Vinculacione LEFT JOIN adjuntos AS Adjunto ON (Adjunto.id = Vinculacione.adjunto_id) LEFT JOIN users AS User ON (User.id = Adjunto.user_id) WHERE $condiciones3 ORDER BY Adjunto.created DESC";
    $sql = "($sql1) UNION ($sql2) ORDER BY created DESC";
    $adjuntos = $this->Adjunto->query($sql);
    //debug($adjuntos);exit;
    return $adjuntos;
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
      //$adj['created'] = date('Y-m-d');
      $this->Adjunto->id = $adjunto['Adjunto']['id'];
      $this->Adjunto->save($adj);
      $this->Session->setFlash("Se ha eliminado correctamente el archivo!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se ha podido eliminar el archivo!!", 'msgerror');
    }
    $this->redirect($this->referer());
  }

  public function eliminar_carpeta($idCarpeta = null) {


    $carpeta = $this->Adjunto->findByid($idCarpeta, null, null, -1);
    $direcciones = $this->Adjunto->getPath($carpeta['Adjunto']['parent_id']);
    $directorio = '';
    foreach ($direcciones as $dir) {
      $directorio = $directorio . DS . $dir['Adjunto']['nombre_original'];
    }
    $allChildren = $this->Adjunto->children($idCarpeta, FALSE, array('Adjunto.id'));
    foreach ($allChildren as $hi) {
      $this->Adjunto->id = $hi['Adjunto']['id'];
      $dcar['estado'] = 'Eliminado';
      $this->Adjunto->save($dcar);
    }
    $this->Adjunto->id = $idCarpeta;
    $dcar['estado'] = 'Eliminado';
    $this->Adjunto->save($dcar);
    $file = WWW_ROOT . 'files' . $directorio . DS . $carpeta['Adjunto']['nombre_original'];
    $dir = new Folder($file);
    $dir->delete();
    $this->Session->setFlash("Se ha eliminado correctamente la carpeta!!", 'msgbueno');
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
    /* $folder1 = new Folder('/home/eynar/Music/ddddd/mi texto.txt');
      $folder1->move('/home/eynar/Music/ddddd/mocos.txt'); */
    rename("/home/eynar/Music/ddddd/mi texto2.txt", "/home/eynar/Music/ddddd/Eynar.txt");
    exit;
  }

  public function ver_adjunto($idAdjunto = null) {
    $this->layout = 'ajax';

    $adjunto = $this->Adjunto->find('first', array(
      'recursive' => -1,
      'conditions' => array('Adjunto.id' => $idAdjunto)
    ));
    if (!empty($this->request->data['Adjunto'])) {
      //debug($this->request->data['Adjunto']);exit;

      if (empty($this->request->data['Adjunto']['flujos_user_id'])) {
        $this->request->data['Adjunto']['flujos_user_id'] = 0;
      }
      if (empty($this->request->data['Adjunto']['proceso_id'])) {
        $this->request->data['Adjunto']['proceso_id'] = 0;
      }
      if (empty($this->request->data['Adjunto']['tarea_id'])) {
        $this->request->data['Adjunto']['tarea_id'] = 0;
      }
      $direcciones = $this->Adjunto->getPath($adjunto['Adjunto']['parent_id']);
      $directorio = '';
      foreach ($direcciones as $dir) {
        $directorio = $directorio . DS . $dir['Adjunto']['nombre_original'];
      }

      if (!file_exists(WWW_ROOT . 'files' . $directorio . DS . $this->request->data['Adjunto']['nombre_original']) || $adjunto['Adjunto']['nombre_original'] == $this->request->data['Adjunto']['nombre_original']) {
        $this->Adjunto->id = $idAdjunto;
        $this->Adjunto->save($this->request->data['Adjunto']);
        //debug($archivo);exit;

        if ($this->request->data['Adjunto']['visible'] == 'Seleccion Personalizada') {
          $this->UsersVisible->deleteAll(array('UsersVisible.adjunto_id' => $idAdjunto));
          foreach ($this->request->data['Usuarios'] as $key => $us) {
            $d_v_s['user_id'] = $us['user_id'];
            $d_v_s['adjunto_id'] = $idAdjunto;
            $d_v_s['visible'] = $us['visible'];
            $this->UsersVisible->create();
            $this->UsersVisible->save($d_v_s);
          }
        }

        rename(WWW_ROOT . 'files' . $directorio . DS . $adjunto['Adjunto']['nombre_original'], WWW_ROOT . 'files' . $directorio . DS . $this->request->data['Adjunto']['nombre_original']);
        $this->Session->setFlash("Se ha registrado correctamente los cambios del archivo!!", 'msgbueno');
      } else {
        $this->Session->setFlash("El nombre del archivo ya existe en el directorio. No se ha registrado los cambios del archivo!!", 'msgerror');
      }

      $this->redirect($this->referer());
    }
    /* debug($direccion);
      exit; */

    $this->Adjunto->id = $idAdjunto;
    $this->request->data = $this->Adjunto->read();
    $flujos = $this->FlujosUser->find('list', array(
      'recursive' => -1,
      'conditions' => array(
        'FlujosUser.estado LIKE' => 'Activo'
      ),
      'order' => array('FlujosUser.created DESC'),
      'fields' => array('FlujosUser.id', 'FlujosUser.expediente')
    ));


    $users = $this->UsersVisible->find('all', array(
      'recursive' => 0,
      'conditions' => array('UsersVisible.adjunto_id' => $idAdjunto),
      'fields' => array('User.id', 'User.nombre_completo', 'UsersVisible.visible')
    ));
    if (empty($users)) {
      $users = $this->User->find('all', array(
        'recursive' => -1,
        'conditions' => array('User.id !=' => $this->Session->read('Auth.User.id')),
        'fields' => array('User.id', 'User.nombre_completo')
      ));
    }

    $procesos = array();
    $this->set(compact('idAdjunto', 'adjunto', 'flujos', 'procesos', 'users'));
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
        $idNCarpeta = $this->Adjunto->getLastInsertID();
        if ($this->request->data['Adjunto']['visible'] == 'Seleccion Personalizada') {
          $this->UsersVisible->deleteAll(array('UsersVisible.adjunto_id' => $idNCarpeta));
          foreach ($this->request->data['Usuarios'] as $key => $us) {
            $d_v_s['user_id'] = $us['user_id'];
            $d_v_s['adjunto_id'] = $idNCarpeta;
            $d_v_s['visible'] = $us['visible'];
            $this->UsersVisible->create();
            $this->UsersVisible->save($d_v_s);
          }
        }
        $this->Session->setFlash("Se ha registrado correctamente la carpeta!!", 'msgbueno');
      } else {
        $this->Session->setFlash("No se ha podido crear la carpeta. Intente nuevamente!!!", 'msgerror');
      }
      $this->redirect($this->referer());
    }

    $users = $this->User->find('all', array(
      'recursive' => -1,
      'conditions' => array('User.id !=' => $this->Session->read('Auth.User.id')),
      'fields' => array('User.id', 'User.nombre_completo')
    ));
    /* debug($carpeta);
      exit; */
    $this->set(compact('carpeta', 'idCarpeta', 'users'));
  }

  public function ver_carpeta($idCarpeta = null) {
    $this->layout = 'ajax';
    $carpeta = $this->Adjunto->findByid($idCarpeta, null, null, -1);
    $flujo = $this->FlujosUser->find('first', array(
      'recursive' => -1,
      'conditions' => array('FlujosUser.adjunto_id' => $idCarpeta)
    ));
    if (!empty($this->request->data['Adjunto']['nombre'])) {

      $this->request->data['Adjunto']['nombre_original'] = $this->request->data['Adjunto']['nombre'];

      $direcciones = $this->Adjunto->getPath($carpeta['Adjunto']['parent_id']);
      $directorio = '';
      foreach ($direcciones as $dir) {
        $directorio = $directorio . DS . $dir['Adjunto']['nombre_original'];
      }
      /* debug(WWW_ROOT . 'files' . $directorio . DS . $carpeta['Adjunto']['nombre_original']);
        debug(WWW_ROOT . 'files' . $directorio . DS . $this->request->data['Adjunto']['nombre_original']);
        exit; */

      if (!file_exists(WWW_ROOT . 'files' . $directorio . DS . $this->request->data['Adjunto']['nombre_original']) || $carpeta['Adjunto']['nombre_original'] == $this->request->data['Adjunto']['nombre_original']) {
        rename(WWW_ROOT . 'files' . $directorio . DS . $carpeta['Adjunto']['nombre_original'], WWW_ROOT . 'files' . $directorio . DS . $this->request->data['Adjunto']['nombre_original']);

        $this->Adjunto->id = $idCarpeta;
        $this->Adjunto->save($this->request->data['Adjunto']);
        /* debug($this->request->data);
          exit; */
        if ($this->request->data['Adjunto']['visible'] == 'Seleccion Personalizada') {
          $this->UsersVisible->deleteAll(array('UsersVisible.adjunto_id' => $idCarpeta));
          foreach ($this->request->data['Usuarios'] as $key => $us) {
            $d_v_s['user_id'] = $us['user_id'];
            $d_v_s['adjunto_id'] = $idCarpeta;
            $d_v_s['visible'] = $us['visible'];
            $this->UsersVisible->create();
            $this->UsersVisible->save($d_v_s);
          }
        }

        $this->Session->setFlash("Se ha registrado los cambios de la carpeta!!!", 'msgbueno');
      } else {
        $this->Session->setFlash("Ya existe una carpeta con el mismo nombre. No se ha podido registrar los cambios!!", 'msgerror');
      }

      $this->redirect($this->referer());
    }

    $users = $this->UsersVisible->find('all', array(
      'recursive' => 0,
      'conditions' => array('UsersVisible.adjunto_id' => $idCarpeta),
      'fields' => array('User.id', 'User.nombre_completo', 'UsersVisible.visible')
    ));
    if (empty($users)) {
      $users = $this->User->find('all', array(
        'recursive' => -1,
        'conditions' => array('User.id !=' => $this->Session->read('Auth.User.id')),
        'fields' => array('User.id', 'User.nombre_completo')
      ));
    }

    $this->Adjunto->id = $idCarpeta;
    $this->request->data = $this->Adjunto->read();
    /* debug($carpeta);
      exit; */
    $this->set(compact('carpeta', 'idCarpeta', 'flujo', 'users'));
  }

  public function mover($idam = null, $idpadre = null) {
    /* debug($idam);
      debug($idpadre); */
    //exit;
    $flujo = $this->FlujosUser->find('first', array(
      'recursive' => -1,
      'conditions' => array('FlujosUser.adjunto_id' => $idam),
      'fields' => array('FlujosUser.id')
    ));
    if (!empty($flujo)) {
      $this->Session->setFlash("No se puede mover esta carpeta porque es perteneciente a un flujo!!", 'msgerror');
      $this->redirect($this->referer());
    }
    $am_adj = $this->Adjunto->findByid($idam, null, null, -1);
    $padre = $this->Adjunto->findByid($idpadre, null, null, -1);
    $ex_adj = $this->Adjunto->find('first', array(
      'recursive' => -1,
      'conditions' => array('Adjunto.parent_id' => $idpadre, 'Adjunto.nombre_original LIKE' => $am_adj['Adjunto']['nombre_original']),
      'fields' => array('Adjunto.id')
    ));

    if (!empty($ex_adj)) {
      $this->Session->setFlash("No se puede mover este " . $am_adj['Adjunto']['tipo'] . ' ya existe el nombre' . $am_adj['Adjunto']['nombre_original'] . ' en el directorio', 'msgerror');
      $this->redirect($this->referer());
    }

    $direcciones = $this->Adjunto->getPath($idam);
    $directorio = '';
    foreach ($direcciones as $dir) {
      if ($dir['Adjunto']['id'] != $idam) {
        $directorio = $directorio . DS . $dir['Adjunto']['nombre_original'];
      }
    }

    $direcciones2 = $this->Adjunto->getPath($idpadre);
    $directorio2 = '';
    foreach ($direcciones2 as $dir) {
      if ($dir['Adjunto']['id'] != $idpadre) {
        $directorio2 = $directorio . DS . $dir['Adjunto']['nombre_original'];
      }
    }
    $padre_nom = '';
    if (!empty($padre)) {
      $padre_nom = $padre['Adjunto']['nombre_original'];
    }
    /* debug(WWW_ROOT . 'files' . $directorio2 . DS . $padre_nom . DS . $am_adj['Adjunto']['nombre_original']);
      debug(WWW_ROOT . 'files' . $directorio . DS . $am_adj['Adjunto']['nombre_original']);
      exit; */
    //$folder = new Folder(WWW_ROOT . 'files' . $directorio . DS . $am_adj['Adjunto']['nombre_original']);
    //$folder->move(WWW_ROOT . 'files' . $directorio2 . DS . $padre_nom);
    rename(WWW_ROOT . 'files' . $directorio . DS . $am_adj['Adjunto']['nombre_original'], WWW_ROOT . 'files' . $directorio2 . DS . $padre_nom . DS . $am_adj['Adjunto']['nombre_original']);
    $this->Adjunto->id = $idam;
    $d_adj['parent_id'] = $idpadre;
    $this->Adjunto->save($d_adj);

    $this->Session->setFlash("Se ha realizado el movimiento correctamente!!", 'msgbueno');
    $this->redirect($this->referer());
  }

  public function vinculo($idFlujosUser = null, $idProceso = null, $idTarea = null) {
    $this->layout = 'ajax';


    $condiciones = array();
    $condiciones2 = array();
    $condiciones2['Vinculacione.flujos_user_id'] = $idFlujosUser;
    
    $condiciones['Adjunto.flujos_user_id'] = $idFlujosUser;
    $condiciones['Adjunto.estado LIKE'] = 'Activo';
    $condiciones['Adjunto.tipo LIKE'] = 'Archivo';
    $idUser = $this->Session->read('Auth.User.id');
    $condiciones["( IF(Adjunto.user_id = $idUser,1,IF(Adjunto.visible = 'Todos',1,  IF(Adjunto.visible = 'Seleccion Personalizada',( IF( ISNULL( (SELECT users_visibles.id FROM users_visibles WHERE users_visibles.user_id = $idUser AND users_visibles.adjunto_id = Adjunto.id AND users_visibles.visible = 1) ),0,1 ) ),0)  )) )"] = 1;
    if (!empty($idProceso)) {
      //$condiciones['Adjunto.proceso_id !='] = $idProceso;
      $condiciones2['Vinculacione.proceso_id'] = $idProceso;
    } else {
      //$condiciones['Adjunto.proceso_id !='] = 0;
      $condiciones2['Vinculacione.proceso_id'] = 0;
      $idProceso = 0;
    }
    if (!empty($idTarea)) {
      $condiciones2['Vinculacione.tarea_id'] = $idTarea;
      //$condiciones['Adjunto.tarea_id !='] = $idTarea;
    } else {
      $condiciones2['Vinculacione.tarea_id'] = 0;
      //$condiciones['Adjunto.tarea_id !='] = 0;
      $idTarea = 0;
    }
    //debug($condiciones2);exit;
    $vinculados = $this->Vinculacione->find('list', array(
      'recursive' => -1,
      'conditions' => $condiciones2,
      'fields' => array('Vinculacione.id', 'Vinculacione.adjunto_id')
    ));
    if (count($vinculados) > 1) {
      $condiciones['Adjunto.id NOT IN'] = $vinculados;
    } elseif (count($vinculados) == 1) {
      $condiciones['Adjunto.id !='] = current($vinculados);
    }
    /* debug($condiciones);
      exit; */
    $adjuntos = $this->Adjunto->find('all', array(
      'recursive' => -1,
      'conditions' => array($condiciones)
    ));

    $this->set(compact('adjuntos', 'idFlujosUser', 'idProceso', 'idTarea'));
  }

  public function vincular($idAdjunto = null, $idFlujosUser = null, $idProceso = null, $idTarea = null) {
    $d_vinc['user_id'] = $this->Session->read('Auth.User.id');
    $d_vinc['adjunto_id'] = $idAdjunto;
    $d_vinc['flujos_user_id'] = $idFlujosUser;
    if (!empty($idProceso)) {
      $d_vinc['proceso_id'] = $idProceso;
    } else {
      $d_vinc['proceso_id'] = 0;
    }

    if (!empty($idTarea)) {
      $d_vinc['tarea_id'] = $idTarea;
    } else {
      $d_vinc['tarea_id'] = 0;
    }
    $this->Vinculacione->create();
    $this->Vinculacione->save($d_vinc);
    $this->Session->setFlash("Se ha vinculado correctamente el archivo!!!", 'msgbueno');
    $this->redirect($this->referer());
  }

  public function desvincular($idAdjunto = null, $idFlujosUser = null, $idProceso = null, $idTarea = null) {
    $d_vinc['Vinculacione.user_id'] = $this->Session->read('Auth.User.id');
    $d_vinc['Vinculacione.adjunto_id'] = $idAdjunto;
    $d_vinc['Vinculacione.flujos_user_id'] = $idFlujosUser;
    if (!empty($idProceso)) {
      $d_vinc['Vinculacione.proceso_id'] = $idProceso;
    } else {
      $d_vinc['Vinculacione.proceso_id'] = 0;
    }
    if (!empty($idTarea)) {
      $d_vinc['Vinculacione.tarea_id'] = $idTarea;
    } else {
      $d_vinc['Vinculacione.tarea_id'] = 0;
    }

    if ($this->Vinculacione->deleteAll($d_vinc)) {
      $this->Session->setFlash("Se ha desvinculado correctamente!!!", 'msgbueno');
    } else {
      $this->Session->setFlash("No se ha podido desvincular!!!", 'msgerror');
    }
    $this->redirect($this->referer());
  }

}
