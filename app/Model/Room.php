<?php

    class Room extends AppModel{

        public $belongsTo = array(
            'Building' => array(
                'className' => 'Building',
                'foreignKey' => 'buildings_id'
            ),
            'RoomType' => array(
                'className' => 'RoomType',
                'foreignKey' => 'room_types_id'
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
            )
        );

    }

?>
