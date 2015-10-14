<?php
/**
 * EditableHiddenField
 *
 * Allow users to define a validating editable hidden field for a UserDefinedForm
 *
 * @package userforms
 */
class EditableHiddenField extends EditableFormField {
	
	private static $singular_name = 'Hidden Field';
	
	private static $plural_name = 'Hidden Fields';

	public function getSetsOwnError() {
		return true;
	}

	public function getFormField() {
		$v = $this->Default;
		if(Controller::curr()->getRequest()->requestVar($this->Name))
			$v = Convert::raw2htmlatt(Controller::curr()->getRequest()->requestVar($this->Name));

		$field = HiddenField::create($this->Name, $this->EscapedTitle, $v)
			->setFieldHolderTemplate('UserFormsField_holder')
			->setTemplate('UserFormsField');

		$this->doUpdateFormField($field);

		return $field;
	}
}