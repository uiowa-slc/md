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

		$memberID = Member::CurrentUserID();
		$test = Member::get()->filter(array('ID' => $memberID))->First();
		if ($test) {
			$email = $this->owner->EmailAddress;
			// print_r(Member::CurrentUserID());
			$memberTest = Member::get()->filter(array('Email' => $email))->First();

			if($memberTest){

				$Staff = StaffPage::get()->filter(array('MemberID' => $memberID))->first();
				return $this->owner->redirect('team/'.$Staff->URLSegment.'/edit');

			}
		} else {
			// TODO: send User back to edit profile page after they've logged in.
			// $this->owner->redirect('Security/Login?BackURL=edit-profile/');

			Security::PermissionFailure($this->controller, 'You must be an M+D staff member to edit this profile page.');
		}
	}

	
}