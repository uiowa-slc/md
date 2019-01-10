<?php

class PortfolioPostController extends PageController {
    public function NextPage() {
        $page = PortfolioPost::get()->filter(array(
            'ParentID' => $this->ParentID,
            'Date:LessThan' => $this->Date,
        ))->First();

        return $page;
    }
    public function PreviousPage() {
        $page = PortfolioPost::get()->filter(array(
            'ParentID' => $this->ParentID,
            'Date:GreaterThan' => $this->Date,
        ))->Last();

        return $page;
    }

}
