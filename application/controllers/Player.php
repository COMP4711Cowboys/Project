<?php
/**
 * Description of Player
 *
 * CRUD controller for Player information
 * 
 * @author Devan Yim
 */
class Player extends Application {

    function __construct() {
        parent::__construct();
    }

    function add(){
        
    }
    
    function edit(){
        
    }
    
    function post(){
        
    }
    
    function delete(){
        
    }



    function index($id){
        $this->data['pagebody'] = 'Player';    // this is the view we want shown
        $query = $this->Roster->getArray($id);
        $this->data['jersey'] = $query['jersey'];
        $this->data['surname'] = $query['surname'];
        $this->data['firstname'] = $query['firstname'];
        $this->data['id'] = $query['id'];
        $this->data['mug'] = $query['mug'];
        $this->data['weight'] = $query['weight'];
        $this->data['position'] = $query['position'];
        $this->data['college'] = $query['college'];
        $this->data['age'] = $query['age'];
        $this->render();
    }


    
}
