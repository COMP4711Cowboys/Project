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
		$this->History->get_data();
	}


}
