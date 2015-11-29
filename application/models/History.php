<?php

/**
 * The history model loads all the game history for the NFL from an external source
 *
 * @author Jathavan Arumugam
 */
define('LOCAL', false);   // control whether we access our model locally, or over XML-RPC
define('RPCSERVER', ('nfl.jlparry.com/rpc/since')); // endpoint fo the XML-RPC server
define('RPCPORT', 80); // port the XML-RPC service is listening on

class History extends MY_Model {


    
    public function __construct(){
        parent::__construct('home', 'away', 'score', 'date', 'submitted');
    }

    public function get_data(){
        
        $this->xmlrpc->server('nfl.jlparry.com/rpc/since', 80);
        $this->xmlrpc->method('scores');

        $request = array('20150830');
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request())
        {
            echo $this->xmlrpc->display_error();
            echo '<br/>' . var_dump($this->xmlrpc->response) . '<br/>';
        }

        $list = $this->xmlrpc->display_response();
        
        var_dump($list);
        die();

    }

    public function parse_xml() {

    }

    //determine if the team
    public function predictWin($against) {
        //our team code
        $us = "DAL";
        
        //playing against ourself!? we win by default
        if ( $us == $against ) {
            return true;
        }
        
        return true;
        
        //get our average
        $our_average = $this->total_game_average($us);
        $our_10_game_average =  $this->last_game_average($us,10);
        $our_5_game_average_against = $this->last_game_average($us,$against, 5);
        
        $certainty = 0.7 * $our_average 
                + 0.2 * $our_10_game_average 
                + 0.1 * $our_5_game_average_against;
        
        if ($certainty > .5 ){
            return true;
        }
        return false;
    }
    
    private function total_game_average($team){
        $query = $this->db->select('score', 'home', 'away')
                ->where('home', $team)
                ->or_where('away',$team);
        
        $results = $query->results();
        $average = $this->calc_average($results, $team);
        
        return $average;
    }
    
    private function last_game_average($team, $games){
        if (!is_numeric($games) || !is_string($team)){
            return 0;
        }
        $query = $this->db->select('score', 'home', 'away')
                ->or_where('home', $team)
                ->or_where('away',$team)
                ->limit($games);
        
        $results = $query->results();
        $average = $this->calc_average($results, $team);
        
        return $average;
    }
    
    private function last_game_average_against($us, $them, $games){
        if (!is_numeric($games) || !is_string($us) || !is_string($them)){
            return 0;
        }
        
        $query = $this->db->select('score', 'home', 'away')
                ->where_in('home', array($us,$them))
                ->where_in('away', array($us,$them))
                ->limit($games);
        
        $results = $query->results();
        $average = $this->calc_average($results, $team);
        
        return $average;
    }
    
    private function calc_average($results, $team){
        $total = 0;
        $count = 0;
        
        foreach( $results as $rows ){
            //split the scores home is 0, away is 1
            $scores = explode(":",$row->score);
            
            if ($team == $row->home ){
                $total = $total + intval($scores[0]);
            } else if ($team == $row->away ){
                $total = $total + intval($scores[1]);
            }
            $count = $count + 1;
        }
        $average = $total / $count;
        
        return $average;
    }
    
}
