<?php

/**
 * The team model loads all the players on the Dallas Cowboys team
 *
 * @author Devan & Derek
 */
class Roster extends CI_Model {

    public $TeamRosterData;
    
    public function __construct(){
        parent::__construct();
    }
    
    //Generates the Mock Team data for the site
    private function mockUp(){
    //Mock Data - this should be removed when we set up proper models - Derek Gleeson       
         $this->TeamRosterData = array(
            array('number' => '5', 'name' => 'Bailey, Dan', 'position' => 'K', 'weight' => '195', 'age' => '27', 'college' => 'Oklahoma State', 'mug' => base_url("img/mugs/profile_09.png")),
            array('number' => '11', 'name' => 'Beasley, Cole', 'position' => 'WR', 'weight' => '180', 'age' => '26', 'college' => 'Southern Methodist', 'mug' => base_url("img/mugs/profile_02.png")),
            array('number' => '73', 'name' => 'Bernadeau, Mackenzy', 'position' => 'G', 'weight' => '322', 'age' => '29', 'college' => 'Bentley', 'mug' => base_url("img/mugs/profile_08.png")),
            array('number' => '93', 'name' => 'Bishop, Ken', 'position' => 'NT', 'weight' => '305', 'age' => '25', 'college' => 'Northern Illinois', 'mug' => base_url("img/mugs/profile_08.png")),
            array('number' => '78', 'name' => 'Brown, Charles', 'position' => 'OL', 'weight' => '297', 'age' => '28', 'college' => 'USC', 'mug' => base_url("img/mugs/profile_03.png")),
            array('number' => '88', 'name' => 'Bryant, Dez', 'position' => 'WR', 'weight' => '220', 'age' => '26', 'college' => 'Oklahoma State', 'mug' => base_url("img/mugs/profile_01.png")),
            array('number' => '19', 'name' => 'Butler, Brice', 'position' => 'WR', 'weight' => '215', 'age' => '25', 'college' => 'San Diego State', 'mug' => base_url("img/mugs/profile_11.png")),
            array('number' => '39', 'name' => 'Carr, Brandon', 'position' => 'CB', 'weight' => '210', 'age' => '29', 'college' => 'Grand Valley State', 'mug' => base_url("img/mugs/profile_06.png")),
            array('number' => '16', 'name' => 'Cassel, Matt', 'position' => 'QB', 'weight' => '228', 'age' => '33', 'college' => 'USC', 'mug' => base_url("img/mugs/profile_05.png")),
            array('number' => '42', 'name' => 'Church, Barry', 'position' => 'S', 'weight' => '218', 'age' => '27', 'college' => 'Toledo', 'mug' => base_url("img/mugs/profile_06.png")),
            array('number' => '24', 'name' => 'Claiborne, Morris', 'position' => 'CB', 'weight' => '192', 'age' => '25', 'college' => 'LSU', 'mug' => base_url("img/mugs/profile_07.png")),
            array('number' => '44', 'name' => 'Clutts, Tyler', 'position' => 'FB', 'weight' => '250', 'age' => '30', 'college' => 'Fresno State', 'mug' => base_url("img/mugs/profile_10.png")),
            array('number' => '71', 'name' => 'Collins, La\'el', 'position' => 'OL', 'weight' => '321', 'age' => '22', 'college' => 'Louisiana State University - Shreveport', 'mug' => base_url("img/mugs/profile_08.png")),
            array('number' => '58', 'name' => 'Crawford, Jack', 'position' => 'DE', 'weight' => '288', 'age' => '27', 'college' => 'Penn State', 'mug' => base_url("img/mugs/profile_01.png")),
            array('number' => '98', 'name' => 'Crawford, Tyrone', 'position' => 'DT', 'weight' => '285', 'age' => '25', 'college' => 'Boise State', 'mug' => base_url("img/mugs/profile_07.png")),
            array('number' => '25', 'name' => 'Dunbar, Lance', 'position' => 'RB', 'weight' => '195', 'age' => '25', 'college' => 'North Texas', 'mug' => base_url("img/mugs/profile_07.png")),
            array('number' => '89', 'name' => 'Escobar, Gavin', 'position' => 'TE', 'weight' => '260', 'age' => '24', 'college' => 'San Diego State', 'mug' => base_url("img/mugs/profile_02.png")),
            array('number' => '72', 'name' => 'Frederick, Travis', 'position' => 'C', 'weight' => '315', 'age' => '24', 'college' => 'Wisconsin', 'mug' => base_url("img/mugs/profile_03.png")),
            array('number' => '68', 'name' => 'Free, Doug', 'position' => 'OT', 'weight' => '325', 'age' => '31', 'college' => 'Northern Illinois', 'mug' => base_url("img/mugs/profile_09.png")),
            array('number' => '52', 'name' => 'Gachkar, Andrew', 'position' => 'LB', 'weight' => '224', 'age' => '26', 'college' => 'Missouri', 'mug' => base_url("img/mugs/profile_04.png")),
            array('number' => '94', 'name' => 'Gregory, Randy', 'position' => 'DE', 'weight' => '245', 'age' => '22', 'college' => 'Nebraska', 'mug' => base_url("img/mugs/profile_08.png")),
            array('number' => '84', 'name' => 'Hanna, James', 'position' => 'TE', 'weight' => '260', 'age' => '26', 'college' => 'Oklahoma', 'mug' => base_url("img/mugs/profile_02.png")),
            array('number' => '96', 'name' => 'Hayden, Nick', 'position' => 'DT', 'weight' => '303', 'age' => '29', 'college' => 'Wisconsin', 'mug' => base_url("img/mugs/profile_12.png")),
            array('number' => '38', 'name' => 'Heath, Jeff', 'position' => 'S', 'weight' => '212', 'age' => '24', 'college' => 'Saginaw Valley State', 'mug' => base_url("img/mugs/profile_07.png")),
            array('number' => '59', 'name' => 'Hitchens, Anthony', 'position' => 'LB', 'weight' => '235', 'age' => '23', 'college' => 'Iowa', 'mug' => base_url("img/mugs/profile_05.png")),
            array('number' => '95', 'name' => 'Irving, David', 'position' => 'DL', 'weight' => '273', 'age' => '22', 'college' => 'Iowa State', 'mug' => base_url("img/mugs/profile_03.png")),
            array('number' => '31', 'name' => 'Jones, Byron', 'position' => 'CB', 'weight' => '199', 'age' => '23', 'college' => 'Connecticut', 'mug' => base_url("img/mugs/profile_05.png")),
            array('number' => '6', 'name' => 'Jones, Chris', 'position' => 'P', 'weight' => '205', 'age' => '26', 'college' => 'Carson-Newman', 'mug' => base_url("img/mugs/profile_12.png")),
            array('number' => '91', 'name' => 'LaDouceur, L.P.', 'position' => 'LS', 'weight' => '256', 'age' => '34', 'college' => 'California', 'mug' => base_url("img/mugs/profile_08.png")),
            array('number' => '90', 'name' => 'Lawrence, DeMarcus', 'position' => 'DE', 'weight' => '251', 'age' => '23', 'college' => 'Boise State', 'mug' => base_url("img/mugs/profile_06.png")),
            array('number' => '65', 'name' => 'Leary, Ronald', 'position' => 'G', 'weight' => '320', 'age' => '26', 'college' => 'Memphis', 'mug' => base_url("img/mugs/profile_03.png")),
            array('number' => '50', 'name' => 'Lee, Sean', 'position' => 'LB', 'weight' => '238', 'age' => '29', 'college' => 'Penn State', 'mug' => base_url("img/mugs/profile_05.png")),
            array('number' => '70', 'name' => 'Martin, Zack', 'position' => 'G', 'weight' => '310', 'age' => '24', 'college' => 'Notre Dame', 'mug' => base_url("img/mugs/profile_08.png")),
            array('number' => '40', 'name' => 'McCray, Danny', 'position' => 'S', 'weight' => '221', 'age' => '27', 'college' => 'LSU', 'mug' => base_url("img/mugs/profile_04.png")),
            array('number' => '20', 'name' => 'McFadden, Darren', 'position' => 'RB', 'weight' => '210', 'age' => '28', 'college' => 'Arkansas', 'mug' => base_url("img/mugs/profile_12.png")),
            array('number' => '30', 'name' => 'Michael, Christine', 'position' => 'RB', 'weight' => '221', 'age' => '24', 'college' => 'Texas A&M', 'mug' => base_url("img/mugs/profile_03.png")),
            array('number' => '92', 'name' => 'Mincey, Jeremy', 'position' => 'DE', 'weight' => '280', 'age' => '31', 'college' => 'Florida', 'mug' => base_url("img/mugs/profile_06.png")),
            array('number' => '17', 'name' => 'Moore, Kellen', 'position' => 'QB', 'weight' => '200', 'age' => '26', 'college' => 'Boise State', 'mug' => base_url("img/mugs/profile_03.png")),
            array('number' => '26', 'name' => 'Patmon, Tyler', 'position' => 'CB', 'weight' => '185', 'age' => '24', 'college' => 'Oklahoma State', 'mug' => base_url("img/mugs/profile_04.png")),
            array('number' => '21', 'name' => 'Randle, Joseph', 'position' => 'RB', 'weight' => '210', 'age' => '23', 'college' => 'Oklahoma State', 'mug' => base_url("img/mugs/profile_02.png")),
            array('number' => '99', 'name' => 'Russell, Ryan', 'position' => 'DE', 'weight' => '267', 'age' => '23', 'college' => 'Purdue', 'mug' => base_url("img/mugs/profile_09.png")),
            array('number' => '56', 'name' => 'Smith, Keith', 'position' => 'LB', 'weight' => '232', 'age' => '23', 'college' => 'San Jose State', 'mug' => base_url("img/mugs/profile_08.png")),
            array('number' => '77', 'name' => 'Smith, Tyron', 'position' => 'OT', 'weight' => '320', 'age' => '24', 'college' => 'USC', 'mug' => base_url("img/mugs/profile_06.png")),
            array('number' => '15', 'name' => 'Street, Devin', 'position' => 'WR', 'weight' => '200', 'age' => '24', 'college' => 'Pittsburgh', 'mug' => base_url("img/mugs/profile_02.png")),
            array('number' => '87', 'name' => 'Swaim, Geoff', 'position' => 'TE', 'weight' => '250', 'age' => '22', 'college' => 'Texas', 'mug' => base_url("img/mugs/profile_06.png")),
            array('number' => '3', 'name' => 'Weeden, Brandon', 'position' => 'QB', 'weight' => '228', 'age' => '31', 'college' => 'Oklahoma State', 'mug' => base_url("img/mugs/profile_09.png")),
            array('number' => '23', 'name' => 'White, Corey', 'position' => 'CB', 'weight' => '206', 'age' => '25', 'college' => 'Samford', 'mug' => base_url("img/mugs/profile_03.png")),
            array('number' => '13', 'name' => 'Whitehead, Lucky', 'position' => 'WR', 'weight' => '163', 'age' => '23', 'college' => 'Florida Atlantic', 'mug' => base_url("img/mugs/profile_08.png")),
            array('number' => '51', 'name' => 'Wilber, Kyle', 'position' => 'LB', 'weight' => '245', 'age' => '26', 'college' => 'Wake Forest', 'mug' => base_url("img/mugs/profile_08.png")),
            array('number' => '27', 'name' => 'Wilcox, J.J.', 'position' => 'S', 'weight' => '212', 'age' => '24', 'college' => 'Georgia Southern', 'mug' => base_url("img/mugs/profile_09.png")),
            array('number' => '83', 'name' => 'Williams, Terrance', 'position' => 'WR', 'weight' => '208', 'age' => '26', 'college' => 'Baylor', 'mug' => base_url("img/mugs/profile_04.png")),
            array('number' => '57', 'name' => 'Wilson, Damien', 'position' => 'LB', 'weight' => '243', 'age' => '22', 'college' => 'Minnesota', 'mug' => base_url("img/mugs/profile_06.png")),
            array('number' => '82', 'name' => 'Witten, Jason', 'position' => 'TE', 'weight' => '263', 'age' => '33', 'college' => 'Tennessee', 'mug' => base_url("img/mugs/profile_11.png"))
        );
    }


    /** Retrieve all the teams in the league* */
    public function all() {
        //get mock data
        $this->mockUp();
        //send data to caller
        return $this->TeamRosterData;
    }

}
