<?php

class Tag extends DataObject{

	private static $db = array(
		"Title" => "varchar(255)",
		"URLSegment" => "varchar(255)",
		//"Content" => "HTMLText"
	);

	private static $summary_fields = array(
		"Title", "ClassName"
	);

	private static $belongs_many_many = array(
		
	);

	public function onBeforeWrite(){
		$owner = $this->owner;

		if(!$owner->URLSegment){
			$filter = URLSegmentFilter::create();
    		$filteredName = $filter->filter($owner->getTitle());

    		$owner->URLSegment = $filteredName;
    		$owner->write();
		}

		parent::onBeforeWrite();

	}

	public function getJsonFeed(){
		$data = array (
			"title" => $this->Title,
			"link" => $this->Link(),
			"type" => $this->Type,
			"content" => $this->Content
		);


		return json_encode($data);

	}
	public function FeedLink(){
		$link = 'tags/feed/'.$this->URLSegment.'/';
		return $link;		
	}
	public function Link(){
		$portfolioHolder = PortfolioHolder::get()->First();
		$link = $portfolioHolder->Link().'tags/'.$this->URLSegment.'/';
		return $link;
	}

	public function isActive(){
		$controller = Controller::curr();
		$params = $controller->getURLParams();

		if($this->URLSegment == $params['ID']){
			return true;
		}else{
			return false;
		}


	}

}