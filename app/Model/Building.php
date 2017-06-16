<?php

    class Building extends AppModel{

        public $hasMany = array(
            'Room' => array(
                'className' => 'Room'
            )
        );

        public $validate = array(
            'name' => array(
                'required' => array(
                    'rule' => array('notBlank'),
                    'message' => 'El nombre del edificio es obligatorio. '
                ),
                'maxlength' => array(
                    'rule' => array('maxlength', 64),
                    'message' => 'El nombre del edificio es de un máximo de 64 caracteres. '
                )
            ),
            'description' => array(
                'required' => array(
                    'rule' => array('notBlank'),
                    'message' => 'Debe ingresar una descripción. '
                ),
                'maxlength' => array(
                    'rule' => array('maxlength', 128),
                    'message' => 'La descripción es de un máximo de 128 caracteres. '
                )
            ),
            'geotag' => array(
                'required' => array(
                    'rule' => array('notBlank'),
                    'message' => 'El correo es obligatorio. '
                ),
                'maxlength' => array(
                    'rule' => array('maxlength', 32),
                    'message' => 'La localización es de un máximo de 32 caracteres. '
                ),
                'isUnique' => array(
                    'rule' => 'isUnique',
                    'message' => 'La ubicación ya fue asignada. '
                )
            )
        );

    }

?>
