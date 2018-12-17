<?php

class PortfolioPost extends Page {

	private static $default_parent = 'PortfolioHolder';
	private static $db = array(
		"Date" => "SS_Datetime",
		'SiteLink' => 'Text',
		'IsArchived' => 'Boolean',

	);
	private static $can_be_root = false;
	private static $singular_name = 'Portfolio Post Page';

	private static $plural_name = 'Portfolio Post Pages';

	private static $has_one = array(
		'Image' => 'Image',
	);

	private static $has_many = array(
		'GalleryImages' => 'GalleryImage',
		'Roles' => 'Role',
	);

	private static $many_many = array(
		'Clients' => 'Client',
		'Mediums' => 'Medium',
	);

	private static $defaults = array(
		"ProvideComments" => true,
		'ShowInMenus' => false,
	);

	private static $default_sort = 'Date DESC';

	public function populateDefaults() {
		parent::populateDefaults();

		$this->setField('Date', date('Y-m-d H:i:s', strtotime('now')));

	}

	function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->removeByName('Sidebar');
		// $fields->removeByName('BackgroundImage');
		$fields->removeByName('Widgets');

		// $fields->addFieldToTab("Root.Main", $dateField = new DatetimeField("Date", _t("BlogEntry.DT", "Date")), "Content");


		// $dateField->getDateField()->setConfig('showcalendar', true);
		// $dateField->getTimeField()->setConfig('timeformat', 'H:m:s');

		// $dateField->getDateField()->setConfig('showcalendar', true);
		// $dateField->getTimeField()->setConfig('timeformat', 'H:m:s');
		$fields->addFieldToTab('Root.Main', new CheckboxField('IsArchived','Is this work archived? (Yes)'), "Content");


		$fields->addFieldToTab("Root.Main", new UploadField('Image', 'Cover Image'), 'Content');
		$fields->addFieldToTab("Root.Main", $uploadField = new SortableUploadField(
			'GalleryImages',
			'Additional Photos (drag and drop sortable)'),
			'Content');

		$uploadField->setAllowedMaxFileNumber(20);

		$clientField = TagField::create('Clients', 'Client(s)', Client::get(), $this->Clients())->setCanCreate(true);
		$fields->addFieldToTab("Root.Main", $clientField, 'Content');

		$mediumField = TagField::create('Mediums', 'Medium(s)', Medium::get(), $this->Mediums())->setCanCreate(true);

		$fields->addFieldToTab("Root.Main", $mediumField, 'Content');
		$fields->addFieldToTab("Root.Main", new TextField("SiteLink", "Website Link (MUST include http:// in the URL)"), "Content");

		$config = GridFieldConfig_RelationEditor::create();
		$config->removeComponentsByType('GridFieldAddExistingAutocompleter');
		$config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
			'Title' => 'Title',
			// Retrieve from a has-one relationship
		));
		$config->addComponent(new GridFieldSortableRows('SortOrder'));

		$rolesField = new GridField(
			'Roles',
			'Role',
			$this->Roles(),
			$config);

		$fields->addFieldToTab("Root.Main", $rolesField, 'Content');

		return $fields;
	}

	public function setTagFieldType($type = '') {
		$tag = Tag::get()->First();
		$fields = $tag->getCMSFields();
		$fields->replaceField('Type', new DropdownField('Type', 'Type', singleton('Tag')->dbObject('Type')->enumValues(), $type));
		return $fields;
	}

	public function StaffPages() {
		$roles = $this->Roles();
		$list = new ArrayList();

		foreach ($roles as $role) {
			$roleStaffPages = $role->StaffPages();
			foreach ($roleStaffPages as $roleStaffPage) {
				$list->push($roleStaffPage);
			}
		}

		$list->removeDuplicates();

		$listArray = $list->toArray();
		shuffle($listArray);

		$shuffledArrayList = new ArrayList($listArray);

		return $shuffledArrayList;

	}

	public function onBeforeWrite() {

		$this->owner->SiteLink = $this->owner->ValidateUrl($this->owner->SiteLink);

		parent::onBeforeWrite();
	}

}

class PortfolioPost_Controller extends BlogEntry_Controller {
	public function NextPage() {
		$page = PortfolioPost::get()->filter(array(
			'ParentID' => $this->ParentID,
			'Date:LessThan' => $this->Date,
		))->First();

		return $page;
	}
	public function PreviousPage() {
		$page = PortfolioPost::get()->filter(array(
			'ParentID' => $this->ParentID,
			'Date:GreaterThan' => $this->Date,
		))->Last();

		return $page;
	}

}
