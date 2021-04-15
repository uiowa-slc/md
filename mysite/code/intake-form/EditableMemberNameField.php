<?php

namespace SilverStripe\UserForms\Model\EditableFormField;

use SilverStripe\Forms\TextField;
use SilverStripe\Security\Group;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;
use SilverStripe\UserForms\Model\EditableFormField;

/**
 * Creates an editable field that displays members in a given group
 *
 * @package userforms
 */
class EditableMemberNameField extends EditableFormField {
	private static $singular_name = 'Member Name Field';

	private static $plural_name = 'Member Name Fields';

	private static $has_one = [

	];

	private static $table_name = 'EditableMemberNameField';

	/**
	 * @return FieldList
	 */
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('Default');
		$fields->removeByName('Validation');

		return $fields;
	}

	public function getFormField() {
		$member = Security::getCurrentUser();
		$name = '';

		if ($member) {
			$name = $member->FirstName . ' ' . $member->Surname;
		}
		$field = TextField::create($this->Name, $this->Title ?: false, $name)
			->setFieldHolderTemplate(EditableFormField::class . '_holder')
			->setTemplate(EditableFormField::class);

		$this->doUpdateFormField($field);

		return $field;
	}

}
