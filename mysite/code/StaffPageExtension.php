<?php
class StaffPageExtension extends DataExtension {
  private static $db = array(
        "Location" => "Text",
        "Interests" => "Text",
        "Major" => "Text",
        "DegreeDescription" => "Text",
        "MDExperience" => "Text",
        "FavoriteProject" => "Text",
        "TopStrengths" => "Text",
        "FavoriteQuote" => "Text",
        "PostGraduation" => "Text",
        "LinkedInURL" => "Text",
        "PortfolioURL" => "Text",

    );

    private static $belongs_many_many = array(
        'Roles' => 'Role'
        
    ); 

    public function updateCMSFields(FieldList $fields) {
     // $fields->addFieldToTab("Root.Main", new TextField('ExternalURL', 'External URL (if story lives elsewhere)'), 'Content');
        //$fields = parent::getCMSFields();

        $fields->removeByName('Position');
        $fields->removeByName('EmailAddress');
        $fields->removeByName('Phone');
        $fields->removeByName('DepartmentName');
        $fields->removeByName('DepartmentURL');
        $fields->removeByName('Content');



        $fields->addFieldToTab("Root.Main", new TextField("Location", "Where are you from?"));
        $fields->addFieldToTab("Root.Main", new TextareaField("Interests", "Interests and activities (snowshoeing, cattle herding, snake wrestling...) "));
        $fields->addFieldToTab("Root.Main", new TextField("Major", "Major"));
        $fields->addFieldToTab("Root.Main", new TextareaField("DegreeDescription","Explain why you chose your degree."));
        $fields->addFieldToTab("Root.Main", new TextareaField("MDExperience","What have you learned from your experience at M+D?"));
        $fields->addFieldToTab("Root.Main", new TextareaField("FavoriteProject","Favorite M+D project? Why?"));
        $fields->addFieldToTab("Root.Main", new TextareaField("TopStrengths","Favorite quote"));
        $fields->addFieldToTab("Root.Main", new TextareaField("FavoriteQuote","Favorite quote"));
        $fields->addFieldToTab("Root.Main", new TextareaField("PostGraduation","What do you hope to do after graduation?"));
        $fields->addFieldToTab("Root.Main", new TextField("LinkedInURL", "LinkedIn URL?"));
        $fields->addFieldToTab("Root.Main", new TextField("PortfolioURL", "Portfolio or other URL"));

        return $fields;
  }

    public function Projects(){
    	$owner = $this->owner;
    	$roles = $owner->Roles();

    	if(DataObject::get_one('Roles', "Title = '$roles->Title'")){
    		
    	}

    }   
}