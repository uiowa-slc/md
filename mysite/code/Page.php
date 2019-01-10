<?php

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\ORM\ArrayList;
use SilverStripe\CMS\Controllers\ContentController;
class Page extends SiteTree {

	private static $db = array();

	private static $has_one = array();

	private static $many_many = array();

	private static $many_many_extraFields = array();

	private static $plural_name = "Pages";

	private static $defaults = array();

	public function getCMSFields() {
		$f = parent::getCMSFields();

		return $f;
	}

	public function ValidateUrl($url) {
		if (empty($url)) {
			return $url;
		} else if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://" . $url;
		}

		return $url;
	}
}
