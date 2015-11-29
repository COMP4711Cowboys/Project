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


}
