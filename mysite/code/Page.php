<?php
class Page extends SiteTree {

	private static $db = array(
		
	);

	private static $has_one = array(
	);


	private static $many_many = array (
	);

    private static $many_many_extraFields=array(
      );

    private static $plural_name = "Pages";

	private static $defaults = array ();


	public function getCMSFields(){
		$f = parent::getCMSFields();
		
		return $f;
	}

	public function ValidateUrl($url){
		if(empty($url)){
			return $url;
		}
		else if (!preg_match("~^(?:f|ht)tps?://~i", $url)){
			$url = "http://" . $url;
		}
	
		return $url;
	}

	
}
class Page_Controller extends ContentController {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates
		// instead of putting Requirements calls here.  However these are
		// included so that our older themes still work
	}

	public function ClientTags(){
		return Client::get();
	}

	public function MediumTags(){
		return Medium::get();
	}

	public function ActiveStaffPages(){
		$staffPages = StaffPage::get();

		$alumniTeam = StaffTeam::get()->filter(array('Name' => 'Alumni'))->First();
		$alumniPages = $alumniTeam->StaffPages();

		$limitedStaffPages = $staffPages->subtract($alumniPages);

		return $limitedStaffPages->sort('LastName ASC');
	}
		
}