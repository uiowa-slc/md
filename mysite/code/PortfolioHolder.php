<?php

class PortfolioHolder extends BlogHolder{
	//private static $icon = "blog/images/blogholder-file.png";
	
	private static $description = "Displays listings of Portfolio Posts";
	
	private static $singular_name = 'Portfolio Holder Page';

	private static $plural_name = 'Portfolio Holder Pages';

	private static $db = array(
		'AllowCustomAuthors' => 'Boolean',
		'ShowFullEntry' => 'Boolean', 
	);

	private static $has_one = array(
		'Owner' => 'Member',
	);

	private static $allowed_children = array(
		'PortfolioPost'
	);
}

class PortfolioHolder_Controller extends BlogHolder_Controller{

} 