<?php
class StaffPageExtension extends DataExtension {
  
    private static $belongs_many_many = array(
        'Roles' => 'Role'
        
    ); 

    public function Projects(){
    	$owner = $this->owner;
    	$roles = $owner->Roles();

    	if(DataObject::get_one('Roles', "Title = '$roles->Title'")){
    		
    	}

    }   
}