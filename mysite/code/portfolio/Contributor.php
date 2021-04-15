<?php

use SilverStripe\ORM\DataObject;
class Contributor extends DataObject {
    private static $db = array(
        'Name' => 'Varchar',
       
    );
    private static $many_many = array(
        'PortfolioPosts' => 'PortfolioPost'
    );    
}