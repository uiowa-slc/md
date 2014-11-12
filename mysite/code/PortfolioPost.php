<?php

class PortfolioPost extends BlogEntry{


	private static $default_parent = 'PortfolioHolder';
	private static $db = array(

	);
	private static $can_be_root = false;
	private static $singular_name = 'Portfolio Post Page';

	private static $plural_name = 'Portfolio Post Pages';
		
	private static $has_many = array(
		'AlternativeImages' => 'AlternativeImage',
		'Roles' => 'Role' 
	);

	private static $many_many = array(
	  'Audience' => 'Audience',
	  'Mediums' => 'Medium'
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
		$fields->removeByName('PhotosBy', false);
		$fields->removeByName('ExternalURL', false);
		$fields->removeByName('Date', false);

		$fields->removeByName('Tags');
      	$fields->removeByName('Author');
	

		$fields->addFieldToTab("Root.Main", $uploadField = new UploadField(
				'AlternativeImages', 
				'Alternative Photos'), 
				'Content');
		$uploadField->setAllowedMaxFileNumber(4);

		$audienceSource = function(){
    		return Audience::get()->map()->toArray();
		};
		$audienceField = ListboxField::create('Audience', 'Audience', $audienceSource());
		$audienceField->setMultiple(true)->useAddNew('Audience', $audienceSource);
		$fields->addFieldToTab("Root.Main",$audienceField, 'Content');


		$mediumSource = function(){
    		return Medium::get()->map()->toArray();
		};
		$mediumField = ListboxField::create('Mediums', 'Medium', $mediumSource());
		$mediumField->setMultiple(true)->useAddNew('Medium', $mediumSource);
		$fields->addFieldToTab("Root.Main",$mediumField, 'Content');

		$tagSource = function(){
    		return Tag::get()->filter(array('ClassName'=>'Tag'))->map()->toArray();
		};
		$tagField = ListboxField::create('TagObjects', 'Other Tags', $tagSource());
		$tagField->setMultiple(true)->useAddNew('Tag', $tagSource);
		$fields->addFieldToTab("Root.Main",$tagField, 'Content');

		/*$mediumSource = function(){
    		return Tag::get()->filter(array('Type'=>'Medium'))->map()->toArray();
		};
		$mediumField = ListboxField::create('TagObjects', 'Medium', $mediumSource());
		$mediumField->setMultiple(true);
		$mediumField->useAddNew('Tag', $mediumSource, $this->setTagFieldType('Medium') );
		$fields->addFieldToTab("Root.Main",$mediumField, 'Content');*/

		//$fields->addFieldToTab("Root.Main", new TextField('Audience', 'Audience'), 'Content');
		//$fields->addFieldToTab("Root.Main", new TextField('Medium', 'Medium'), 'Content');


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

	public function setTagFieldType($type = ''){
		$tag = Tag::get()->First();
		$fields = $tag->getCMSFields();
		$fields->replaceField('Type', new DropdownField('Type', 'Type', singleton('Tag')->dbObject('Type')->enumValues(), $type));
		return $fields;
	}


}

class PortfolioPost_Controller extends BlogEntry_Controller{
	
}