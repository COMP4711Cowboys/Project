<?php

/**
 * Our homepage. Show the most recently added quote.
 * 
 * controllers/Welcome.php
 *
 * ------------------------------------------------------------------------
 */

class Scores extends Application {

	function __construct()
	{
		parent::__construct();
	}

	//-------------------------------------------------------------
	//  Homepage: show a list of places to fly from
	//-------------------------------------------------------------

	function index()
	{
		$this->load->model('History');
		//update from server
		$this->History->update_data_from_remote();

		//update from xml
		//$this>History->parse_xml();
                
                //sent the OK response with the HTML payload
                $this->output
                    ->set_status_header(200)  //Status Code: OK
                    ->set_content_type('text/html');
	}
        
        
        function clear_prediction_data(){
            $this->load->model('History');
            
            $this->History->clear();
            
            $this->output
                    ->set_status_header(200)  //Status Code: OK
                    ->set_content_type('text/html');
        }


}
