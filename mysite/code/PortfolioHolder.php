<?php

use SilverStripe\Security\Member;
class PortfolioHolder extends Page {
	private static $icon = "blog/images/blogholder-file.png";

	private static $description = "Displays listings of Portfolio Posts";

	private static $singular_name = 'Portfolio Holder Page';

	private static $plural_name = 'Portfolio Holder Pages';

	private static $db = array('AllowCustomAuthors' => 'Boolean', 'ShowFullEntry' => 'Boolean');

	private static $has_one = array('Owner' => Member::class);

	private static $allowed_children = array('PortfolioPost');
}

