<?php
class StaffPageControllerExtension extends Extension {

	private static $allowed_actions = array(
			
	);

	public static $url_handlers = array(

	       
	);


	public function NewsPosts(){
		$owner = $this->owner;
		$memberId = $owner->EmailAddress;


		if(isset($memberId)){
			$url = 'http://studentlife.uiowa.edu/news/rss?member='.$memberId;
			return $owner->RSSDisplay(20, $url);
		}else{
			return false;
		}
		
	}

}