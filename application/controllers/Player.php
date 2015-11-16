<?php
/**
 * Description of Player
 *
 * CRUD controller for Player information
 * 
 * @author Devan Yim
 */
class Player extends Application {

    function __construct() {
        parent::__construct();

        $this->load->library(array('form_validation'));
        $this->load->helper(array('form', 'file'));
    }
    
    /**
     * When the user wants to create a new player
     */
    public function add(){
        $this->session->unset_userdata('player_data');
        if( !$this->is_edit_mode_on() ){
            return;
        }
        
        //get initialized an empty player array
        $new_player = (array)$this->Roster->create();
        
        //$new_player = json_decode(json_encode($new_player), true);
        // create() set's id to '', so I need to set it to null so the insert
        // call will auto-increment the value;
        $new_player['id'] = null;
        $new_player['mug'] = 'default_profile_image.png';
        $this->session->set_userdata('player_data',$new_player);
        
        $this->setup_form_data();
        $this->data['pagebody'] = 'PlayerEdit';
        
        $this->render();
    }
    
    /**
     * When the user wants to view a player (and possibly edit it)
     */
    public function view($id){
        
        //this functions will make the appropriate render call for us on 
        //error, so we just need to return if we get an false/null response back
        $player = $this->is_valid_id($id);
        
        //get the data from the model, set the session variable 
        
        $this->session->set_userdata('player_data',$player);
        $sess = $this->session->userdata('player_data');
        
        $this->data = array_merge($this->data, $sess);
        
        //check if the user is in edit mode
        $edit_mode = get_cookie('edit_mode', TRUE);
        //if the session variable was not set, we'll set it to off.
        if ($edit_mode == null) {
            $edit_mode = 'off';
            $cookie = array(
                'name' => 'edit_mode',
                'value' => "$edit_mode",
                'path' => '/',
            );
            set_cookie($cookie);
        }
        
        if( $edit_mode == 'on' ){
            $this->setup_form_data();
            $this->data['pagebody'] = 'PlayerEdit';
        } else {
            $this->data['pagebody'] = 'PlayerView';
        }

        $this->render();
    }
    
    /**
     * When the user wants to save a player record to the database
     */
    public function save(){
        
        if( !$this->is_edit_mode_on() ){
            
        }
        
        $player = $this->get_values_from_form();
        
        //validate the data
        $valid = $this->validate();
        $this->session->set_userdata('player_data',$player);
        
        
        if(!$valid) {
            $this->data['pagebody'] = 'PlayerEdit';
            $this->render();
            return;
        }
        
        //upload the image
        $filename = $this->upload_mug();
        
        if($filename != null){            
            $player['mug'] = $filename;
        }
        
        //save the value, a null id means it's a new player and should be inserted
        if ($player['id'] == null){
            $record_id = $this->Roster->add($player);
            $player['id'] = $record_id;
        } else {
            $this->Roster->update($player);
        }
        
        $this->session->unset_userdata('player_data');
        redirect('/TeamRoster');
        
    }
    
    /** 
     * When the user wants to delete a player from the DB
     * @param type $id
     */
    public function delete($id){
        
        //these two functions will make the appropriate render call for us on 
        //error, so we just need to return if we get an false/null response back
        !$this->is_edit_mode_on();
        
        $player = $this->is_valid_id($id);
        
        //everything checks out, lets delete it
        $this->Roster->delete($id, 'id');
        
        //remove any player_data records from session
        $this->session->unset_userdata('player_data');
        
        //off to the roster page!
        redirect('/TeamRoster');
    }
    
    /**
     * Cancel the editing or creation of a player.
     */
    public function cancel(){
        //destroy the player session
        $this->session->unset_userdata("player_data");
        
        redirect('/TeamRoster');
    }
    
    /**
     * Request validation of the inputs
     */
    private function validate(){
        //get the all POST form field, (and clean them with xss_clean)
        $session_player = $this->session->userdata('player_data');
        
        //if somehow we saved without our buffered session guy, just assume false
        /*
        if($session_player == null) {
            return FALSE;
        }
         */
        
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|max_length[50]|regex_match[/[a-zA-Z\'.-]{1,50}/]');
        $this->form_validation->set_rules('surname', 'Last Name', 'trim|required|max_length[50]|regex_match[/[a-zA-Z\'.-]{1,50}/]');
        $this->form_validation->set_rules('jersey', 'Jersey', 'trim|required|integer|is_natural|callback_unique_jersey');
        $this->form_validation->set_rules('age', 'Age', 'trim|required|integer|is_natural');
        $this->form_validation->set_rules('weight', 'Weight', 'trim|required|integer|is_natural');
        $this->form_validation->set_rules('college', 'College', 'trim|required|max_length[50]|regex_match[/[a-zA-Z\'. -]{1,50}/]');
        $this->form_validation->set_rules('position', 'Position', 'trim|required|in_list[QB,RB,FB,WR,TE,OL,C,G,LG,RG,T,LT,RT,K,KR,DL,DE,DT,NT,LB,ILB,OLB,MLB,DB,CB,FS,SS,S,P,PR]');
        
        //form validation rules located in application/config/form_validation.php
        if ($this->form_validation->run() == FALSE)
        {
            $player = $this->get_values_from_form();
            $this->session->set_userdata('player_data',$player);
            $this->setup_form_data();
            return FALSE;
        }
        else
        {
            $player = $this->get_values_from_form();
            $this->session->set_userdata('player_data',$player);
            $this->setup_form_data();
            return TRUE;
        }
    }
    
    /** 
     * If the 'edit_mode' session variable is not set or 'off', this function 
     * will direct the player to the roster page.
     * 
     * This function is used to make sure that add/save/delete can only be used 
     * when the 'edit mode' session variable is set and is 'ON'.
     */
    private function is_edit_mode_on(){
        
        $edit_mode = get_cookie('edit_mode');
        
        //if the edit mode is not set, then we assume it is off.
        if ($edit_mode == null) {
            $edit_mode = 'off';
            $cookie = array(
                'name' => 'edit_mode',
                'value' => "$edit_mode",
                'path' => '/',
            );
            set_cookie($cookie);
        }
        
        //if the edit mode is off, they shouldn't be here
        //send them to the team roster page.
        if( $edit_mode == 'off' ){
            redirect('/TeamRoster');
        }
        
        return true;
    }
    
    /**
     * Determines if the id given is a valid id, if it is valid we return the
     * player (since we looked it up, we don't want to look it up again after
     * calling this function).
     * 
     * Otherwise it will return null, and direct the player to the team roster
     * page.
     * 
     */
    private function is_valid_id($id){
        //is the record a numeric value?
        if(!is_numeric($id)){
            //don't bother letting the user know anything, just assume he's
            //made a mistake, send him to the roster page.
            redirect('/TeamRoster');
        }
        
        //does the record exist? let's look for it.
        $player = $this->Roster->getArray($id,'id');
        
        if($player == null) {
            //let the user know the player doesn't exist
            redirect('/TeamRoster');
        }
        
        return $player[0];
    }
    
    /**
     * Attempts to upload a file to the img/mugs folder of the project
     * 
     * The file will be renamed to the players name
     * (eg 'FootBall_guy_01.png' to 'John_Doe.png' for player John Doe)
     * 
     * @param type $player the player object which will base the filename on.
     * @return bool true if the upload is successful, false otherwise and data
     * value of 'upload_errors' will be set
     */
    private function upload_mug(){
        //upload configuration stuff
        $player = $this->session->userdata('player_data');
        
        //upload the file to img folder
        $config['upload_path'] = realpath(APPPATH . '../img/mugs');
        //rewrite the filename to be the playername
        $config['file_name'] = $player['firstname'] . '_' . $player['surname'];
        //only allow these file types
        $config['allowed_types'] = 'gif|jpg|png';
        //e.g .PNG to .png (personal pref)
        $config['file_ext_tolower'] = true;
        //max of 150kB file size
        $config['max_size'] = '1500';
        //max file width is 1024 pixels
        $config['max_width'] = '1024';
        //max file height is 768 pixels
        $config['max_height'] = '768';
        
        $this->load->library('upload', $config);
        
        //try to upload!
        if ( ! $this->upload->do_upload('userfile') )
        {
            return null;
        }
        else
        {
            //upload was a success
            $file = $this->upload->data('photo');
            //lets check the file for badness
            if ($this->security->xss_clean($file, TRUE) === FALSE)
            {
                // file failed the XSS test
                // delete the file
                unlink(realpath(APPPATH . '../img/mugs' . $this->upload->data('file_name')));
                return null;
            }
            
            //set the player image to the filename
            return $this->upload->data('file_name');;
        }
    }
    
    /**
     * Form validation rule to ensure a jersey is not already in use. we need to
     * take special care to make sure that if we're checking a new user that the
     * jersey is not being used at all, but we also have to make sure that if
     * we're editing a player, that his existing jersey is a valid jersey number.
     * 
     * @param type $jersey_num
     * @return boolean
     */
    public function unique_jersey($jersey_num){
        
        $player = $this->session->userdata('player_data');
        
        //not checking if the session variable is null because we'll check that 
        //before we run our validation
        
        $in_use = TRUE;
        
        //new player?
        if( $player['id'] == null ){
            $in_use = $this->Roster->jersey_in_use($jersey_num);
        } else {
            $in_use = $this->Roster->jersey_in_use_by_other($jersey_num, $player['id']);
        }
        
        if($in_use) {
            $this->form_validation->set_message('unique_jersey', 'The Jersey is already in use by another player');
            return FALSE;   
        } else {
            return TRUE;
        }
    }
    
    private function setup_form_data(){
        $player = $this->session->userdata('player_data');
        
        $this->data['form_open'] = form_open_multipart('player/save');
        
        $position_options = array(
            'QB'    => 'Quarterback',
            'RB'    => 'Running Back',
            'FB'    => 'Fullback',
            'WR'    => 'Wide Receiver',
            'TE'    => 'Tight End',
            'OL'    => 'Offensive Lineman',
            'C'     => 'Center',
            'G'     => 'Guard',
            'LG'    => 'Left Guard',
            'RG'    => 'Right Guard',
            'T'     => 'Tackle',
            'LT'    => 'Left Tackle',
            'RT'    => 'Right Tackle',
            'K'     => 'Kicker',
            'KR'    => 'Kick Returner',
            'DL'    => 'Defensive Lineman',
            'DE'    => 'Defensive End',
            'DT'    => 'Defensive Takle',
            'NT'    => 'Nose Tackle',
            'LB'    => 'Linebacker',
            'ILB'   => 'Inside Linebacker',
            'OLB'   => 'Outside Linebacker',
            'MLB'   => 'Middle Linebacker',
            'DB'    => 'Defensive Back',
            'CB'    => 'Cornerback',
            'FS'    => 'Free Safety',
            'SS'    => 'Strong Safety',
            'S'     => 'Safety',
            'P'     => 'Punter',
            'PR'    => 'Punt Returner'
            );
        
        $attributes = array('class' => 'form-control');
        $upload_atb = array('class' => 'btn btn-file');
        
        $this->data['success_message'] = "";
        
        $this->data['f_firstname_err'] = form_error('firstname');
        $this->data['f_firstname'] = form_input('firstname', $player['firstname'],$attributes);
        $this->data['f_surname_err'] = form_error('surname');
        $this->data['f_surname']  = form_input('surname', $player['surname'],$attributes);
        $this->data['f_jersey_err'] = form_error('jersey');
        $this->data['f_jersey']  = form_input('jersey', $player['jersey'],$attributes);
        $this->data['f_position_err'] = form_error('position');
        $this->data['f_position']  = form_dropdown('position', $position_options, $player['position'],$attributes);
        $this->data['f_age_err'] = form_error('age');
        $this->data['f_age']  = form_input('age', $player['age'], $attributes);
        $this->data['f_weight_err'] = form_error('weight');
        $this->data['f_weight']  = form_input('weight', $player['weight'],$attributes);
        $this->data['f_college_err'] = form_error('college');
        $this->data['f_college']  = form_input('college', $player['college'],$attributes);
        
        $this->data['mug'] = $player['mug'];
        $this->data['f_mugFile']  = form_upload('New Image', 'upload_file', $player['firstname'],$upload_atb);
        
        if($player['id'] != null) {
            $this->data['delete_button'] = $this->parser->parse('_deleteButton', array('player_id'=>$player['id']), true);
        } else {
            $this->data['delete_button'] = ' ';
        }
        
        $this->data = array_merge($this->data, $player);
        
    }
    
    private function get_values_from_form(){
        $player = $this->session->userdata('player_data');
        
        $player['firstname'] = $this->input->post('firstname', true);
        $player['surname'] = $this->input->post('surname', true);
        $player['jersey'] = $this->input->post('jersey', true);
        $player['age'] = $this->input->post('age', true);
        $player['weight'] = $this->input->post('weight', true);
        $player['college'] = $this->input->post('college', true);
        $player['position'] = $this->input->post('position', true);
        
        return $player;
    }
    
}
