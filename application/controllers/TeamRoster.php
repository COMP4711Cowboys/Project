<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TeamRoster
 *
 * TeamRoster displays all the team information for our project team, the 
 * Dallas Cowboys
 * 
 * @author Devan Yim & Derek Gleeson
 */
class TeamRoster extends Application {

    function __construct() {
        parent::__construct();
    }

    //Displays the team roster - Devan Yim
    function index() {
        $this->data['pagebody'] = 'TeamRoster';    // this is the view we want shown
        $this->data['players'] = $this->Roster->getByOrder('jersey');
        $this->render();
    }

    function getPlayer($id){
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
