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
        //Set cookie based on selected league order
        $initial_order = "division";
        $order_league_1 = array(
            'name' => 'league_order',
            'value' => "$initial_order",
            'expire' => '86500',
            'path' => '/',
        );
        
        //Set cookie based on selected league sub order
        $initial_sub_order = "city";
        $order_league_2 = array(
            'name' => 'league_sub_order',
            'value' => "$initial_sub_order",
            'expire' => '86500',
            'path' => '/',
        );
        
        set_cookie($order_league_1);
        set_cookie($order_league_2);
        
        //Load the appropriate view
        $this->data['pagebody'] = 'StandingsDivision';

        //Load all the organized league data
        $data = $this->League->getByDivision('city');
        
        $this->data['league'] = $data;
        
        //Render Data
        $this->render();

    }
    
   function data () {
        $league_order = $this->input->post('sortReq1');
        $league_sub_order = $this->input->post('sortReq2');

        //Set league order cookie based on user's selected option
       $initial_order = "division";
        $order_league_1 = array(
            'name' => 'league_order',
            'value' => "$league_order",
            'expire' => '86500',
            'path' => '/',
        );
        
        //Set league sub order cookie based on user's selected option
        $initial_sub_order = "city";
        $order_league_2 = array(
            'name' => 'league_sub_order',
            'value' => "$league_sub_order",
            'expire' => '86500',
            'path' => '/',
        );
        
        set_cookie($order_league_1);
        set_cookie($order_league_2);

        //Determine which partial view to display based on user's order selection
        if($league_order == "league")
        {
            $this->data['pagebody'] = 'StandingsLeague';
            $data = $this->League->getByLeague($league_sub_order);
            
        } else if ($league_order == "conference") 
        {
            $this->data['pagebody'] = 'StandingsConference';
            $data = $this->League->getByConference($league_sub_order);
            
        } else 
        {
            $this->data['pagebody'] = 'StandingsDivision';
            $data = $this->League->getByDivision($league_sub_order);       
        }

        $this->data['league'] = $data;

        $this->render();
   }
}
