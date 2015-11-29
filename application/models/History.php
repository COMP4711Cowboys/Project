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


}
