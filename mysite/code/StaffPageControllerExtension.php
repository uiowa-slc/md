<?php

use SilverStripe\Core\Extension;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Control\Email\Email;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Control\RequestHandler;
use Silverstripe\Forms\Form;
class StaffPageControllerExtension extends Extension {

	private static $allowed_actions = array(
		'editProfile', 
		'EditProfileForm'
	);

	private static $url_handlers = array(
		'edit//$action' => 'editProfile'
	);
	public function init(){
		parent::init();
	}

	public function editProfile() {
		$action = $this->owner->getRequest()->param('action');
		if (isset($action)) {
			$response = $this->owner->getResponse();
			return $response;
		}

		$memberID = Member::CurrentUserID();
		if ($memberID == $this->owner->Member()->ID) {
			$Data = array();
			//print_r(EmailAdmins::gatherStats());
			return $this->owner->customise($Data)->renderWith(array("StaffPage_Edit", "Page"));
		} else {
			// TODO: send User back to edit profile page after they've logged in.
			$this->owner->redirect(Security::login_url());
		}
	}

	/**
	 * Creates a form for Staff/Students/Alumni to edit the content of their Profile Page.
	 * @return Form object
	 */
	public function EditProfileForm() {
		$Member = Member::CurrentUser();

		if ($Member) {
			$MemberID = $Member->ID;
			$HTMLEditorButtons = array(
				'btnGrp-design',
				'btnGrp-lists',
			);

			//Students
			if ($this->owner->isStudent()) {
				$fields = new FieldList(
					new TextField('FirstName', '*First Name'),
					new TextField('Surname', '*Last Name'),
					new TextareaField('Interests', 'Interests'),
					new TextareaField('FavoriteProject', 'Favorite Project'),
					new TextField('LinkedInURL', 'LinkedIn'),
					new TextField('PortfolioURL', 'Portfolio'),
					new TextField('TwitterHandle', 'Twitter'),
					new TextField('GithubURL', 'Github'),
					new TextField("Major", "Major"),
					new HTMLEditorField("DegreeDescription", "Explain why you chose your degree."),
					new HTMLEditorField("MDExperience", "What have you learned from your experience at M+D?"),
					new TextareaField("TopStrengths", "Top five strengths"),
					new TextareaField("FavoriteQuote", "Favorite quote"),
					new HTMLEditorField("PostGraduation", "What do you hope to do after graduation?")
				);
			}

			//Alumni
			if ($this->owner->inTeam('Alumni')) {
				$fields = new FieldList(
					new TextField('FirstName', '*First Name'),
					new TextField('Surname', '*Last Name'),
					new TextareaField('Interests', 'Interests'),
					new TextareaField('FavoriteProject', 'Favorite Project'),
					new TextField('LinkedInURL', 'LinkedIn'),
					new TextField('PortfolioURL', 'Portfolio'),
					new TextField('TwitterHandle', 'Twitter'),
					new TextField('GithubURL', 'Github'),
					new TextField("YearGraduated", "Year Graduated"),
					new TextField("EmploymentLocation", "Where are you employed?"),
					new TextField("CurrentPosition", "What is your current position title?"),
					new TextField("EmploymentLocationURL", "Your employer's website"),
					new HTMLEditorField("FavoriteMemory", "What is your favorite memory of M+D?"),
					new HTMLEditorField("Advice", "What advice would you give to current students?")
				);
			}

			//Pro Staff
			if ($this->owner->inTeam('Professional Staff')) {
				$fields = new FieldList(
					new TextField('FirstName', '*First Name'),
					new TextField('Surname', '*Last Name'),
					new TextareaField('Interests', 'Interests'),
					new TextareaField('FavoriteProject', 'Favorite Project'),
					new TextField('LinkedInURL', 'LinkedIn'),
					new TextField('PortfolioURL', 'Portfolio'),
					new TextField('TwitterHandle', 'Twitter'),
					new TextField('GithubURL', 'Github'),
					new TextField("Phone", "Phone(xxx-xxx-xxxx)"),
					new HTMLEditorField("EnjoymentFactors", "What do you enjoy about working at M+D?"),
					new TextField("JoinDate", "When did you join the M+D staff?"),
					new HTMLEditorField("Background", "Background & Education")
				);
			}


			$saveAction = new FormAction('SaveProfile', 'Save');
			$saveAction->addExtraClass('radius');

			$actions = new FieldList($saveAction);
			$validator = new RequiredFields('FirstName', 'Surname', 'Email');

			$Form = new Form($this->owner, 'EditProfileForm', $fields, $actions, $validator);

			//Information must be loaded from both tutor and member because member stores a member/tutor's password
			$Form->loadDataFrom($Member->data());
			$Form->loadDataFrom($this->owner->data());

			//Return the form
			return $Form;
		} else {
			$message = "<a href='Security/login'>You must be logged in to edit your profile. </a>";
			return $message;
		}
	}

	/**
	 * Saves Edit Staff Page Form into StaffPage and Member.
	 * @param $data, $form
	 * @return RedirectBack
	 */
	public function SaveProfile($data, $form) {

		$Member = Member::CurrentUser();
		$MemberID = $Member->ID;

		$Staff = StaffPage::get()->filter(array('MemberID' => $MemberID))->first();

		// Save into the member dataobject.
		$memberFieldList = array(
			"FirstName",
			"Surname"
		);
		$formData = $form->getData();

		$form->saveInto($Staff);

		/*Preserve this code, for it works the magic of SilverStripe 3 publishing: */
		$Staff->writeToStage('Stage');
		$Staff->publish("Stage", "Live");
		Versioned::set_stage('Live');
		$Staff->write();

		return $this->owner->redirect($this->owner->Link('?saved=1'));
	}


}