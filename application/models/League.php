<?php


/**
 * The league model loads all the league data, and provides getter functions for it.
 *
 * @author Jathavan-Mac
 */
class League extends MY_Model {

    public function __construct(){
        parent::__construct('league', 'id');
    }
    
     public function city($a, $b){
        return strcasecmp($a["city"], $b["city"]);
    }

    public function team($a, $b){
        return strcasecmp($a["filename"], $b["filename"]);  
    }

    public function standing($a, $b){
        return $b['netpoints'] - $a['netpoints'];
    }
    
    /**As the nfl is organized, by Conferences -> Divisions -> Teams, we need to 
    fetch each distinct category. 
    **/
    function fetchCategories($name) {
        $this->db->distinct();
        $this->db->select($name);
        return $this->db->get($this->_tableName)->result_array();
    }

    //Fetch data by league and sort by sub order option
    public function getByLeague($order){
        $result = $this->all();
        usort($result, array($this, $order));
        return $result;
    }
    
    //Fetch data by conference and sort by sub order option
    public function getByConference($order){
        $conference = $this->fetchCategories('conference');
        
        foreach($conference as &$teams) {
            $this->db->distinct();
            $this->db->select('id, name, city, code, filename, wins, losses, ties, division, netpoints');
            $this->db->where('conference', $teams['conference']);
            $team = $this->db->get($this->_tableName)->result_array();
            usort($team, array($this, $order));
            $teams['teams'] = $team;
        }
        
        return $conference;
    }
    
    //Fetch data by division and sort by sub order option
    public function getByDivision($order){
        $conference = $this->fetchCategories('conference');

        foreach($conference as &$region){
            $this->db->distinct();
            $this->db->select('division');
            $this->db->where('conference', $region['conference']);
            $division = $this->db->get($this->_tableName)->result_array();
            foreach($division as &$area){
                $this->db->distinct();
                $this->db->select('id, name, city, code, filename, wins, losses, ties, netpoints');
                $this->db->where('division', $area['division']);
                $teams = $this->db->get($this->_tableName)->result_array();
                usort($teams, array($this, $order));
                $area['teams'] = $teams;
            }   
            $region['region'] = $division;
        }
        return $conference;
    }  
}
