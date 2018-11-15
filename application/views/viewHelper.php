<?php

class viewHelper extends View {

    public function __construct() {

    }

    public function printFellowName($data) {

    	$name = '';
    	if(isset($data['profile']['name']['salutation'])) $name .= $data['profile']['name']['salutation'] . ' ';
    	if(isset($data['profile']['name']['first'])) $name .= $data['profile']['name']['first'] . ' ';
    	if(isset($data['profile']['name']['last'])) $name .= $data['profile']['name']['last'];

    	return $name;
    }

    public function printFellowAffiliation($data) {

    	$affl = [];

	   	if(isset($data['profile']['degree'])) array_push($affl, $data['profile']['degree']);
    	if(isset($data['profile']['honours'])) array_push($affl, $data['profile']['honours']);

    	return implode(', ', $affl);
    }

    public function printFellowshipType($data) {

        $fellowship = 'Elected into the ';
        if(preg_match('/honorary/', $data['fellowship']['type'])) $fellowship .= 'Honorary ';
        $fellowship .= 'fellowship in ' . $data['fellowship']['yearelected'];
    
        if(isset($data['fellowship']['section']))
            if($data['fellowship']['section'] != '') $fellowship .= ' under the <strong>' . $data['fellowship']['section'] . '</strong> section';

        return $fellowship;
    }

    public function printContact($data) {

        $contact = '<p>';

        $addressType = (isset($data['profile']['deathDate'])) ? '<strong>Last known address:</strong>' : '<strong>Address:</strong>';
        if(isset($data['contact']['address'])) $contact .= $addressType . '<br />' . $data['contact']['address'] . '<br />';
        if(isset($data['contact']['city'])) $contact .= $data['contact']['city'] . ', ';
        if(isset($data['contact']['state'])) $contact .= $data['contact']['state'];

        $contact .= '</p><p>';

        if(isset($data['contact']['telephone']['office'])) $contact .= '<strong>Office:</strong> ' . $data['contact']['telephone']['office'] . '<br />';
        if(isset($data['contact']['telephone']['residence'])) $contact .= '<strong>Residence:</strong> ' . $data['contact']['telephone']['residence'] . '<br />';
        if(isset($data['contact']['telephone']['official'])) $contact .= '<strong>Email:</strong> ' . $data['contact']['telephone']['official'];
        
        $contact .= '</p>';

       	return $contact;
    }

    public function isLoggedIn() {

        $isLoggedIn = false;
        
        if(isset($_SESSION['auth_logged_in']))
            if($_SESSION['auth_logged_in'])
                $isLoggedIn = true;

        return $isLoggedIn;
    }

    public function printUserIcon() {

        if(!($this->isLoggedIn())) return '';

        $fName = $_SESSION['fellow_fname'];
        $lName = $_SESSION['fellow_lname'];
        $initials = '';
        
        if ($fName) $initials .= $fName[0];
        if ($lName) $initials .= $lName[0];

        $html = '
            <ul class="navbar-nav" id="user">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div id="user-icon" width="50" height="50">' . $initials . '</div>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="' . BASE_URL . 'profile/v/' . $_SESSION['auth_username'] . '">View Profile</a>
                        <a class="dropdown-item" href="#">Edit profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Access SpringerLink</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="' . BASE_URL . 'profile/logout">Logout</a>
                    </div>
                </li>
            </ul>';
        return $html;
    }
}

?>
