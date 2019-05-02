<?php

use SilverStripe\Core\Extension;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Control\Email\Email;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Versioned\Versioned;
use SilverStripe\Control\RequestHandler;
use Silverstripe\Forms\Form;
use SilverStripe\View\Requirements;
use SilverStripe\Forms\HTMLEditor\TinyMCEConfig;
use SilverStripe\Admin\ModalController;
use SilverStripe\Forms\HTMLEditor\HTMLEditorConfig;
use SilverStripe\Core\Manifest\ModuleLoader;
use SilverStripe\Admin\CMSMenu;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Admin\LeftAndMain;
use SilverStripe\Control\Director;
use SilverStripe\Admin\AdminRootController;
use SilverStripe\Security\SecurityToken;
use SilverStripe\Core\Convert;
use SilverStripe\View\ArrayData;

class StaffPageControllerExtension extends Extension {

	private static $allowed_actions = array(
		'editProfile', 
		'EditProfileForm',
		'error'
	);

	private static $url_handlers = array(
		'edit//$action' => 'editProfile',
		'error//' => 'error'
	);
	public function init(){
		parent::init();
	}

	public function editProfile() {

		$member = Security::getCurrentUser();

		if(!$member){
			return Security::PermissionFailure($this->owner, 'You must be an M+D staff member to edit this profile page.');

		}

		$staffPage = $this->owner->dataRecord;
		$Data = array(
			'Saved' => $this->owner->getRequest()->getVar('saved')

		);

		if ($member->ID == $staffPage->Member()->ID) {
			
			//print_r(EmailAdmins::gatherStats());
			return $this->owner->customise($Data)->renderWith(array("StaffPage_Edit", "Page"));
		} else {
			
			//Create the relationship if this is the first time someone's tried editing their profile:


			if($member->Email == $staffPage->EmailAddress ){
				$staffPage->MemberID = $member->ID;
				$staffPage->write();
				if($staffPage->isPublished()){
					$staffPage->publish('Stage', 'Live');
				}

				return $this->owner->customise($Data)->renderWith(array("StaffPage_Edit", "Page"));
			}else{
				//Trying to edit someone else's profile or the profile relationship isn't set up right:
				$this->owner->redirect($this->owner->Link('error'));
			}
			
		}

	}

    /**
     * Gets the combined configuration of all LeftAndMain subclasses required by the client app.
     *
     * @return string
     *
     * WARNING: Experimental API
     */
    public function getCombinedClientConfig()
    {
        $combinedClientConfig = ['sections' => []];
        $cmsClassNames = CMSMenu::get_cms_classes(LeftAndMain::class, true, CMSMenu::URL_PRIORITY);

        // append LeftAndMain to the list as well
        $cmsClassNames[] = LeftAndMain::class;
        foreach ($cmsClassNames as $className) {
            $combinedClientConfig['sections'][] = Injector::inst()->get($className)->getClientConfig();
        }

        // Pass in base url (absolute and relative)
        $combinedClientConfig['baseUrl'] = Director::baseURL();
        $combinedClientConfig['absoluteBaseUrl'] = Director::absoluteBaseURL();
        $combinedClientConfig['adminUrl'] = AdminRootController::admin_url();

        // Get "global" CSRF token for use in JavaScript
        $token = SecurityToken::inst();
        $combinedClientConfig[$token->getName()] = $token->getValue();

        // Set env
        $combinedClientConfig['environment'] = Director::get_environment_type();
        $combinedClientConfig['debugging'] = LeftAndMain::config()->uninherited('client_debugging');

        return Convert::raw2json($combinedClientConfig);
    }
	/**
	 * Creates a form for Staff/Students/Alumni to edit the content of their Profile Page.
	 * @return Form object
	 */
	public function EditProfileForm() {
		Requirements::javascript('silverstripe/admin: thirdparty/jquery/jquery.js');
		Requirements::javascript('silverstripe/admin:thirdparty/jquery-entwine/dist/jquery.entwine-dist.js');
		Requirements::javascript('silverstripe/admin: client/dist/js/vendor.js');
		Requirements::javascript('silverstripe/admin: client/dist/js/bundle.js');
		// Requirements::javascript('silverstripe/admin: thirdparty/bootstrap/js/dist/util.js');
		// Requirements::javascript('silverstripe/admin: thirdparty/bootstrap/js/dist/collapse.js');
		//Requirements::css('silverstripe/admin: client/dist/styles/bundle.css');

		$clientConfig = '{
  			"sections": []}';

        Requirements::customScript("
            window.ss = window.ss || {};
            window.ss.config = " . $this->getCombinedClientConfig() . ";
        ");

	TinyMCEConfig::get('default')
	    ->setOptions([
	        'friendly_name' => 'Default CMS',
	        'priority' => '50',
	        'skin' => 'silverstripe',
	        'body_class' => 'typography',
	        'contextmenu' => "link image ssembed | cell row column deletetable",
	        'use_native_selects' => false,
	        'valid_elements' => "@[id|class|style|title],a[id|rel|rev|dir|tabindex|accesskey|type|name|href|target|title"
	            . "|class],-strong/-b[class],-em/-i[class],-strike[class],-u[class],#p[id|dir|class|align|style],-ol[class],"
	            . "-ul[class],-li[class],br,img[id|dir|longdesc|usemap|class|src|border|alt=|title|width|height|align|data*],"
	            . "-sub[class],-sup[class],-blockquote[dir|class],-cite[dir|class|id|title],"
	            . "-table[cellspacing|cellpadding|width|height|class|align|summary|dir|id|style],"
	            . "-tr[id|dir|class|rowspan|width|height|align|valign|bgcolor|background|bordercolor|style],"
	            . "tbody[id|class|style],thead[id|class|style],tfoot[id|class|style],"
	            . "#td[id|dir|class|colspan|rowspan|width|height|align|valign|scope|style],"
	            . "-th[id|dir|class|colspan|rowspan|width|height|align|valign|scope|style],caption[id|dir|class],"
	            . "-div[id|dir|class|align|style],-span[class|align|style],-pre[class|align],address[class|align],"
	            . "-h1[id|dir|class|align|style],-h2[id|dir|class|align|style],-h3[id|dir|class|align|style],"
	            . "-h4[id|dir|class|align|style],-h5[id|dir|class|align|style],-h6[id|dir|class|align|style],hr[class],"
	            . "dd[id|class|title|dir],dl[id|class|title|dir],dt[id|class|title|dir]",
	        'extended_valid_elements' => "img[class|src|alt|title|hspace|vspace|width|height|align|name"
	            . "|usemap|data*],iframe[src|name|width|height|align|frameborder|marginwidth|marginheight|scrolling],"
	            . "object[width|height|data|type],param[name|value],map[class|name|id],area[shape|coords|href|target|alt]"
	    ]);

	    $module = ModuleLoader::inst()->getManifest()->getModule('silverstripe/admin');
		TinyMCEConfig::get('default')
		    ->enablePlugins([
		        'contextmenu' => null,
		        'image' => $module->getResource('thirdparty/tinymce/plugins/image/plugin.js'),
		        'link' => $module->getResource('thirdparty/tinymce/plugins/link/plugin.js'),
		        // 'sslinkexternal' => $module->getResource('client/dist/js/TinyMCE_sslink-external.js'),
		        // 'sslinkemail' => $module->getResource('client/dist/js/TinyMCE_sslink-email.js'),
		    ])
		    ->setOption('contextmenu', 'link image ssembed inserttable | cell row column deletetable');

		// TinyMCEConfig::get('default')->disablePlugins('ssbuttons');
		// TinyMCEConfig::get('default')->removeButtons('sslink', 'ssmedia');
		TinyMCEConfig::get('default')->addButtonsToLine(2, 'image');

		$Member = Member::CurrentUser();

		if ($Member) {
			$MemberID = $Member->ID;
			$HTMLEditorButtons = array(
				'btnGrp-design',
				'btnGrp-lists',
			);

			//Students
			if ($this->owner->isStudent()) {
				$fields = new FieldList(
					new TextField('FirstName', '*First Name'),
					new TextField('Surname', '*Last Name'),
					new TextField('PortfolioURL', 'Portfolio'),
					new TextField('LinkedInURL', 'LinkedIn'),
					
					new TextField('TwitterHandle', 'Twitter'),
					new TextField('InstagramHandle', 'Instagram'),
					new TextField('GithubURL', 'Github'),
					new TextField("Major", "Major"),
					new HTMLEditorField("DegreeDescription", "Explain why you chose your degree."),
					new HTMLEditorField('Interests', 'Interests'),
					new HTMLEditorField('FavoriteProject', 'Favorite Project'),
					new HTMLEditorField("MDExperience", "What have you learned from your experience at M+D?"),
					new HTMLEditorField("TopStrengths", "Top five strengths"),
					new TextareaField("FavoriteQuote", "Favorite quote"),
					new HTMLEditorField("PostGraduation", "What do you hope to do after graduation?")
				);
			}

			//Alumni
			if ($this->owner->inTeam('Alumni')) {
				$fields = new FieldList(
					new TextField('FirstName', 'First Name'),
					new TextField('Surname', 'Last Name'),
					new TextField('PortfolioURL', 'Portfolio'),
					new TextField('LinkedInURL', 'LinkedIn'),
					new TextField('TwitterHandle', 'Twitter'),
					new TextField('InstagramHandle', 'Instagram'),
					new HTMLEditorField('Interests', 'Interests'),
					new HTMLEditorField('FavoriteProject', 'Favorite Project'),

					new TextField('GithubURL', 'Github'),
					new TextField("YearGraduated", "Year Graduated"),
					new TextField("EmploymentLocation", "Where are you employed?"),
					new TextField("CurrentPosition", "What is your current position title?"),
					new TextField("EmploymentLocationURL", "Your employer's website"),
					new HTMLEditorField("FavoriteMemory", "What is your favorite memory of M+D?"),
					new HTMLEditorField("Advice", "What advice would you give to current students?")
				);
			}

			//Pro Staff
			if ($this->owner->inTeam('Professional Staff')) {
				$fields = new FieldList(
					new TextField('FirstName', 'First Name'),
					new TextField('Surname', 'Last Name'),
					new TextField('Position', 'Position, Location (e.g., "Assistant Director for Marketing, IMU"'),
					new TextField('LinkedInURL', 'LinkedIn'),
					new TextField('PortfolioURL', 'Portfolio'),
					new TextField('TwitterHandle', 'Twitter'),
					new TextField('InstagramHandle', 'Instagram'),
					new HTMLEditorField('Interests', 'Interests'),
					new HTMLEditorField('FavoriteProject', 'Favorite Project'),

					new TextField('GithubURL', 'Github'),
					new TextField("Phone", "Phone(xxx-xxx-xxxx)"),
					new HTMLEditorField("EnjoymentFactors", "What do you enjoy about working at M+D?"),
					new TextField("JoinDate", "When did you join the M+D staff?"),
					new HTMLEditorField("Background", "Background & Education")
				);
			}


			$saveAction = new FormAction('SaveProfile', 'Save Changes');
			$saveAction->addExtraClass('radius');

			$actions = new FieldList($saveAction);
			$validator = new RequiredFields('FirstName', 'Surname', 'Email');

			$Form = new Form($this->owner, 'EditProfileForm', $fields, $actions, $validator);

			//Information must be loaded from both tutor and member because member stores a member/tutor's password
			$Form->loadDataFrom($Member->data());
			$Form->loadDataFrom($this->owner->data());

			//Return the form
			return $Form;
		} else {
			$message = "<a href='Security/login'>You must be logged in to edit your profile. </a>";
			return $message;
		}
	}

	public function error($message = 'Unknown Error'){

		$messageHTML = 
		$Data = new ArrayData([
                'ErrorMessage' =>  $message,
            ]);
		//print_r(EmailAdmins::gatherStats());
		return $this->owner->renderWith(array("StaffPage_Error", "Page"));
		// return $this->owner->customise($Data)->renderWith(array("StaffPage_Error", "Page"));

	}

	// public function Saved(){
	// 	return $this->getRequest()->getVar('saved');
	// }

    public function Modals() 
    {
        return ModalController::create($this, "Modals");
    }
	/**
	 * Saves Edit Staff Page Form into StaffPage and Member.
	 * @param $data, $form
	 * @return RedirectBack
	 */
	public function SaveProfile($data, $form) {

		$Member = Member::CurrentUser();
		$MemberID = $Member->ID;

		$Staff = StaffPage::get()->filter(array('MemberID' => $MemberID))->first();

		// Save into the member dataobject.
		$memberFieldList = array(
			"FirstName",
			"Surname"
		);
		$formData = $form->getData();

		$form->saveInto($Staff);

		/*Preserve this code, for it works the magic of SilverStripe 3 publishing: */
		$Staff->writeToStage('Stage');
		$Staff->publish("Stage", "Live");
		Versioned::set_stage('Live');
		$Staff->write();

		return $this->owner->redirect($this->owner->Link('edit/?saved=1'));
	}


}