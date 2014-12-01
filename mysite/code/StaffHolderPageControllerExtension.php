<?php
class StaffHolderPageControllerExtension extends Extension {

 private static $allowed_actions = array(
 		'alumni',
	);

public static $url_handlers = array(
        'alumni//' => 'alumni',
       
    );

 public function alumni(){

 	$alumniTeam = StaffTeam::get()->filter(array('Name' => 'Alumni'))->First();
 	$staffPages = $alumniTeam->StaffPages();

 	$Data = array (
 		"StaffPages" => $staffPages

 	);

		return $this->owner->customise($Data)->renderWith(array('StaffHolderPage_alumni', 'Page'));
    }   

}