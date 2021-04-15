<?php

namespace SilverStripe\UserForms\Model\EditableFormField;

use SilverStripe\Security\Group;
use SilverStripe\Security\Member;
use SilverStripe\UserForms\Model\EditableFormField;

/**
 * Creates an editable field that displays members in a given group
 *
 * @package userforms
 */
class EditableDeptListField extends EditableFormField {

	private static $singular_name = 'Student Life Department List Field';

	private static $plural_name = 'Student Life Department List Fields';

	private static $table_name = 'EditableDeptListField';

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

		$field = \NewsDeptDropdownField::create($this->Name, $this->Title ?: false)
			->setTemplate(EditableDropdown::class)
			->setFieldHolderTemplate(EditableFormField::class . '_holder');

		$this->doUpdateFormField($field);

		return $field;
	}

	public function getValueFromData($data) {

		$feedURL = 'https://studentlife.uiowa.edu/news/departmentListFeed';
		$rawFeed = file_get_contents($feedURL);
		$categoriesArray = json_decode($rawFeed, TRUE);

		foreach ($categoriesArray as $key => $category) {
			$source[$category['ID']] = $category['Title'];
		}

		if (isset($data[$this->Name])) {

			$dept = $source[$data[$this->Name]];

			return $dept;
		}

		return false;
	}
}
