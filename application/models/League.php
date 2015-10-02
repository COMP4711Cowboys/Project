<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FUCKUNICORN
 *
 * @author Jathavan-Mac
 */
class League extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
    var $data = array(
        array('id' => '0', 'conference' => 'American Football Conference', 'division' => 'East', 
             'name' => 'New England Patriots', 'code' => 'NE', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
        
        array('id' => '1', 'conference' => 'American Football Conference', 'division' => 'East', 
             'name' => 'Buffalo Bills', 'code' => 'BUF', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
        
        array('id' => '2', 'conference' => 'American Football Conference', 'division' => 'East', 
             'name' => 'New York Jets', 'code' => 'NYJ', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),        
        
        array('id' => '3', 'conference' => 'American Football Conference', 'division' => 'East', 
            'name' => 'Miami Dolphins', 'code' => 'MIA', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '4', 'conference' => 'American Football Conference', 'division' => 'North', 
            'name' => 'Cincinnati Bengals', 'code' => 'CIN', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
        
        array('id' => '5', 'conference' => 'American Football Conference', 'division' => 'North', 
            'name' => 'Pittsburgh Steelers', 'code' => 'PIT', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '6', 'conference' => 'American Football Conference', 'division' => 'North', 
            'name' => 'Cleveland Browns', 'code' => 'CLE', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '7', 'conference' => 'American Football Conference', 'division' => 'North', 
            'name' => 'Baltimore Ravens', 'code' => 'BAL', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '8', 'conference' => 'American Football Conference', 'division' => 'South', 
            'name' => 'Indianapolis Colts', 'code' => 'IND', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '9', 'conference' => 'American Football Conference', 'division' => 'South', 
            'name' => 'Tennesee Titans', 'code' => 'TEN', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '10', 'conference' => 'American Football Conference', 'division' => 'South', 
            'name' => 'Houston Texans', 'code' => 'HOU', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '11', 'conference' => 'American Football Conference', 'division' => 'South', 
            'name' => 'Jackson Jaguars', 'code' => 'JAC', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '12', 'conference' => 'American Football Conference', 'division' => 'West', 
            'name' => 'Denver Broncos', 'code' => 'DEN', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '13', 'conference' => 'American Football Conference', 'division' => 'West', 
            'name' => 'Oakland Raiders', 'code' => 'OAK', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '14', 'conference' => 'American Football Conference', 'division' => 'West', 
            'name' => 'Kansas City Chiefs', 'code' => 'KC', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),

        array('id' => '15', 'conference' => 'American Football Conference', 'division' => 'West', 
             'name' => 'San Diego Chargers', 'code' => 'SD', 'wins' => '3', 'loss' => '0', 'ties' => '0' )
        
    );
        
    
    
    public function get($which){
        
        foreach($this->data as $record){
            if ($record['id'] == $which)
                return $record;
        }
        
        return null;
    }
    
    public function all() {
        return $this->data;
    }
      
}
