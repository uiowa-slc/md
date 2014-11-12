<?php

class PortfolioPost extends BlogEntry{


private static $default_parent = 'PortfolioHolder';
	private static $db = array(
		'Audience' => 'Text',
      	'Medium' => 'Text',
      	'PieceDescription' => 'Text',
	);
	private static $can_be_root = false;
	
	private static $icon = "blog/images/blogpage-file.png";

	
	private static $singular_name = 'Portfolio Post Page';
	
	private static $plural_name = 'Portfolio Post Pages';
		
	private static $has_many = array(
		'AlternativeImages' => 'AlternativeImage',
		'Roles' => 'Role' 
	);
	

	private static $belongs_many_many = array(
		     
		 );
	

	
	
	private static $defaults = array(
		"ProvideComments" => true,
		'ShowInMenus' => false
	);
	


function getCMSFields() {
				
		
		$fields = parent::getCMSFields();
		
		$fields->removeByName('StoryBy', false);
		$fields->removeByName('StoryByEmail', false);
		$fields->removeByName('StoryByTitle', false);
		$fields->removeByName('StoryByDept', false);
		$fields->removeByName('StoryByEmail', false);
		$fields->removeByName('PhotosByEmail', false);
		


		$fields->addFieldToTab("Root.Main", $uploadField = new UploadField(
				'AlternativeImages', 
				'Alternative Photos'), 
				'Content');
		$uploadField->setAllowedMaxFileNumber(4);
		


		$fields->addFieldToTab("Root.Main", new TextField('PieceDescription', 'Description of Post'), 'Content');
		$fields->addFieldToTab("Root.Main", new TextField('Audience', 'Audience'), 'Content');
		$fields->addFieldToTab("Root.Main", new TextField('Medium', 'Medium'), 'Content');


        // Create a default configuration for the new GridField, allowing record editing
        $config = GridFieldConfig_RelationEditor::create();
        // Set the names and data for our gridfield columns
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Title',
            // Retrieve from a has-one relationship
        ));    




		$rolesField = new GridField(
			'Roles', 
			'Role',
			$this->Roles(), 
			$config

			);
		$fields->addFieldToTab("Root.Roles",$rolesField);

		return $fields;
	} 




}

class PortfolioPost_Controller extends BlogEntry_Controller{
	
}