<?php
class StaffPageExtension extends DataExtension {

  private static $db = array(
        //Everybody

        "Location" => "Text",
        "Interests" => "Text",
        "FavoriteProject" => "Text",
        "LinkedInURL" => "Text",
        "PortfolioURL" => "Text",

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
        "FavoriteMemory" => "Text",
        "Advice" => "Text",

        //Pro Staff
        "PositionTitle" => "Text",
        "EnjoymentFactors" => "Text",
        "JoinDate" => "Date",
        "Background" => "Text",

    );

    private static $belongs_many_many = array(
        'Roles' => 'Role'
    ); 

    public function getCMSFields() {
      $this->extend('updateCMSFields', $fields);
      return $fields;
    }


    public function updateCMSFields(FieldList $fields) {

        $fields->removeByName('Position');
        $fields->removeByName('EmailAddress');
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
        $fields->addFieldToTab("Root.Main", new TextareaField("FavoriteProject","Favorite M+D project? Why?"));

 
        //Students
        if($this->isStudent()){
            $fields->addFieldToTab("Root.Main", new TextField("Major", "Major"));
            $fields->addFieldToTab("Root.Main", new TextareaField("DegreeDescription","Explain why you chose your degree."));  
            $fields->addFieldToTab("Root.Main", new TextareaField("MDExperience","What have you learned from your experience at M+D?"));
            $fields->addFieldToTab("Root.Main", new TextareaField("TopStrengths","Top five strengths"));
            $fields->addFieldToTab("Root.Main", new TextareaField("FavoriteQuote","Favorite quote"));
            $fields->addFieldToTab("Root.Main", new TextareaField("PostGraduation","What do you hope to do after graduation?"));

        }

        //Alumni
        if($this->inTeam('Alumni')){
            $fields->addFieldToTab("Root.Main", new TextField("EmploymentLocation", "Where are you employed?"));
            $fields->addFieldToTab("Root.Main", new TextField("CurrentPosition", "What is your current position title?"));
            $fields->addFieldToTab("Root.Main", new TextareaField("FavoriteMemory","What is your favorite memory of M+D?"));  
            $fields->addFieldToTab("Root.Main", new TextareaField("Advice","What advice would you give to current students?")); 
        }

        //Pro Staff
        if($this->inTeam('Professional Staff')){
            $fields->addFieldToTab("Root.Main", new TextField("PositionTitle", "Position title"));
            $fields->addFieldToTab("Root.Main", new TextareaField("EnjoymentFactors", "What do you enjoy about working at M+D?"));
            $fields->addFieldToTab("Root.Main", $dateField = new DateField("JoinDate","When did you join the M+D staff?(MM DD YYYY)"));
            // $dateField->getDateField()->setConfig('showcalendar', true);  
            $fields->addFieldToTab("Root.Main", new TextareaField("Background","Background & Education")); 
        }


        $fields->addFieldToTab("Root.Main", new TextField("LinkedInURL", "LinkedIn URL?"));
        $fields->addFieldToTab("Root.Main", new TextField("PortfolioURL", "Portfolio or other URL"));


    }


    public function getAddNewFields(){
        $fields = new FieldList();
        $fields->push(new TextField("FirstName", "First Name"));
        $fields->push(new TextField("LastName", "Last Name"));


        $fields->push(new CheckboxSetField("Teams", 'Team - If this person\'s an M+D Alum, put 
            them in the Alumni team and their original position (e.g., "Alumni + Graphic Designers")', StaffTeam::get()->map('ID', 'Name')));

        return $fields;
    }

    public function isStudent(){
        if(!($this->inTeam("Professional Staff")) && !($this->inTeam("Alumni"))){
            return true;
        }else{
            return false;
        }
    }

    public function onBeforeWrite(){
        $this->owner->ParentID = 24;
        $this->owner->Title = $this->owner->FirstName.' '.$this->owner->LastName;
        $this->owner->LinkedInURL = $this->owner->ValidateUrl($this->owner->LinkedInURL);
        $this->owner->PortfolioURL = $this->owner->ValidateUrl($this->owner->PortfolioURL);


        parent::onBeforeWrite();
    }


    // if ($this->InTeam("Professional Staff")) 

    public function inTeam($teamName){

       $owner = $this->owner;
       $teamsIncluded = $owner->Teams();

       foreach($teamsIncluded as $team ){
             if($team->Name == $teamName){
                return true;
            }       
       }

       return false;

    }


    public function Projects(){
       $owner = $this->owner;
       $roles = $owner->Roles();

       if(DataObject::get_one('Roles', "Title = '$roles->Title'")){

       }

    }   

   

}