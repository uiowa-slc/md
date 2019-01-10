<?php

use SilverStripe\TagField\TagField;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;
class Role extends DataObject {
	private static $db = array(
		'Title' => 'Text',
		'SortOrder' => 'Int',

	);
	private static $many_many = array(
		'StaffPages' => 'StaffPage',
	);

	private static $plural_name = "Roles";
	private static $has_one = array(
		'PortfolioPost' => 'PortfolioPost',
	);
	private static $default_sort = 'SortOrder';

	public function getCMSFields() {

		$staffListboxField = TagField::create('StaffPages', 'Staff who worked on this project', StaffPage::get(), $this->StaffPages())->setCanCreate(true);

		return new FieldList(
			new TextField('Title', 'Title'),
			$staffListboxField
		);
	}

	public function getSortedStaffPages() {
		return $this->StaffPages()->Sort('LastName ASC');
	}

}
