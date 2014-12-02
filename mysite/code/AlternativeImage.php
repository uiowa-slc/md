<?php
class GalleryImage extends Image {

	private static $db = array( 
		'Sort' => 'Int'
	);

	private static $default_sort = 'Sort ASC';

    private static $has_one = array(

        'PortfolioPost' => 'PortfolioPost'

    );    
}