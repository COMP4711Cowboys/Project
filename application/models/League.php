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
        $this->db->where('code', $code);
        $this->db->from($this->_tableName);
        return $this->db->count_all_results() > 0; 
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

    
      
}
