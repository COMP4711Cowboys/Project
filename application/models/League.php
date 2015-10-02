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
        array (
        'id' => '0', 'conference' => 'American Football Conference', 
        'team' => array (
            array('id' => '0', 'division' => 'AFC East', 'name' => 'New England Patriots', 'code' => 'NE', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '1', 'division' => 'AFC East', 'name' => 'Buffalo Bills', 'code' => 'BUF', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '2', 'division' => 'AFC East', 'name' => 'New York Jets', 'code' => 'NYJ', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '3', 'division' => 'AFC East', 'name' => 'Miami Dolphins', 'code' => 'MIA', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '4', 'division' => 'AFC North', 'name' => 'Cincinnati Bengals', 'code' => 'CIN', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '5', 'division' => 'AFC North', 'name' => 'Pittsburgh Steelers', 'code' => 'PIT', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '6', 'division' => 'AFC North', 'name' => 'Cleveland Browns', 'code' => 'CLE', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '7', 'division' => 'AFC North', 'name' => 'Baltimore Ravens', 'code' => 'BAL', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '8', 'division' => 'AFC South', 'name' => 'Indianapolis Colts', 'code' => 'IND', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '9', 'division' => 'AFC South', 'name' => 'Tennesee Titans', 'code' => 'TEN', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '10', 'division' => 'AFC South', 'name' => 'Houston Texans', 'code' => 'HOU', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '11', 'division' => 'AFC South', 'name' => 'Jackson Jaguars', 'code' => 'JAC', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '12', 'division' => 'AFC West', 'name' => 'Denver Broncos', 'code' => 'DEN', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '13', 'division' => 'AFC West', 'name' => 'Oakland Raiders', 'code' => 'OAK', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '14', 'division' => 'AFC West', 'name' => 'Kansas City Chiefs', 'code' => 'KC', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            array('id' => '15', 'division' => 'AFC West', 'name' => 'San Diego Chargers', 'code' => 'SD', 'wins' => '3', 'loss' => '0', 'ties' => '0' )
        )),
        
        array(
        'id' => '1', 'conference' => 'National Football Conference', 
        'team' => array (
            array('id' => '16', 'division' => 'NFC East', 'name' => 'Dallas Cowboys', 'code' => 'DAL', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '17', 'division' => 'NFC East', 'name' => 'New York Giants', 'code' => 'NYG', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '18','division' => 'NFC East', 'name' => 'Washington Redskins', 'code' => 'WAS', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '19','division' => 'NFC East', 'name' => 'Philadelphia Eagles', 'code' => 'PHI', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '20', 'division' => 'NFC North', 'name' => 'Green Bay Packers', 'code' => 'GB', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '21', 'division' => 'NFC North', 'name' => 'Minnesota Vikings', 'code' => 'MIN', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '22', 'division' => 'NFC North', 'name' => 'Detroit Lions', 'code' => 'DET', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '23', 'division' => 'NFC North', 'name' => 'Chicago Bears', 'code' => 'CHI', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '24', 'division' => 'NFC South', 'name' => 'Carolina Panthers', 'code' => 'CAR', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '25', 'division' => 'NFC South', 'name' => 'Atlanta Falcons', 'code' => 'ATL', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '26', 'division' => 'NFC South', 'name' => 'Tampa Bay Buccaneers', 'code' => 'TB', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '27', 'division' => 'NFC South', 'name' => 'New Orleans Saints', 'code' => 'NO', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '28', 'division' => 'NFC West', 'name' => 'Arizona Cardinals', 'code' => 'ARI', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '29', 'division' => 'NFC West', 'name' => 'St. Louis Rams', 'code' => 'STL', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '30', 'division' => 'NFC West', 'name' => 'San Francisco 49ers', 'code' => 'SF', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),

            array('id' => '31', 'division' => 'NFC West', 'name' => 'Seattle Seahawks', 'code' => 'SEA', 'wins' => '2', 'loss' => '1', 'ties' => '0' ) 
        ))
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
