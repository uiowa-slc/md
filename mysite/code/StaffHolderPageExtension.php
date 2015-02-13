<?php
class StaffHolderPageExtension extends DataExtension {

	private static $db = array(
		'AlumniContent' => 'HTMLText'


	);

	public function updateCMSFields(FieldList $fields){
		$fields->addFieldToTab('Root.Main', new HTMLEditorField('AlumniContent', 'Content to be displayed on the alumni page.'));
	}

}