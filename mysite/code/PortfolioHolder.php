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
	private static $allowed_actions = array('tag', 'feed');

	private static $url_handlers = array(
        'tags//$ID' => 'tag'
    );
	public function init() {
		parent::init();

	}
	public function tag($request){
		$tagURLSegment = addslashes( $this->urlParams['ID'] );
		$tag = Tag::get()->Filter(array("URLSegment" => $tagURLSegment))->First();

		if(isset($tag)){
			$Data = array (
				'Title' =>$tag->Title,
				'SelectedTag' => $tag
			);
			return $this->customise($Data)->renderWith(array('PortfolioHolder', 'Page'));
		}else{
			return $this->httpError(404);
		}
	}

	public function StaffPages(){
		return StaffPage::get()->sort('RAND()');
	}

} 