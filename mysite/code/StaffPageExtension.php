<?php
class StaffPageExtension extends DataExtension {

	private static $db = array(
		//Everybody

		"Location" => "Text",
		"Interests" => "Text",
		"FavoriteProject" => "Text",
		"LinkedInURL" => "Text",
		"PortfolioURL" => "Text",
		"TwitterHandle" => "Text",
		"GithubURL" => "Text",

		//Students
		"Major" => "Text",
		"DegreeDescription" => "Text",
		"TopStrengths" => "Text",
		"FavoriteQuote" => "Text",
		"PostGraduation" => "Text",

		"MDExperience" => "Text",

		//Alumni
		"EmploymentLocation" => "Text",
		"CurrentPosition" => "Text",
		"EmploymentLocationURL" => "Text",
		"FavoriteMemory" => "Text",
		"Advice" => "Text",
		"YearGraduated" => "Text",

		//Pro Staff
		"PositionTitle" => "Text",
		"EnjoymentFactors" => "Text",
		"JoinDate" => "Text",
		"Background" => "Text",

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
		$fields->removeByName('Position');
		//$fields->removeByName('EmailAddress');
		$fields->removeByName('Phone');
		$fields->removeByName('DepartmentName');
		$fields->removeByName('DepartmentURL');
		$fields->removeByName('Content');
		$fields->removeByName("BackgroundImage");

		//Everybody

		$fields->renameField('Teams', 'Team - If this person\'s an M+D Alum, put
            them in <strong>both the Alumni team and their original position</strong> (e.g., "Alumni + Graphic Designers")');

		$fields->renameField('Teams', 'Team - If this person\'s an M+D Alum, put
            them in <strong>both the Alumni team and their original position</strong> (e.g., "Alumni + Graphic Designers")');

		$fields->addFieldToTab("Root.Main", new TextField("Location", "Where are you from?"));
		$fields->addFieldToTab("Root.Main", new TextareaField("Interests", "Interests and activities (snowshoeing, cattle herding, snake wrestling...) "));
		$fields->addFieldToTab("Root.Main", new TextField("LinkedInURL", "LinkedIn URL?"));
		$fields->addFieldToTab("Root.Main", new TextField("PortfolioURL", "Portfolio or other URL"));
		$fields->addFieldToTab("Root.Main", new TextField("TwitterHandle", "Twitter Username @"));
		$fields->addFieldToTab("Root.Main", new TextField("GithubURL", "Github URL?"));
		$fields->addFieldToTab("Root.Main", new TextareaField("FavoriteProject", "Favorite M+D project? Why?"));

		//Students
		if ($owner->isStudent()) {
			$fields->addFieldToTab("Root.Main", new TextField("Major", "Major"));
			$fields->addFieldToTab("Root.Main", new TextareaField("DegreeDescription", "Explain why you chose your degree."));
			$fields->addFieldToTab("Root.Main", new TextareaField("MDExperience", "What have you learned from your experience at M+D?"));
			$fields->addFieldToTab("Root.Main", new TextareaField("TopStrengths", "Top five strengths"));
			$fields->addFieldToTab("Root.Main", new TextareaField("FavoriteQuote", "Favorite quote"));
			$fields->addFieldToTab("Root.Main", new TextareaField("PostGraduation", "What do you hope to do after graduation?"));

		}

		//Alumni
		if ($owner->inTeam('Alumni')) {
			$fields->addFieldToTab("Root.Main", new TextField("YearGraduated", "Year Graduated"));
			$fields->addFieldToTab("Root.Main", new TextField("EmploymentLocation", "Where are you employed?"));
			$fields->addFieldToTab("Root.Main", new TextField("CurrentPosition", "What is your current position title?"));
			$fields->addFieldToTab("Root.Main", new TextField("EmploymentLocationURL", "Your employer's website"));
			$fields->addFieldToTab("Root.Main", new TextareaField("FavoriteMemory", "What is your favorite memory of M+D?"));
			$fields->addFieldToTab("Root.Main", new TextareaField("Advice", "What advice would you give to current students?"));
		}

		//Pro Staff
		if ($owner->inTeam('Professional Staff')) {
			$fields->addFieldToTab("Root.Main", new TextField("Position", "Position"), "EmailAddress");
			$fields->addFieldToTab("Root.Main", new TextareaField("EnjoymentFactors", "What do you enjoy about working at M+D?"));
			$fields->addFieldToTab("Root.Main", new TextField("JoinDate", "When did you join the M+D staff?"));
			// $dateField->getDateField()->setConfig('showcalendar', true);
			$fields->addFieldToTab("Root.Main", new TextareaField("Background", "Background & Education"));
		}

		$fields->addFieldToTab("Root.Main", new TextField("LinkedInURL", "LinkedIn URL?"));
		$fields->addFieldToTab("Root.Main", new TextField("PortfolioURL", "Portfolio or other URL"));

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

	public function isStudent() {
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

			return $projects;
		}

	}
	public function EditPortfolioLink(){

		/* 	Student staff Page:
			https://docs.google.com/forms/d/1Bh8JIkuV3b_2NHX8ST8Ud8xTOWsKTILnQWgddn3XmDU/viewform?entry.1413661770=FirstName&entry.1547650400=LastName&entry.1970732278=WhereFrom&entry.46708057=InterestsAct&entry.2022956471=Major&entry.83862488=WhyDegree&entry.721109635=LearnedFromExp&entry.428912992=FavoriteMDProject&entry.246858419=FiveStrengths&entry.43829841=FavQuote&entry.644260591=AfterGrad&entry.1346755299=LinkedIn&entry.1110916745=Portfolio
			
			Pro Staff Page:
			https://docs.google.com/forms/d/16nRmETxww4vIEqqlqQ72JUV_FWgSET4fUahp9-hdDoc/viewform?entry.1413661770=FirstName&entry.1547650400=LastNam&entry.1970732278=From&entry.46708057=InterestsActs&entry.428912992=FavoriteMDProject&entry.882405316=Position&entry.721109635=EnjoyAboutMD&entry.246858419=WhenJoined&entry.43829841=BackgroundEd&entry.1346755299=LinkedIn&entry.1110916745=Portfolio

			Alum Page:
			https://docs.google.com/forms/d/1q44t27U28RlkOIUJ_2OXzrEHbxqap3TmLNbjAraLAUg/viewform?entry.1413661770=FirstName&entry.1547650400=LastName&entry.1970732278=WhereFrom&entry.1276658641=Email&entry.1105919959=CurrentEmployer&entry.706670405=CurrentEmployerURL&entry.782910880=CurrentPosition&entry.813930454=YearGraduated&entry.2022956471=Major&entry.1552428663=Bio&entry.46708057=InterestsAct&entry.382308292=AdviceToCurrentStudents&entry.721109635=LearnedFromExp&entry.428912992=FavoriteMDProject&entry.246858419=FiveStrengths&entry.43829841=FavQuote&entry.1346755299=LinkedIn&entry.1672914025=Twitter&entry.1110916745=Portfolio
		

		*/	include_once(Director::BaseFolder().'/mysite/code/thirdparty/Bitly.php');
			$owner = $this->owner;

			if($owner->isStudent()){
				$urlPrefix = 'https://docs.google.com/forms/d/1Bh8JIkuV3b_2NHX8ST8Ud8xTOWsKTILnQWgddn3XmDU/viewform?';

				$parameters = 'entry.1413661770='.urlencode($owner->FirstName);
				$parameters .='&entry.1547650400='.urlencode($owner->LastName);
				$parameters .='&entry.1970732278='.urlencode($owner->Location);
				$parameters .='&entry.46708057='.urlencode($owner->Interests);
				$parameters .='&entry.2022956471='.urlencode($owner->Major);
				$parameters .='&entry.83862488='.urlencode($owner->DegreeDescription);
				$parameters .='&entry.721109635='.urlencode($owner->MDExperience);
				$parameters .='&entry.428912992='.urlencode($owner->FavoriteProject);
				$parameters .='&entry.246858419='.urlencode($owner->TopStrengths);
				$parameters .='&entry.43829841='.urlencode($owner->FavoriteQuote);
				$parameters .='&entry.644260591='.urlencode($owner->PostGraduation);
				$parameters .='&entry.1346755299='.urlencode($owner->LinkedInURL);
				$parameters .='&entry.1110916745='.urlencode($owner->PortfolioURL);

			}else if($owner->isProStaff()){
				$urlPrefix = 'https://docs.google.com/forms/d/16nRmETxww4vIEqqlqQ72JUV_FWgSET4fUahp9-hdDoc/viewform?';

				$parameters = 'entry.1413661770='.urlencode($owner->FirstName);
				$parameters .='&entry.1547650400='.urlencode($owner->LastName);
				$parameters .='&entry.1970732278='.urlencode($owner->Location);
				$parameters .='&entry.46708057='.urlencode($owner->Interests);
				$parameters .='&entry.428912992='.urlencode($owner->FavoriteProject);
				$parameters .='&entry.882405316='.urlencode($owner->PositionTitle);
				$parameters .='&entry.721109635='.urlencode($owner->EnjoymentFactors);
				$parameters .='&entry.246858419='.urlencode($owner->JoinDate);
				$parameters .='&entry.43829841='.urlencode($owner->Background);
				$parameters .='&entry.1346755299='.urlencode($owner->LinkedInURL);
				$parameters .='&entry.1110916745='.urlencode($owner->PortfolioURL);


			}else if($owner->isAlum()){
				$urlPrefix = 'https://docs.google.com/forms/d/1Bh8JIkuV3b_2NHX8ST8Ud8xTOWsKTILnQWgddn3XmDU/viewform?';

				$parameters = 'entry.1413661770='.urlencode($owner->FirstName);
				$parameters .='&entry.1547650400='.urlencode($owner->LastName);
				$parameters .='&entry.1970732278='.urlencode($owner->Location);
				$parameters .='&entry.1276658641='.urlencode($owner->EmailAddress);
				$parameters .='&entry.1105919959='.urlencode($owner->EmploymentLocation);
				$parameters .='&entry.706670405='.urlencode($owner->EmploymentLocationURL);
				$parameters .='&entry.782910880='.urlencode($owner->CurrentPosition);
				$parameters .='&entry.813930454='.urlencode($owner->YearGraduated);
				$parameters .='&entry.2022956471='.urlencode($owner->Major);
				$parameters .='&entry.1552428663='.urlencode($owner->Content);
				$parameters .='&entry.46708057='.urlencode($owner->Interests);
				$parameters .='&entry.382308292='.urlencode($owner->Advice);
				$parameters .='&entry.721109635='.urlencode($owner->MDExperience);
				$parameters .='&entry.428912992='.urlencode($owner->FavoriteProject);
				$parameters .='&entry.246858419='.urlencode($owner->TopStrengths);
				$parameters .='&entry.43829841='.urlencode($owner->FavoriteQuote);
				$parameters .='&entry.1346755299='.urlencode($owner->LinkedInURL);
				$parameters .='&entry.1672914025='.urlencode($owner->TwitterHandle);
				$parameters .='&entry.1110916745='.urlencode($owner->PortfolioURL);


			}else{
				return false;
			}
			//print_r(urldecode('https%253A%252F%252Fdocs.google.com%252Fforms'));
			//print_r(get_defined_constants() );
			if(defined('BITLY_OAUTH')){

				$url = $urlPrefix.$parameters;
				$token = BITLY_OAUTH;
				
				$shorten = bitly_v3_shorten($url, $token);

				//print_r($shorten);

				if(isset($shorten['url'])){
					return $shorten['url'];
				}else{
					return $urlPrefix;
				}
			}else{
				return $urlPrefix;
			}

	}
}