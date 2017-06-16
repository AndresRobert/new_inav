<?php

    class UsersController extends AppController{

        public $uses = array('User');

        public function beforeFilter(){
            parent::beforeFilter();
            $this->Auth->allow('edit_password');
            $this->Auth->allow('logout');
        }
        
        public function login(){
            if($this->request->is('post')):
                if($this->Auth->login() && $this->User->find('count', array('conditions' => array('User.username' => $this->request->data['User']['username']), 'recursive' => 0))):
                    $user = $this->User->find('first', array('conditions' => array('User.username' => $this->request->data['User']['username'])));
                    $this->Session->write('user.id', $user['User']['id']);
                    $this->Session->write('user.email', $user['User']['email']);
                    $this->Flash->set('El nombre de usuario y/o contraseña son correctos',['params' => ['class' => 'success']]);
                    $this->redirect(array('controller' => 'pages', 'action' => 'display'));
                else:
                    $this->Flash->set('El nombre de usuario y/o contraseña son incorrectos');
                endif;
            endif;
        }

        public function logout(){
            $this->redirect($this->Auth->logout());
        }

        public function edit_password($id = 1) {
            $this->User->id = $id;
            if($this->request->is('post')){
                if($this->User->save($this->request->data)){
                    $this->Flash->set('Contraseña actualizada exitosamente.',['params' => ['class' => 'success']]);
                    $this->redirect(array('controller' => 'rooms', 'action' => 'index'));
                }
                else{
                    $this->Flash->set('Debe ingresar todos los campos obligatorios y/o corregir los errores.');
                }
            }
        }

    }

?>
