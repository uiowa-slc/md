<?php
class Role extends DataObject {
    private static $db = array(
		'Title' => 'Varchar(155)'
      
	);
    private static $many_many = array(
        'StaffPages' => 'StaffPage'
    );    

	private static $plural_name = "Roles";
    private static $has_one = array(
    		'PortfolioPost' => 'PortfolioPost'
    	);
}