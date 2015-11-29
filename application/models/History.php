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
        print_r($list);
        die();
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


}
