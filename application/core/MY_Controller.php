<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2013, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;                  // identifier for our content

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */

    function __construct() {
        parent::__construct();
        $this->data = array();
        $this->data['title'] = 'COMP4711 Project';    // our default title
        $this->errors = array();
        $this->data['pageTitle'] = 'COMP4711 Project';   // our default page
        $this->data['menuItems'] = array(
            array( 'link' => base_url(), 'icon'=>'icon_house', 'text'=>'Home' ),
            array( 'link' => base_url('Team'), 'icon'=>'icon_group', 'text'=>'Team' ),
            array( 'link' => base_url('Standings'), 'icon'=>'icon_globe_alt', 'text'=>'League' ),
            array( 'link' => base_url('About'), 'icon'=>'icon_info', 'text'=>'About' ),
        );
        $this->data['logo'] = base_url("img/logo.png");
    }

    /**
     * Render this page
     */
    function render() {
        $this->data['sidebar'] = $this->parser->parse('_sidebar', $this->data, true);
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
        $this->parser->parse('_template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
