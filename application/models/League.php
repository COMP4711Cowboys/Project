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

    /**As the nfl is organized, by Conferences -> Divisions -> Teams, we need to 
    fetch each distinct category. 
    **/
    function fetchCategories($name) {
        $this->db->distinct();
        $this->db->select($name);
        return $this->db->get($this->_tableName)->result_array();
    }

    public function allTable() {
        $conference = $this->fetchCategories('conference');

        foreach($conference as &$region){
            $this->db->distinct();
            $this->db->select('division');
            $this->db->where('conference', $region['conference']);
            $division = $this->db->get($this->_tableName)->result_array();
            foreach($division as &$area){
                $this->db->distinct();
                $this->db->select('id, name, code, filename, wins, losses, ties');
                $this->db->where('division', $area['division']);
                $teams = $this->db->get($this->_tableName)->result_array();
                $area['teams'] = $teams;
            }   
            $region['region'] = $division;
        }
        return $conference;
    }
    
    //we need to determine if a given player code is valid (aka. does it exist)
    function validateCode( $code ){
        
        //DB only allows codes of length 3 or less
        if(strlen($code) > 3){
            return false;
        }
        $this->db->where('code', $code );
        $result = $this->db->count_all_results($this->_tableName);   
        
        return $result > 0; 
    }
    
    function getTeamName( $code ){
        if( $this->validateCode($code) ){
            $this->db->select('name')
                    ->where('code', $code )
                    ->limit(1);
            return $this->db->get($this->_tableName)->result()[0]->name;
        } else {
            return null;
        }
    }

    
    // Get opposing team names and codes while ignoring Dallas Cowboys
    public function getOpposingTeams() {
        $this->db->select('name, code');
        $this->db->where('name !=', 'Dallas Cowboys');
        return $this->db->get($this->_tableName)->result_array();
    }
}
