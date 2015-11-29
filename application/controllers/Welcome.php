<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

/**
    Renders the home page.
**/
    function __construct() {
        parent::__construct();
        
        $this->load->helper(array('form'));
    }

    public function index() {
        $this->data['pagebody'] = 'welcome_message'; // this is the view we want shown
        $this->setup_prediction_form();
        $this->render();
    }
    
    private function setup_prediction_form() {
        
        $opposing_teams = $this->League->getOpposingTeams();
        $team_list = array();
        foreach($opposing_teams as $team) {
            $entry = array($team['code'] => $team['name']);
            $team_list = array_merge($team_list, $entry);
        }
        
        // Styling
        $attributes = array('class' => 'form-control');
        
        $this->data['success_message'] = "";
        
        $this->data['f_opposition_err'] = form_error('opposition');
        $this->data['f_opposition'] = form_dropdown('opposition', $team_list, $attributes);
    }
}
