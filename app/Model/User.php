<?php

    class User extends AppModel{

        public $hasMany = array(
            'UsersMeta' => array(
                'className' => 'UsersMeta',
                'foreignKey' => 'users_id'
            )
        );

        public $validate = array(
            'username' => array(
                'required' => array(
                    'rule' => array('notBlank'),
                    'message' => 'El nombre de usuario es obligatorio. '
                ),
                'isUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'El nombre de usuario ya existe. '
                ),
                'maxlength' => array(
                    'rule' => array('maxlength', 64),
                    'message' => 'El nombre de usuario es de un máximo de 64 caracteres. '
                )
            ),
            'password' => array(
                'required' => array(
                    'rule' => array('notBlank'),
                    'message' => 'Debe ingresar una contraseña. '
                ),
                'minlength' => array(
                    'rule' => array('minlength', 6),
                    'message' => 'La clave de usuario es de un mínimo de 8 caracteres. '
                ),
                'maxlength' => array(
                    'rule' => array('maxlength', 64),
                    'message' => 'La clave de usuario es de un máximo de 64 caracteres. '
                )
            ),
            'email' => array(
                'email' => array(
                    'rule' => array('email', false),
                    'message' => 'Correo electrónico inválido. '
                ),
                'maxlength' => array(
                    'rule' => array('maxlength', 128),
                    'message' => 'El correo electónico es de un máximo de 128 caracteres. '
                ),
				'required' => array(
                    'rule' => array('notBlank'),
                    'message' => 'El correo es obligatorio. '
                ),
                'isUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'El correo ya existe. '
                )
            )
        );

        public function beforeSave($options = array()){
            if(isset($this->data['User']['password'])):
                $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            endif;
            return true;
        }
    }

?>
