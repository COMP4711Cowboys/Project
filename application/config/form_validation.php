<?php

/* 
 * This file handles form validation rules for the edit and add pages player 
 * pages
 * 
 * Author: Devan Yim
 */

$config['error_prefix'] = '<div class="alert alert-danger">';
$config['error_suffix'] = '</div>';

$config = array(
        'player/validate' => array(
                array(
                        'field' => 'firstName',
                        'label' => 'First Name',
                        'rules' => 'trim|required|max_length[50]|regex_match[/^[a-bA-B\'.-]{1,50}$/]|html_entity_decode()'
                ),
                array(
                        'field' => 'surname',
                        'label' => 'Last Name',
                        'rules' => 'trim|required|max_length[50]|regex_match[/^[a-bA-B\'.-]{1,50}$/]|html_entity_decode()'
                ),
                array(
                        'field' => 'age',
                        'label' => 'Age',
                        'rules' => 'trim|required|integer|is_natural|html_entity_decode()'
                ),
                array(
                        'field' => 'weight',
                        'label' => 'Weight',
                        'rules' => 'trim|required|integer|is_natrual|html_entity_decode()'
                ),
                array(
                        'field' => 'jersey',
                        'label' => 'Jersey',
                        'rules' => 'trim|required|integer|is_natrual|callback_unique_jersey|html_entity_decode()'
                ),
                array(
                        'field' => 'college',
                        'label' => 'College',
                        'rules' => 'trim|required|alpha_numeric_spaces|html_entity_decode()'
                ),
                array(
                        'field' => 'position[]',
                        'label' => 'Position',
                        'rules' => 'trim|required|in_list[QB,RB,FB,WR,TE,OL,C,G,LG,RG,T,LT,RT,K,KR,DL,DE,DT,NT,LB,ILB,OLB,MLB,DB,CB,FS,SS,S,P,PR]|html_entity_decode()'
                )
        )
);