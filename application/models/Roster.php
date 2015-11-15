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
    public function getByOrder($order) {
        $result = $this->all();
        usort($result, array($this, $order));
        return $result;
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
    
    public function get_data($limit, $page_number){   
        $index = ($limit * ($page_number - 1));
        $this->db->limit($limit, $index);
        $query = $this->db->get("players");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    'number' => $row->jersey,
                    'name' => $row->surname . ", " . $row->firstname, 
                    'mug' => $row->mug,
                    'position' => $row->position,
                    'age' => $row->age,
                    'weight' => $row->weight, 
                    'college' => $row->college
                );
            }
            return $data;
        }
        
        return false;
    }

}
