<?php
use SilverStripe\Core\Config\Config;
use SilverStripe\CMS\Controllers\ContentController;
class PageController extends ContentController {

    /**
     * An array of actions that can be accessed via a request. Each array element should be an action name, and the
     * permissions or conditions required to allow the user to access it.
     *
     * <code>
     * array (
     *     'action', // anyone can access this action
     *     'action' => true, // same as above
     *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
     *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
     * );
     * </code>
     *
     * @var array
     */
    private static $allowed_actions = array();

    protected function init() {
        parent::init();

        // Note: you should use SS template require tags inside your templates
        // instead of putting Requirements calls here.  However these are
        // included so that our older themes still work

    }

    public function ClientTags() {
        return Client::get();
    }

    public function MediumTags() {
        return Medium::get();
    }
    public function ActiveMediums() {
        return $this->ActiveCategories("Medium");
    }
    public function ActiveClients() {
        return $this->ActiveCategories("Client");
    }

    public function ActiveCategories($category) {
        $categories = $category::get();
        $categoriesArrayList = new ArrayList();
        foreach ($categories as $category) {
            if ($category->PortfolioPosts()->First()) {
                $categoriesArrayList->push($category);
            }
        }
        return $categoriesArrayList;
    }

    public function ActiveStaffPages() {
        $staffPages = StaffPage::get()->filter(array('ShowInMenus' => 1));

        $alumniTeam = StaffTeam::get()->filter(array('Name' => 'Alumni'))->First();
        $alumniPages = $alumniTeam->StaffPages();

        $limitedStaffPages = $staffPages->subtract($alumniPages);

        return $limitedStaffPages->sort('LastName ASC');
    }

    public function AlumStaffPages() {
        $alumniTeam = StaffTeam::get()->filter(array('Name' => 'Alumni'))->First();
        return $alumniTeam->StaffPages();
    }
}
