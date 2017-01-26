<?php
class CampaignHolder extends Page {
	private static $icon = "blog/images/blogholder-file.png";

	private static $description = "Displays listings of Campaigns";

	private static $singular_name = 'Campaign Holder Page';

	private static $plural_name = 'Campaign Holder Pages';

	private static $db = array(

	);

	private static $has_one = array('Owner' => 'Member');

	private static $allowed_children = array('CampaignPage');
}

class CampaignHolder_Controller extends Page_Controller {
	// private static $allowed_actions = array('tag', 'feed');

	// private static $url_handlers = array('tags//$ID' => 'tag');
	public function init() {
		parent::init();
	}

	
}
