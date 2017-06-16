<?php

    class BuildingsController extends AppController{
        public $uses = array('Building');

        public function beforeFilter(){
            parent::beforeFilter();
        }

    }

?>
