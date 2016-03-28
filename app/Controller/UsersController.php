<?php

class UsersController extends AppController {

  public $layout = 'svergara';
  public $uses = array('User');

  /*public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow();
  }*/

  public function index() {
    $usuarios = $this->User->find('all');
    $this->set(compact('usuarios'));
  }

  public function usuario($idusuario = null) {
    $this->layout = 'ajax';
    $this->User->id = $idusuario;
    $this->request->data = $this->User->read();
  }

  public function guardarusuario() {
    $valida = $this->validar('User');
    if (empty($valida)) {
      $this->User->create();
      if (!empty($this->request->data['User']['password2'])) {
        $this->request->data['User']['password'] = $this->request->data['User']['password2'];
      }
      $this->User->save($this->request->data['User']);
      $this->Session->setFlash('Se registro correctamente', 'msgbueno');
    } else {
      $this->Session->setFlash($valida, 'msgerror');
    }
    $this->redirect(array('action' => 'index'));
  }

  public function delete($id = null) {
    $this->User->id = $id;
    if (!$this->User->exists()) {
      $this->Session->setFlash('No existe el usuario.', 'msgerror');
    }
    if ($this->User->delete()) {
      $this->Session->setFlash('se elimino correctamente el usuario.', 'msgbueno');
    } else {
      $this->Session->setFlash('no se pudo eliminar el usuario.', 'msgerror');
    }
    $this->redirect(array('action' => 'index'));
  }

  public function login() {
    $this->layout = 'login';
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        $role = $this->Session->read('Auth.User.role');
        switch ($role) {
          case 'Usuario':
            $this->redirect(array('controller' => 'Tareas', 'action' => 'tablero'));
          case 'Administrador':
            $this->redirect(array('controller' => 'Tareas', 'action' => 'tablero'));
          default:
            break;
        }
      } else {
        $this->Session->setFlash('Usuario o password incorrectos intente de nuevo.', 'msgerror');
      }
    } else {
      //$this->Session->setFlash('Porfavor Ingrese su ususario y su password','msginfo');
    }
  }

  public function salir() {
    $this->redirect($this->Auth->logout());
    $this->redirect(array('action' => 'login'));
  }

}
