<?php
class Role extends DataObject {
	private static $db = array(
		'Title' => 'Varchar(155)',
		'SortOrder' => 'Int',

	);
	private static $many_many = array(
		'StaffPages' => 'StaffPage',
	);

	private static $plural_name = "Roles";
	private static $has_one = array(
		'PortfolioPost' => 'PortfolioPost',
	);
	public static $default_sort = 'SortOrder';

	public function getCMSFields() {

		$staffPages = function () {
			return StaffPage::get()->map()->toArray();
		};
		$staffListboxField = ListboxField::create('StaffPages', 'Staff who worked on this project', $staffPages())
			->setMultiple(true)
			->useAddNew('StaffPage', $staffPages);
		return new FieldList(
			new TextField('Title', 'Title'),
			$staffListboxField
		);
	}

	public function getSortedStaffPages() {
		return $this->StaffPages()->Sort('LastName ASC');
	}

}