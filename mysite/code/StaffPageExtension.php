<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\ORM\ArrayList;
use SilverStripe\Security\Member;
use SilverStripe\Control\Director;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Security\Security;
use SilverStripe\Forms\RequiredFields;
class StaffPageExtension extends DataExtension {

	private static $db = array(
		//Everybody
		"Interests" => "HTMLText",
		"FavoriteProject" => "HTMLText",
		"LinkedInURL" => "Text",
		"PortfolioURL" => "Text",
		"TwitterHandle" => "Text",
		"InstagramHandle" => "Text",
		"GithubURL" => "Text",

		//Students
		"Major" => "Text",
		"DegreeDescription" => "HTMLText",
		"TopStrengths" => "HTMLText",
		"FavoriteQuote" => "Text",
		"PostGraduation" => "HTMLText",
		"MDExperience" => "HTMLText",

		//Alumni
		"EmploymentLocation" => "Text",
		"CurrentPosition" => "Text",
		"EmploymentLocationURL" => "Text",
		"FavoriteMemory" => "HTMLText",
		"Advice" => "HTMLText",
		"YearGraduated" => "Text",

		//Pro Staff
		"PositionTitle" => "Text",
		"EnjoymentFactors" => "HTMLText",
		"JoinDate" => "Text",
		"Background" => "HTMLText",

	);
	private static $has_one = array(
		'Member' => Member::class
	);

	private static $belongs_many_many = array(
		'Roles' => 'Role',
	);

	public function getCMSFields() {
		$owner->extend('updateCMSFields', $fields);
		return $fields;
	}

	public function updateCMSFields(FieldList $fields) {
		$owner = $this->owner;
	
		if (!$owner->inTeam('Professional Staff')) {
				$fields->removeByName('Phone');
				$fields->removeByName('Position');
			}
		$fields->removeByName('DepartmentName');
		$fields->removeByName('DepartmentURL');
		$fields->removeByName('Content');
		$fields->removeByName('Content');

		//Everybody

		$fields->renameField('Teams', 'Team - If this person\'s an M+D Alum, put
            them in both the Alumni team and their original position (e.g., "Alumni + Graphic Designers")');

		$fields->renameField('EmailAddress', 'Email Address (@uiowa.edu, required for editing their own profile)');


		$fields->addFieldToTab("Root.Main", new TextField("LinkedInURL", "LinkedIn URL?"));
		$fields->addFieldToTab("Root.Main", new TextField("TwitterHandle", "Twitter Username @"));
		$fields->addFieldToTab("Root.Main", new TextField("GithubURL", "Github URL?"));
		$fields->addFieldToTab("Root.Main", new TextField("LinkedInURL", "LinkedIn URL?"));
		$fields->addFieldToTab("Root.Main", new TextField("PortfolioURL", "Portfolio or other URL"));
		
		$fields->addFieldToTab("Root.Main", HTMLEditorField::create("Interests", "Interests and activities (snowshoeing, cattle herding, snake wrestling...) ")->addExtraClass('stacked'));
		$fields->addFieldToTab("Root.Main", HTMLEditorField::create("FavoriteProject", "Favorite M+D project? Why?")->addExtraClass('stacked'));

		//Students
		if ($owner->isStudent()) {
			$fields->addFieldToTab("Root.Main", new TextField("Major", "Major"));
			$fields->addFieldToTab("Root.Main", HTMLEditorField::create("DegreeDescription", "Explain why you chose your degree.")->addExtraClass('stacked'));
			$fields->addFieldToTab("Root.Main", HTMLEditorField::create("MDExperience", "What have you learned from your experience at M+D?")->addExtraClass('stacked'));
			$fields->addFieldToTab("Root.Main", new TextareaField("TopStrengths", "Top five strengths"));
			$fields->addFieldToTab("Root.Main", new TextareaField("FavoriteQuote", "Favorite quote"));
			$fields->addFieldToTab("Root.Main", HTMLEditorField::create("PostGraduation", "What do you hope to do after graduation?")->addExtraClass('stacked'));

		}

		//Alumni
		if ($owner->inTeam('Alumni')) {
			$fields->addFieldToTab("Root.Main", new TextField("YearGraduated", "Year Graduated"));
			$fields->addFieldToTab("Root.Main", new TextField("EmploymentLocation", "Where are you employed?"));
			$fields->addFieldToTab("Root.Main", new TextField("CurrentPosition", "What is your current position title?"));
			$fields->addFieldToTab("Root.Main", new TextField("EmploymentLocationURL", "Your employer's website"));
			$fields->addFieldToTab("Root.Main", HTMLEditorField::create("FavoriteMemory", "What is your favorite memory of M+D?")->addExtraClass('stacked'));
			$fields->addFieldToTab("Root.Main", HTMLEditorField::create("Advice", "What advice would you give to current students?")->addExtraClass('stacked'));
		}

		//Pro Staff
		if ($owner->inTeam('Professional Staff')) {
			$fields->addFieldToTab("Root.Main", HTMLEditorField::create("EnjoymentFactors", "What do you enjoy about working at M+D?")->addExtraClass('stacked'));
			$fields->addFieldToTab("Root.Main", new TextField("JoinDate", "When did you join the M+D staff?"));
			// $dateField->getDateField()->setConfig('showcalendar', true);
			$fields->addFieldToTab("Root.Main", HTMLEditorField::create("Background", "Background & Education")->addExtraClass('stacked'));
		}

	}
    public function getCMSValidator()
    {
        return new RequiredFields([
            'EmailAddress'
        ]);
    }
	public function getAddNewFields() {
		$fields = new FieldList();
		$fields->push(new TextField("FirstName", "First Name"));
		$fields->push(new TextField("LastName", "Last Name"));

		$fields->push(new CheckboxSetField("Teams", 'Team - If this person\'s an M+D Alum, put
            them in the Alumni team and their original position (e.g., "Alumni + Graphic Designers")', StaffTeam::get()->map('ID', 'Name')));

		return $fields;
	}

	public function FullNameTruncated() {
		$lastName = $this->owner->LastName;
		$fullName = $this->owner->FirstName . ' ' . substr($lastName, 0, 1) . '.';

		return $fullName;

	}

	public function CurrentMemberOwnsPage(){
		if( $member = Security::getCurrentUser() ) {
			$pageMember = $this->owner->Member();

			if($pageMember){
				if($pageMember->ID == $member->ID){
					return true;
				}
			}
		    // Work with $member
		}

		return false;
	}

	public function isStudent() {
		// print_r($this->owner);
		if (!($this->inTeam("Professional Staff")) && !($this->inTeam("Alumni"))) {
			return true;
		} else {
			return false;
		}
	}
	public function isAlum() {
		if ($this->inTeam("Alumni")) {
			return true;
		} else {
			return false;
		}
	}
	public function isProStaff(){
		if ($this->inTeam("Professional Staff")) {
			return true;
		} else {
			return false;
		}
	}
	public function onBeforeWrite() {
		$this->owner->ParentID = 24;
		$this->owner->Title = $this->owner->FirstName . ' ' . $this->owner->LastName;
		$this->owner->LinkedInURL = $this->owner->ValidateUrl($this->owner->LinkedInURL);
		$this->owner->PortfolioURL = $this->owner->ValidateUrl($this->owner->PortfolioURL);
		$this->owner->GithubURL= $this->owner->ValidateUrl($this->owner->GithubURL);
		$this->owner->EmploymentLocationURL= $this->owner->ValidateUrl($this->owner->EmploymentLocationURL);
		$this->owner->TwitterHandle= $this->owner->ValidateTwitter($this->owner->TwitterHandle);
		$this->owner->InstagramHandle= $this->owner->ValidateInstagram($this->owner->InstagramHandle);

		parent::onBeforeWrite();
	}

	// if ($owner->InTeam("Professional Staff"))

	public function inTeam($teamName) {

		$owner = $this->owner;
		$teamsIncluded = $owner->Teams();

		foreach ($teamsIncluded as $team) {
			if ($team->Name == $teamName) {
				return true;
			}
		}

		return false;

	}

	public function Projects() {
		$owner = $this->owner;
		$roles = $owner->Roles();
		if ($roles->First()) {

			$projects = new ArrayList();
			foreach ($roles as $role) {
				if ($role->PortfolioPost()->exists()) {
					$projects->push($role->PortfolioPost());
				}
			}
			$projects->removeDuplicates();

			return $projects->sort('Date DESC');
		}

	}

	public function Posts(){
		$author = Member::get()->filter(array('Email' => $this->owner->EmailAddress))->First();

		if($author){
			return $author->BlogPosts()->limit(4);
		}

	}

	public function ValidateTwitter($username) {
		if (empty($username)) {
			return $username;
		} else if (!preg_match("/@/i", $username)) {
			$username = "@" . $username;
		}

		return $username;
	}

	public function ValidateInstagram($username) {
		if (empty($username)) {
			return $username;
		} else if (preg_match("/@/i", $username)) {
			$username = str_replace('@', '', $username); 
		}

		return $username;
	}


}
