<?php

    class RoomsController extends AppController{
        public $uses = array('Building','Room');

        public function beforeFilter(){
            parent::beforeFilter();
            $this->Auth->allow('index');
        }

        public function index($buildings_id = 1, $rooms_name = 1){
            $room = $this->Room->find('first', array(
                'recursive' => -1,
                'fields' => array('id','image'),
                'conditions' => array(
                    'Room.buildings_id' => $buildings_id,
                    'Room.name LIKE' => "%$rooms_name%",
                    'Room.deleted' => 0,
                    'Room.active' => 1
                )
            ));
            $img_src = '';
            if (count($room) > 0) :
                $img_src = "building/$buildings_id/room/".$room['Room']['id'].".".$room['Room']['image'];
            endif;
            $this->set('img_src',$img_src);
        }

    }

?>
