<?php

    class UsersMeta extends AppModel{

        public $belongsTo = array(
            'User' => array(
                'className' => 'User',
                'foreignKey' => 'users_id'
            )
        );

    }

?>
