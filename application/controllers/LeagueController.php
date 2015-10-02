<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LeagueController extends Application  {
    
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        
        $this->data['pagebody'] = 'Standings';
        $source = $this->League->all();
        $authors = array();
        /**foreach ($source as $team) {
            
            $authors[] = array('conference' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where']);
        }**/
        
        $this->data = array_merge($this->data, $source);
        
        $this->render();


    }
    
   
}
