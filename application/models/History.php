<?php

/**
 * The history model loads all the game history for the NFL from an external source
 *
 * @author Jathavan Arumugam
 */
define('LOCAL', false);   // control whether we access our model locally, or over XML-RPC
define('RPCSERVER', ('nfl.jlparry.com/rpc/since')); // endpoint fo the XML-RPC server
define('RPCPORT', 80); // port the XML-RPC service is listening on
define('DATAPATH', ('./assets/')); // port the XML-RPC service is listening on


class History extends MY_Model {

    protected $xml = null;
    
    public function __construct(){
        parent::__construct('home', 'away', 'score', 'date', 'submitted');

    }

    public function get_data(){
        
        $this->xmlrpc->server(RPCSERVER, RPCPORT);
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
        $this->xml = simplexml_load_file(DATAPATH . 'results.xml');

        foreach($this->xml->game as $game){
            //echo ($game);
            $record = $this->extract($game);

            $this->add($record);
            echo($record);
           /** echo($record->away);
            echo($record->score);
            echo($record->date);
            echo($record->submitted);**/

            die();
        }


        //var_dump($this->xml);

    }

    function extract($element){
        $record = new stdClass();
        $record->number = (string) $element['number'];
        $record->date = (string) $element['date'];
        $record->away = (string) $element['away'];
        $record->home = (string) $element['home'];

        $record->score = (string) $element;


        $record->game = (string) $element;

        $game = new History($record->home, $record->away, $record->score, $record->date, Date("Ymd"));

        return $game; 


        //parent::__construct('home', 'away', 'score', 'date', 'submitted');

        //$game = new History($element[])
    }

    //determine if the team
    public function predict_game($against) {
        //our team code
        $us = "DAL";
        
        //playing against ourself!? we win by default
        if ( $us == $against ) {
            return true;
        }
        
        /*
         * test return for testing ajax call
        return array( 
            array(19.8, 20, 24, 10), 
            array(18.5, 15, 35, 20)
            );
        */
        //get our average score
        $our_average = $this->total_game_average($us);
        $our_10_game_average =  $this->last_game_average($us,10);
        $our_5_game_average_against = $this->last_game_average_against($us,$against, 5);
        
        $our_score = 0.7 * $our_average 
                + 0.2 * $our_10_game_average 
                + 0.1 * $our_5_game_average_against;
                
        //get their average score
        $their_average = $this->total_game_average($against);
        $their_10_game_average =  $this->last_game_average($against,10);
        $their_5_game_average_against = $this->last_game_average_against($against,$us, 5);
        
        $their_score = 0.7 * $their_average 
                + 0.2 * $their_10_game_average 
                + 0.1 * $their_5_game_average_against;

        
        //return our predictions, with only 2 decimal places
        return array( 
            array(+number_format($our_score,2), +number_format($our_average,2), +number_format($our_10_game_average,2), +number_format($our_5_game_average_against,2)), 
            array(+number_format($their_score,2), +number_format($their_average,2), +number_format($their_10_game_average,2), +number_format($their_5_game_average_against,2))
            );
    }
    
    private function total_game_average($team){
        $this->db->select('score', 'home', 'away')
                ->where('home', $team)
                ->or_where('away',$team);
        
        $results = $this->db->get($this->_tableName)->result();
        $average = $this->calc_average($results, $team);
        
        return $average;
    }
    
    private function last_game_average($team, $games){
        if (!is_numeric($games) || !is_string($team)){
            return 0;
        }
        $this->db->select('score', 'home', 'away')
                ->or_where('home', $team)
                ->or_where('away',$team)
                ->limit($games);
        
        
        $results = $this->db->get($this->_tableName)->result();
        
        $average = $this->calc_average($results, $team);
        
        return $average;
    }
    
    private function last_game_average_against($us, $them, $games){
        if (!is_numeric($games) || !is_string($us) || !is_string($them)){
            return 0;
        }
        
        $this->db->select('score', 'home', 'away')
            ->where_in('home', array($us,$them))
            ->where_in('away', array($us,$them))
            ->limit($games);
        
        $results = $this->db->get($this->_tableName)->result();
        
        $average = $this->calc_average($results, $us);
        
        return $average;
    }
    
    private function calc_average($results, $team){
        $total = 0;
        $count = 0;
        
        foreach( $results as $row ){
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
