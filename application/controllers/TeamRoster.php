<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TeamRoster
 *
 * TeamRoster displays all the team information for our project team, the 
 * Dallas Cowboys
 * 
 * @author Devan Yim & Derek Gleeson
 */
class TeamRoster extends Application {
    public $pagenum = 0;
    function __construct() {
        parent::__construct();
    }

    //Displays the team roster - Devan Yim
    function index() {
        $this->page();
    }
    
    //Displays the team roster in groups with pagination - Evanna Wong
    function page($page_num = 1){
        $mode = get_cookie('layout_mode');
        
        if ($mode == null) {
            $mode = "table";
            $layout_cookie = array(
                'name' => 'layout_mode',
                'value' => "$mode",
                'expire' => '86500',
                'path' => '/',
            );
            set_cookie($layout_cookie);
        }
        if ($mode == "table") {
            $this->data['pagebody'] = 'TeamRosterTable';
        } else {
            $this->data['pagebody'] = 'TeamRosterGallery';
        }
        
        $order = get_cookie('roster_order');
        
        if ($order == null) {
            $order = "jersey";
            $order_cookie = array(
                'name' => 'roster_order',
                'value' => "$order",
                'expire' => '86500',
                'path' => '/',
            );
            set_cookie($order_cookie);
        }
        
        //Pagination settings
        $config = array();
        $config["base_url"] = base_url() . "Team/page";
        $config["total_rows"] = $this->Roster->record_count();
        $config['per_page'] = 12;
        $config['use_page_numbers']  = TRUE;
        $config['page_query_string'] = FALSE;
        
        //Bootstrap pagination controls
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";       
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        
        $this->pagination->initialize($config); 
        
        //Fetch data from model
        $this->data['players'] = $this->Roster->get_data($page_num, $order);
        
        //Create page links
        $this->data["links"] = $this->pagination->create_links();
        
        $this->render();
    }

    function order($order_type) {
        $cookie = array(
            'name' => 'roster_order',
            'value' => "$order_type",
            'expire' => '86500',
            'path' => '/',
        );
        set_cookie($cookie);
        $this->index();
    }
}
