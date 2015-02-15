<?php
class StaffTeamExtension extends DataExtension {

	public function ActiveStaffPages(){
		
		$staffPages = $this->owner->StaffPages()->filter(array('ShowInMenus' => 1));
		$alumniTeam = StaffTeam::get()->filter(array('Name' => 'Alumni'))->First();
 		$alumniStaffPages = $alumniTeam->StaffPages();

 		$activeStaffPages = $staffPages->subtract($alumniStaffPages);

 		return $activeStaffPages;

	}
 
}