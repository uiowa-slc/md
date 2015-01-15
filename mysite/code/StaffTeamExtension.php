<?php
class StaffTeamExtension extends DataExtension {

	public function ActiveStaffPages(){
		$staffPages = $this->owner->StaffPages();
		$alumniTeam = StaffTeam::get()->filter(array('Name' => 'Alumni'))->First();
 		$alumniStaffPages = $alumniTeam->StaffPages();

 		$activeStaffPages = $staffPages->subtract($alumniStaffPages);

 		return $activeStaffPages;

	}
 
}