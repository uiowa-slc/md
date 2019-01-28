<?php
use SilverStripe\Security\Member;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Control\Email\Email;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Control\Session;
use SilverStripe\Core\Convert;
use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Security\Security;
use Silverstripe\Forms\Form;
class EditProfilePageController extends PageController {
	private static $allowed_actions = array(
		'EditProfileForm',
		'getSavedSession',
	);

	public function init(){
		$Member = Member::CurrentUser();
		if($Member){
			$IDMember = $Member->ID;
			$Staff = StaffPage::get()->filter(array('MemberID' => $IDMember))->first();

			if($Staff){
			 parent::init();
			 $this->redirect('team/'.$Staff->URLSegment.'/edit');
			}
			else{
				parent::init();
			}
		}
		else{
			parent::init();
			$this->redirect('');
		}
	}

	function EditProfileForm() {
		$Member = Member::CurrentUser();
		//chromephp::log('EditProfileForm start' . Session::get('saved'));

		if ($Member) {
			//User shouldn't be able to access EditProfileForm unless they're logged in.  If they're not logged in, provide links so that they can login (or register if need be).

			$IDMember = $Member->ID;

			$Staff = StaffPage::get()->filter(array('MemberID' => $IDMember))->first();

			//Students
			if ($owner->isStudent()) {
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
			if ($owner->inTeam('Alumni')) {
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
			if ($owner->inTeam('Professional Staff')) {
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
			// Create action
			$actions = new FieldList(
				$saveAction
			);

			// Create action
			$validator = new RequiredFields('FirstName', 'Surname', 'Email');

			//Create form
			$Form = new Form($this, 'EditProfileForm', $fields, $actions, $validator);

			//Get current member
			$Member = Member::CurrentUser();

			$Form->loadDataFrom($Member->data());
			$Form->loadDataFrom($Staff->data());

			//Return the form
			return $Form;
		}
		
	}

	//Save profile
	function SaveProfile($data, $form) {
		Session::clear('Saved');

		//Check for a logged in member
		if ($CurrentMember = Member::CurrentUser()) {


			$email = Convert::raw2sql($data['Email']);

			if ($member = DataObject::get_one("Member", "Email = '" . Convert::raw2sql($data['Email']) . "' AND ID != " . $CurrentMember->ID)) {

				Session::set('Saved', 0); //Display error message

				$form->addErrorMessage("Email", 'Sorry, an account with that Email address already exists', "bad");

				Session::set("FormInfo.Form_EditProfileForm.data", $data);

				return $this->redirect($this->Link());

			}
			//Otherwise check that user IDs match and save
			else {

				Session::set('Saved', 1); //Changes saved

				$IDMember = $CurrentMember->ID;

				$Staff = StaffPage::get()->filter(array('MemberID' => $IDMember))->first();

				$form->saveInto($Staff);

				/*Preserve this code, for it works the magic of SilverStripe 3 publishing*/
				Versioned::reading_stage('stage');
				$Staff->writeToStage('Stage');
				$Staff->publish("Stage", "Live");
				Versioned::reading_stage('Live');
				$Staff->write();

				// Save into the member dataobject.
				$memberFieldList = array(
					"FirstName",
					"Surname",
					"Email",
				);
				$form->saveInto($CurrentMember, $memberFieldList);

				$CurrentMember->write();

				$formData = $form->getData();
				
				$ID = 92;
				$test = StaffPage::get()->byID($ID);

				return $this->redirect($this->Link());
			}
		}
		//If not logged in then return a permission error
		else {
			return Security::PermissionFailure($this->controller, 'You must <a href="register">registered</a> and logged in to edit your profile:');
		}

	}

	//Check for just saved

	function Saved() {
		$saved = Session::get('Saved');
		//chromephp::log('When Saved gets called ');
		//chromephp::log($saved);
		if ($saved == 1) {
			return true;
		} else {
			return false;
		}

	}

	//Check if there was error while saving
	function notSaved() {
		$saved = Session::get('Saved');
		//chromephp::log('When notSaved gets called ');
		//chromephp::log($saved);
		if ($saved === 0) {
			return true;
		} else {
			return false;
		}
	}

	public function ClearSession() {
		Session::clear('Saved');
	}

	//Check if user succesfully registered (they are redirected to this page from RegistrationPage.php if registration was successful)
	function Success() {
		return $this->request->getVar('success');
	}
}