<?php

class Medium extends Tag{

	private static $db = array(

	);

	private static $belongs_many_many = array(
		"PortfolioPosts" => "PortfolioPost"
	);

}