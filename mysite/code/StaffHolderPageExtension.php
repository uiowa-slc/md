<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\ORM\ArrayList;
use SilverStripe\Forms\GridField\GridFieldConfig;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class StaffHolderPageExtension extends DataExtension {

	private static $db = array(
		'AlumniContent' => 'HTMLText',
	);

	public function updateCMSFields(FieldList $fields){
		$fields->addFieldToTab('Root.Main', new HTMLEditorField('AlumniContent', 'Content to be displayed on the alumni page.'));

		$alumGrid = new GridField('Alumni', 'Alumni', $this->getAlumni());
		$currStudentGrid = new GridField('CurrentStudents', 'Current Students', $this->getCurrentStudents());

		$config = GridFieldConfig_RecordEditor::create();
        $alumGrid->setConfig($config);
        $currStudentGrid->setConfig($config);

		$fields->addFieldToTab("Root.Alumni", $alumGrid, 'Content');
        $fields->addFieldToTab("Root.CurrentStudents", $currStudentGrid, 'Content');  
      
	}

	public function getCurrentStudents() {
		$allStaff = StaffPage::get();
		$students = new ArrayList();
		foreach ($allStaff as $staff) {
			if (!($staff->inTeam("Professional Staff")) && !($staff->inTeam("Alumni"))) {
				$students->add($staff);
			}
		}
		return $students;
	}
	public function getAlumni() {
		$allStaff = StaffPage::get();
		$alum = new ArrayList();
		foreach ($allStaff as $staff) {
			if ($staff->inTeam("Alumni")) {
				$alum->add($staff);
			}
		}
		return $alum;
	}

}