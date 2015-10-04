<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Application {

/**
	Loads the about view 
**/
	public function index()
	{
		//Load the view
		$this->data['pagebody'] = 'About';


        $this->render();
	}
}
