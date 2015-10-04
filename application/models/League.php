<?php


/**
 * The league model loads all the league data, and provides getter functions for it.
 *
 * @author Jathavan-Mac
 */
class League extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    /** Mimic, database data of all league members.**/
    var $data = array( 
        array (
        'id' => '0', 'conference' => 'American Football Conference', 'region' => array ( 
            array('division' => 'AFC East', 'teams' => array(
                array('id' => '0', 'name' => 'New England Patriots', 'code' => 'NE', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '1', 'name' => 'Buffalo Bills', 'code' => 'BUF', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '2', 'name' => 'New York Jets', 'code' => 'NYJ', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '3', 'name' => 'Miami Dolphins', 'code' => 'MIA', 'wins' => '3', 'loss' => '0', 'ties' => '0' )
            )),
            array('division' => 'AFC North', 'teams' => array(
                array('id' => '4', 'name' => 'Cincinnati Bengals', 'code' => 'CIN', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '5', 'name' => 'Pittsburgh Steelers', 'code' => 'PIT', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '6', 'name' => 'Cleveland Browns', 'code' => 'CLE', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '7', 'name' => 'Baltimore Ravens', 'code' => 'BAL', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            )),
            array('division' => 'AFC South', 'teams' => array(
                array('id' => '8', 'name' => 'Indianapolis Colts', 'code' => 'IND', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '9', 'name' => 'Tennesee Titans', 'code' => 'TEN', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '10', 'name' => 'Houston Texans', 'code' => 'HOU', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '11', 'name' => 'Jackson Jaguars', 'code' => 'JAC', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
            )),
            array('division' => 'AFC West', 'teams' => array(
                array('id' => '12', 'name' => 'Denver Broncos', 'code' => 'DEN', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '13', 'name' => 'Oakland Raiders', 'code' => 'OAK', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '14', 'name' => 'Kansas City Chiefs', 'code' => 'KC', 'wins' => '3', 'loss' => '0', 'ties' => '0' ),
                array('id' => '15', 'name' => 'San Diego Chargers', 'code' => 'SD', 'wins' => '3', 'loss' => '0', 'ties' => '0' )
            ))
        )),
        
        array(
        'id' => '1', 'conference' => 'National Football Conference', 'region' => array (
            array('division' => 'NFC East', 'teams' => array(
                array('id' => '16', 'name' => 'Dallas Cowboys', 'code' => 'DAL', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '17', 'name' => 'New York Giants', 'code' => 'NYG', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '18', 'name' => 'Washington Redskins', 'code' => 'WAS', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '19', 'name' => 'Philadelphia Eagles', 'code' => 'PHI', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
            )),
            array('division' => 'NFC North', 'teams' => array (
                array('id' => '20', 'name' => 'Green Bay Packers', 'code' => 'GB', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '21', 'name' => 'Minnesota Vikings', 'code' => 'MIN', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '22', 'name' => 'Detroit Lions', 'code' => 'DET', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '23', 'name' => 'Chicago Bears', 'code' => 'CHI', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
            )),
            array('division' => 'NFC South', 'teams' => array (
                array('id' => '24', 'name' => 'Carolina Panthers', 'code' => 'CAR', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '25', 'name' => 'Atlanta Falcons', 'code' => 'ATL', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '26', 'name' => 'Tampa Bay Buccaneers', 'code' => 'TB', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '27', 'name' => 'New Orleans Saints', 'code' => 'NO', 'wins' => '2', 'loss' => '1', 'ties' => '0' ), 
            )),
            array('division' => 'NFC West', 'teams' => array(
                array('id' => '28', 'name' => 'Arizona Cardinals', 'code' => 'ARI', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '29', 'name' => 'St. Louis Rams', 'code' => 'STL', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '30', 'name' => 'San Francisco 49ers', 'code' => 'SF', 'wins' => '2', 'loss' => '1', 'ties' => '0' ),
                array('id' => '31', 'name' => 'Seattle Seahawks', 'code' => 'SEA', 'wins' => '2', 'loss' => '1', 'ties' => '0' ) 
            ))
        ))
    );
        
    
    /** Retrieve all the teams in the league**/
    
    public function all() {
        return $this->data;
    }
      
}
