<?php

/**
	Loads the leagues, and interacts with the league model.
    Displays the Standings page with all the teams displayed.
**/
class LeagueStandings extends Application  {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        
        //Load the appropriate view
        $this->data['pagebody'] = 'Standings';

        //Load all the organized league data
        $source = $this->League->allTable();
        

        $this->data['league'] = $source;

        //Render Data
        $this->render();

    }
    
   
}
