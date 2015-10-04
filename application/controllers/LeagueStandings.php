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

        //Load all the league data
        $source = $this->League->all();
        

        $this->data['league'] = $source;

        //Render Data
        $this->render();

    }
    
   
}
