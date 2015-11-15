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
        if( !$this->is_edit_mode_on() ){
            return;
        }
        
        //get initialized an empty player array
        $new_player = $this->roster->create();
        // create() set's id to '', so I need to set it to null so the insert
        // call will auto-increment the value;
        $new_player['id'] = null;
        
        $this->data = array_merge($this->data, $new_player);
        $this->data['form_open'] = form_open_multipart('player/save');
        $this->data['pagebody'] = 'PlayerEdit';
        
        
        $this->session->set_userData('player_data',$new_player);
        $this->render();
    }
    
    /**
     * When the user wants to view a player (and possibly edit it)
     */
    public function view($id){
        
        //this functions will make the appropriate render call for us on 
        //error, so we just need to return if we get an false/null response back
        $player = $this->is_valid_id($id);
        if($player == null){
            return;
        }
        
        //get the data from the model, set the session variable 
        $this->data = array_merge($this->data, $player);
        
        $this->session->set_userData('player_data', $player);
        
        //check if the user is in edit mode
        $edit_mode = get_cookie('edit_mode', TRUE);
        //if the session variable was not set, we'll set it to off.
        if ($edit_mode == null) {
            $edit_mode = 'off';
            set_cookie('edit_mode', $edit_mode);
        }
        
        if( $edit_mode == 'on' ){
            $this->data['form_open'] = form_open_multipart('player/save');
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
            return;
        }
        
        //validate the data
        $valid = $this->validate();
        
        if(!$valid) {
            form_open_multipart('player/save');
            $this->data['player'] = $this->session->userdata('player');
            $this->data['form_open'] = form_open_multipart('player/save');
            $this->data['pagebody'] = 'PlayerEdit';
            $this->render();
            return;
        }
        
        //upload the image
        $file_name = $this->upload($player['id']);
        
        if($filename == null){            
            $this->data['player'] = $this->session->userdata('player');
            $this->data['form_open'] = form_open_multipart('player/save');
            $this->data['pagebody'] = 'PlayerEdit';
            $this->render();
            return;
        }
        
        $player['mug'] = $file_name;
        
        //save the value, a null id means it's a new player and should be inserted
        if ($player['id'] == null){
            $record_id = $this->model->insert($player);
            $player['id'] = $record_id;
        } else {
            $this->model->update($player);
        }
        
        $this->session->set_userdata('player_data', $player);
        $this->data['success_message'] = $player[firstname] . ' ' .$player[surname] . 'has been saved!';
        $this->data['form_open'] = form_open_multipart('player/save');
        $this->data['pagebody'] = 'PlayerEdit';
        
        $this->render();
    }
    
    /** 
     * When the user wants to delete a player from the DB
     * @param type $id
     */
    public function delete($id){
        
        //these two functions will make the appropriate render call for us on 
        //error, so we just need to return if we get an false/null response back
        if( !$this->is_edit_mode_on() ){
            return;
        }
        $player = $this->is_valid_id($id);
        if($player == null){
            return;
        }
        
        //everything checks out, lets delete it
        $this->roster->delete($id);
        
        //let the player know everything went ok!
        $this->data['successMessage'] = $player['firstname'].' ' .
                                        $player['surname']. 'has been deleted';   
        
        //remove any player-data records from session
        $this->session->unset_data('player-data');
        
        //off to the roster page!
        $this->data['pagebody'] = 'TeamRoster';
        $this->data['players'] = $this->Roster->all();
         
        $this->render();
    }
    
    /**
     * Cancel the editing or creation of a player.
     */
    public function cancel(){
        //destroy the player session
        $this->session->unset_userdata("player_data");
        
        //display the roster page
        $this->data['pagebody'] = 'TeamRoster';
        $this->data['players'] = $this->Roster->all();
        $this->render();
    }
    
    /**
     * Request validation of the inputs
     */
    private function validate(){
        //get the all POST form field, (and clean them with xss_clean)
        $session_player = $this->session->user_data('player_data');
        
        //if somehow we saved without our buffered session guy, just assume false
        if($session_player == null) {
            return FALSE;
        }
        
        //form validation rules located in application/config/form_validation.php
        if ($this->form_validation->run() == FALSE)
        {
            $this->data['form_errors'] = validation_errors();
            $player = $this->input->post(null, TRUE);
            $this->session->set_userdata('player_data',$player);
            return FALSE;
        }
        else
        {
            $player = $this->input->post(null, TRUE);
            $this->session->set_userdata('player_data',$player);
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
            set_cookie('edit_mode',$edit_mode);
        }
        
        //if the edit mode is off, they shouldn't be here
        //send them to the team roster page.
        if( $edit_mode == 'off' ){
            $this->data['pagebody'] = 'TeamRoster';
            $this->data['players'] = $this->Roster->all(); 
            $this->render();
            return false;
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
            $this->data['pagebody'] = 'TeamRoster';
            $this->data['players'] = $this->Roster->all(); 
            $this->render();
            return null;
        }
        
        //does the record exist? let's look for it.
        $player = $this->Roster->getArray($id,'id');
        
        if($player == null) {
            //let the user know the player doesn't exist
            $this->data['pagebody'] = 'TeamRoster';
            $this->data['players'] = $this->Roster->all(); 
            $this->render();
            return null;
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
    private function upload($player){
        
        //upload configuration stuff
        
        //upload the file to img folder
        $config['upload_path'] = realpath(APPPATH . '../img/mugs');
        //rewrite the filename to be the playername
        $config['file_name'] = $player['firstname'] . '_' . $player['surname'];
        //only allow these file types
        $config['allowed_types'] = 'gif|jpg|png';
        //e.g .PNG to .png (personal pref)
        $config['file_ext_tolower'] = true;
        //max of 150kB file size
        $config['max_size'] = '150';
        //max file width is 1024 pixels
        $config['max_width'] = '1024';
        //max file height is 768 pixels
        $config['max_height'] = '768';
        
        $this->load->library('upload', $config);
        
        //try to upload!
        if ( ! $this->upload->do_upload('mugshot') )
        {
            //upload was not successful
            $this->data['upload_errors'] = array($this->upload->display_errors());
            return null;
        }
        else
        {
            //upload was a success
            $file = file_get_contents(realpath(APPPATH . '../img/mugs' . $this->upload->data('file_name')));
            //lets check the file for badness
            if ($this->security->xss_clean($file, TRUE) === FALSE)
            {
                // file failed the XSS test
                // delete the file
                unlink(realpath(APPPATH . '../img/mugs' . $this->upload->data('file_name')));
                
                //generate error
                $this->data['upload_errors'] = array('invalid file');
                
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
    private function unique_jersey($jersey_num){
        
        $player = $this->session->userdata('player-data');
        
        //not checking if the session variable is null because we'll check that 
        //before we run our validation
        
        $in_use = TRUE;
        
        //new player?
        if( $player['id'] == null ){
            $in_use = $this->roster->jersey_in_use($jersey_num);
        } else {
            $in_use = $this->roster->jersey_in_use_by_other($jersey_num, $player['id']);
        }
        
        if($in_use) {
            $this->form_validation->set_message('unique_jersey', 'The Jersey is already in use by another player');
            return FALSE;   
        } else {
            return TRUE;
        }
    }
}
