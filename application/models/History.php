<?php

/**
 * The history model loads all the game history for the NFL from an external source
 *
 * @author Jathavan Arumugam
 */
define('LOCAL', false);   // control whether we access our model locally, or over XML-RPC
define('RPCSERVER', ('nfl.jlparry.com/rpc')); // endpoint fo the XML-RPC server
define('RPCPORT', 80); // port the XML-RPC service is listening on
define('DATAPATH', ('./assets/')); // port the XML-RPC service is listening on


class History extends MY_Model2 {

    protected $xml = null;
    
    public function __construct(){
        parent::__construct('history', 'home', 'date');
    }

    //Recieves the XML from the remote server and adds records to the database.
    public function get_data_from_remote(){
        
        $this->xmlrpc->server(RPCSERVER, RPCPORT);
        $this->xmlrpc->method('since');

        $mostRecentUpdate = $this->get_update_date();

        //$mostRecentUpdate = "20150830"; 
        $request = array($mostRecentUpdate);
        $this->get_update_date();
        $this->xmlrpc->request($request);

        if (!$this->xmlrpc->send_request())
        {
            echo $this->xmlrpc->display_error();
            echo '<br/>' . var_dump($this->xmlrpc->response) . '<br/>';
        }

        $list = $this->xmlrpc->display_response();
        $this->parse_result($list);
    }

    //Parses a local XML file and adds records to the database
    public function parse_xml() {
        $this->xml = simplexml_load_file(DATAPATH . 'results.xml');

        foreach($this->xml->game as $game){
            $record = $this->extract_xml($game);
            $this->add_game($record);
        }
    }

    //Parse the list returned by the XML-RPC request
    public function parse_result($list) {

        foreach($list as $game){
            $record = $this->extract($game);
            $this->add_game($record);
        }
    }

    //Adds the game to the database
    public function add_game($record){
        $gameExists = $this->exists($record->home, $record->date);

        if(!$gameExists){
            $this->add($record);
        } 

    }

    //Retrieve the day the record was updated on
    function get_update_date(){
        $result = $this->all();

        if($result == NULL){
            return "20150830";
        }
        
        $lastUpdate = NULL;
        foreach($result as $dates)
        {
            foreach($dates as $element => $date)
            {
                if ($element == "inserted" && ($date >= $lastUpdate))
                {
                    $lastUpdate = $date;
                }
            }
        }
        $lastUpdate = new DateTime($lastUpdate);
        $result = $lastUpdate->format('Ymd');
        return($result);
    }

    //Extracts the game from the XML File and creates a history record from it
    function extract($element){
        $record = $this->create();
        $record->date = $element['date'];
        $record->away = $element['away'];
        $record->home = $element['home'];
        $record->score = "21:21";
        $record->inserted = Date("Y-m-d H:i:s");
        return $record; 
    }

    //Extracts the game from the XML File and creates a history record from it
    function extract_xml($element){
        $record = $this->create();
        $record->date = (string) $element['date'];
        $record->away = (string) $element['away'];
        $record->home = (string) $element['home'];
        $record->score = (string) $element;
        $record->inserted = Date("Y-m-d H:i:s");

        return $record; 
    }

    //determine if the team
    public function predict_game($against) {
        //our team code
        $us = "DAL";
        
        //get our average score
        $our_average = $this->total_game_average($us);
        $our_10_game_average =  $this->last_game_average($us,10);
        $our_5_game_average_against = $this->last_game_average_against($us,$against, 5);
        
        $our_score = round(0.7 * $our_average 
                + 0.2 * $our_10_game_average 
                + 0.1 * $our_5_game_average_against);
                
        //get their average score
        $their_average =  $this->total_game_average($against);
        $their_10_game_average = $this->last_game_average($against,10);
        $their_5_game_average_against = $this->last_game_average_against($against,$us, 5);
        
        $their_score = round( 0.7 * $their_average 
                + 0.2 * $their_10_game_average 
                + 0.1 * $their_5_game_average_against );

        
        //return our predictions, with only 2 decimal places
        return array( 
            array($our_score, round($our_average), round($our_10_game_average), round($our_5_game_average_against)), 
            array($their_score, round($their_average), round($their_10_game_average), round($their_5_game_average_against))
            );
    }
    
    private function total_game_average($team){
        $this->db->select(array('score', 'home', 'away'))
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
        $this->db->select(array('score', 'home', 'away', 'date'))
                ->or_where('home', $team)
                ->or_where('away',$team)
                ->order_by('date', 'DESC')
                ->limit($games);
        
        
        $results = $this->db->get($this->_tableName)->result();
        
        $average = $this->calc_average($results, $team);
        
        return $average;
    }
    
    private function last_game_average_against($us, $them, $games){
        if (!is_numeric($games) || !is_string($us) || !is_string($them)){
            return 0;
        }
        
        $this->db->select( array('score', 'home', 'away', 'date'))
            ->where_in('home', array($us,$them))
            ->where_in('away', array($us,$them))
            ->order_by('date', 'DESC')
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
        
        //don't want to divid by zero if there were no games!
        if($count == 0)
        {
            return 0;
        }
        
        $average = $total / $count;
        return $average;
    }
    
}
