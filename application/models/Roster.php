<?php

/**
 * The team model loads all the players on the Dallas Cowboys team
 *
 * @author Devan & Derek
 */
class Roster extends MY_Model {

    
    public function __construct(){
        parent::__construct('players', 'id');
    }

    public function jersey($a, $b){
        return $a['jersey'] - $b['jersey'];
    }

    public function firstname($a, $b){
        return strcasecmp($a["firstname"], $b["firstname"]);  
    }

    public function surname($a, $b){
        return strcasecmp($a["surname"], $b["surname"]);  
    }

    /** Retrieve all the teams in the league, by the given order**/
    public function getByOrder($order, $id) {
        $result = $this->all();
        usort($result, array($this, $order));
        $result = array_chunk($result, 12);
        return $result[$id];
    }
    
    public function jersey_in_use($jersey) {
        $sql = $this->db->select('jersey')
                ->where('jersey',$jersey);
        
        return  $this->db->count_all_results() > 0;
    }
    
    public function jersey_in_use_by_other($jersey, $id) {
        $sql = $this->db->select('jersey')
                ->where('jersey',$jersey)
                ->where('id !=', $id);
        
        return $this->db->count_all_results() > 0;
    }
    
    public function record_count() {
        return $this->db->count_all("players");
    }
    
    public function get_data($page_number, $orderby){   
        $query = $this->getByOrder($orderby, $page_number - 1);
        
        if (count($query) > 0) {
            return $query;
        }
        
        return false;
    }

}
