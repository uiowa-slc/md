<?php

class Client extends Tag{

	private static $db = array(

	);

	private static $belongs_many_many = array(
		"PortfolioPosts" => "PortfolioPost"
	);


	public function getAddNewFields(){
		return new FieldList(
			new TextField("Title", "Client Name")
		);

	}

}