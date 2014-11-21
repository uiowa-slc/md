<?php
class StaffPageExtension extends DataExtension {
  
    private static $belongs_many_many = array(
        'Roles' => 'Role'
        
    ); 

    public function updateCMSFields(FieldList $fields) {
     // $fields->addFieldToTab("Root.Main", new TextField('ExternalURL', 'External URL (if story lives elsewhere)'), 'Content');
     

  }

    public function Projects(){
    	$owner = $this->owner;
    	$roles = $owner->Roles();

    	if(DataObject::get_one('Roles', "Title = '$roles->Title'")){
    		
    	}

    }   
}