<?php
class PageExtension extends DataExtension {

	public function ValidateUrl($url) {
		if (empty($url)) {
			return $url;
		} else if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
			$url = "http://" . $url;
		}

		return $url;
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
