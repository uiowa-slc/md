<?php

use SilverStripe\Admin\ModelAdmin;

class TagAdmin extends ModelAdmin {

	private static $managed_models = array('Tag'); 
	private static $url_segment = 'tags';
	private static $menu_title = 'Tags';
	public $showImportForm = false; 
}