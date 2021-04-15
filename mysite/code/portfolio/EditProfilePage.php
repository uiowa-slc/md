<?php
/**
 * Defines the EditProfilePage page type
 */
use SilverStripe\Control\Session;
class EditProfilePage extends Page {
	private static $db = array(
		
	);
	private static $has_one = array(

	);


	function getSavedSession() {
		$returning = '' . Session::get('Saved');
		return $returning;
	}

}

