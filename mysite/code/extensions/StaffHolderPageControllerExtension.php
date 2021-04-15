<?php

use SilverStripe\ORM\ArrayList;
use SilverStripe\Core\Extension;
class StaffHolderPageControllerExtension extends Extension {

	private static $allowed_actions = array(
		'alumni',
	);

	public static $url_handlers = array(
		'alumni//' => 'alumni',

	);

	public function alumni() {

		$alumniTeam = StaffTeam::get()->filter(array('Name' => 'Alumni'))->First();
		$staffPages = $alumniTeam->StaffPages();
		$additionalTeams = new ArrayList();

		foreach ($staffPages as $staffPage) {
			$additionalTeams->merge($staffPage->Teams()->filter(array('Name:not' => 'Alumni')));
		}

		$additionalTeams->removeDuplicates();

		$Data = array(
			"Teams" => $additionalTeams,

		);

		return $this->owner->customise($Data)->renderWith(array('StaffHolderPage_alumni', 'Page'));
	}

}