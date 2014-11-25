<?php

class PortfolioPost extends Page{


	private static $default_parent = 'PortfolioHolder';
	private static $db = array(
		"Date" => "SS_Datetime",
      	'SiteLink' => 'Text',

	);
	private static $can_be_root = false;
	private static $singular_name = 'Portfolio Post Page';

	private static $plural_name = 'Portfolio Post Pages';

	private static $has_one = array(
        'Image' => 'Image',
    );


		
	private static $has_many = array(
		'AlternativeImages' => 'AlternativeImage',
		'Roles' => 'Role' 
	);

	private static $many_many = array(
	  'Clients' => 'Client',
	  'Mediums' => 'Medium'
	);

	private static $defaults = array(
		"ProvideComments" => true,
		'ShowInMenus' => false
	);

	public function populateDefaults(){
		parent::populateDefaults();
		
		$this->setField('Date', date('Y-m-d H:i:s', strtotime('now')));
	
	}

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
		

		$fields->removeByName('Tags');
      	$fields->removeByName('Author');
		$fields->addFieldToTab("Root.Main", $dateField = new DatetimeField("Date", _t("BlogEntry.DT", "Date")),"Content");
		$dateField->getDateField()->setConfig('showcalendar', true);
		$dateField->getTimeField()->setConfig('timeformat', 'H:m:s');
      	
      	$fields->addFieldToTab("Root.Main", new UploadField('Image', 'Main Image'), 'Content');
		$fields->addFieldToTab("Root.Main", $uploadField = new UploadField(
				'AlternativeImages', 
				'Alternative Photos'), 
				'Content');
		$uploadField->setAllowedMaxFileNumber(4);

		$clientSource = function(){
    		return Client::get()->map()->toArray();
		};
		$clientField = ListboxField::create('Clients', 'Client', $clientSource());
		$clientField->setMultiple(true)->useAddNew('Client', $clientSource);
		$fields->addFieldToTab("Root.Main",$clientField, 'Content');


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


		$fields->addFieldToTab("Root.Main", new TextField('SiteLink', 'SiteLink'), 'Content');

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
        $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
        // Set the names and data for our gridfield columns
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Title' => 'Title',
            // Retrieve from a has-one relationship
        ));   
        $config->addComponent(new GridFieldSortableRows('SortOrder'));

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

	public function StaffPages(){
		$roles = $this->Roles();
		$list = new ArrayList();

		foreach($roles as $role){
			$roleStaffPages = $role->StaffPages();
			foreach($roleStaffPages as $roleStaffPage){
				$list->push($roleStaffPage);
			}
		}

		$list->removeDuplicates();

		if(isset($list))
			return $list;
		else
			return false;
	}


}

class PortfolioPost_Controller extends BlogEntry_Controller{
	public function NextPage() {
		$page = Page::get()->filter( array (
				'ParentID' => $this->ParentID,
				'Sort:GreaterThan' => $this->Sort
			) )->First();

		return $page;
	}
	public function PreviousPage() {
		$page = Page::get()->filter( array (
				'ParentID' => $this->ParentID,
				'Sort:LessThan' => $this->Sort
			) )->Last();

		return $page;
	}	
}