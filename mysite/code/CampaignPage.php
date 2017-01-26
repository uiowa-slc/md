<?php

class CampaignPage extends Page {

	private static $default_parent = 'CampaignHolder';
	private static $db = array(
	

	);


	private static $has_one = array(
		
	);

	private static $has_many = array(

	);

	private static $many_many = array(

	);

	private static $can_be_root = false;
	private static $singular_name = 'Campaign';

	private static $plural_name = 'Campaigns';

	function getCMSFields() {

		$fields = parent::getCMSFields();
		$fields->removeByName('Sidebar');
		$fields->removeByName('Widgets');

		return $fields;
	}


}

class CampaignPage_Controller extends Page_Controller {
	
}