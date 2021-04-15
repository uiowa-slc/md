<?php



class PortfolioHolderController extends PageController {
    private static $allowed_actions = array('tag', 'feed');

    private static $url_handlers = array('tags//$ID' => 'tag');
    public function init() {
        parent::init();
    }

    private function getTagFromParams() {
        $tagURLSegment = addslashes($this->urlParams['ID']);
        $tag = Tag::get()->Filter(array("URLSegment" => $tagURLSegment))->First();
        return $tag;
    }

    public function tag($request) {

        $tag = $this->getTagFromParams();

        if (isset($tag)) {
            $Data = array('Title' => $tag->Title, 'SelectedTag' => $tag);
            return $this->customise($Data)->renderWith(array('PortfolioHolder', 'Page'));
        } else {
            return $this->httpError(404);
        }
    }

    public function PortfolioPosts() {

        $tag = $this->getTagFromParams();
        if (isset($tag)) {
            return $tag->PortfolioPosts();
        } else {
            return PortfolioPost::get();
        }
    }

    public function StaffPages() {
        return StaffPage::get()->sort('RAND()');
    }
}
