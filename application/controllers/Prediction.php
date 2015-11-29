<?php
/**
 * Description of Prediction
 *
 * The Prediction controller
 * 
 * @author Devan Yim
 */
class Prediction extends Application {
    

    function __construct() {
        parent::__construct();
    }
    
    function predict($team) {
        //our team!
        $home = "DAL";
                
        //encode the input since we're going to do a query on it
        $encodedTeam = htmlentities($team);
       
        //do validation on the league name (does it exist in the database)
        $valid = $this->League->validateCode($encodedTeam);
        
        if ( !$valid ){
            //send response back
            $this->output
                ->set_status_header(400)  //Status Code: BAD REQUEST
                ->set_content_type('text/html')
                ->set_output("");
        } else {
            
            //get game records, returns true or false.
            $prediction = $this->History->predict_game($encodedTeam);

            //get the name of the other team
            $this->data["their_team"] = $this->League->getTeamName($encodedTeam);
            $this->data["their_code"] = strtolower($encodedTeam);
            
            $this->data["score"] = strval($prediction[0][0] . ":" . $prediction[1][0]);
            
            $this->data["our_game_average"] = $prediction[0][1];
            $this->data["their_game_average"] = $prediction[1][1];
            
            $this->data["our_10_game_average"] = $prediction[0][2];
            $this->data["their_10_game_average"] = $prediction[1][2];
            
            $this->data["our_game_average_against"] = $prediction[0][3];
            $this->data["their_game_average_against"] = $prediction[1][3];
                    
            
            //get the html we're going to return
            if ($prediction[0][0] > $prediction[1][0]) {
                $this->data["alert-style"] = "alert-success";
                $this->data["win_lose"] = "Win";
                $this->data["message"] = "Go Cowboys!";
            } elseif ( $prediction[0][0] < $prediction[1][0] ) {
                $this->data["alert-style"] = "alert-danger";
                $this->data["win_lose"] = "Lose";
                $this->data["message"] = "Oh no!";
            } else {
                $this->data["alert-style"] = "alert-info";
                $this->data["win_lose"] = "Tie";
                $this->data["message"] = "Almost had 'em Cowboys!";
            }
            $winnerHTML = $this->parser->parse('_prediction', $this->data, true);

            //sent the OK response with the HTML payload
            $this->output
                ->set_status_header(200)  //Status Code: OK
                ->set_content_type('text/html')
                ->set_output($winnerHTML);
        }
    }
}
