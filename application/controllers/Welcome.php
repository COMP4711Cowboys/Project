<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

/**
    Renders the home page.
**/
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data['pagebody'] = 'welcome_message';    // this is the view we want shown
        $this->render();
    }

}
