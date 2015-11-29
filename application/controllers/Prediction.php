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
            $win = $this->History->predictWin($encodedTeam);

            //get the name of the other team
            $this->data["other_team"] = $this->League->getTeamName($encodedTeam);

            //get the html we're going to return
            if ($win) {
                $winnerHTML = $this->parser->parse('_predictWin', $this->data, true);
            } else {
                $winnerHTML = $this->parser->parse('_predictLoss', $this->data, true);
            }

            //sent the OK response with the HTML payload
            $this->output
                ->set_status_header(200)  //Status Code: OK
                ->set_content_type('text/html')
                ->set_output($winnerHTML);
        }
    }
}
