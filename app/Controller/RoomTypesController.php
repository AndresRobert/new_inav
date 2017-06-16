<?php

    class RoomTypesController extends AppController{
        public $uses = array('RoomType');

        public function beforeFilter(){
            parent::beforeFilter();
        }

    }

?>
