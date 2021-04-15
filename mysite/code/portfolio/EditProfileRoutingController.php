<?php
use SilverStripe\Core\Extension;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;

class EditProfileRoutingController extends PageController {
	private static $allowed_actions = array(
		'index'
	);

	public function init(){
		parent::init();
	}

	public function index() {

		$member = Security::getCurrentUser();


		if(!$member){
			return Security::PermissionFailure($this->controller, 'You must be an M+D staff member to edit this profile page.');
		}

		$memberID = $member->ID;


		$staffPage = StaffPage::get()->filter(array('EmailAddress' => $member->Email))->First();

		if($staffPage){
			$this->owner->redirect($staffPage->Link('/edit'));
		}else{
			
		}
		
		//return 
	}
}

