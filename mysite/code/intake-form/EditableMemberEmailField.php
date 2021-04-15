<?php

namespace SilverStripe\UserForms\Model\EditableFormField;

use SilverStripe\Forms\EmailField;
use SilverStripe\Security\Group;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;
use SilverStripe\UserForms\Model\EditableFormField;

/**
 * Creates an editable field that displays members in a given group
 *
 * @package userforms
 */
class EditableMemberEmailField extends EditableFormField {
	private static $singular_name = 'Member Email Field';

	private static $plural_name = 'Member Email Fields';

	private static $has_one = [

	];

	private static $table_name = 'EditableMemberEmailField';

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
		$email = '';

		if ($member) {
			$email = $member->Email;
		}
		$field = EmailField::create($this->Name, $this->Title ?: false, $email)
			->setFieldHolderTemplate(EditableFormField::class . '_holder')
			->setTemplate(EditableFormField::class);

		$this->doUpdateFormField($field);

		return $field;
	}

}
