<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\GridField\GridFieldDataColumns;
use SilverStripe\Lumberjack\Model\Lumberjack;
class StaffHolderPageExtension extends DataExtension {

	private static $db = array(
		'AlumniContent' => 'HTMLText'


	);

	public function updateCMSFields(FieldList $fields){
		//$fields->addFieldToTab('Root.Main', new HTMLEditorField('AlumniContent', 'Content to be displayed on the alumni page.'));

        $fields->removeByName('Content');
        $fields->removeByName('Content');
        $fields->removeByName('Widgets');
        $fields->removeByName('Dependent');
        $fields->removeByName('LayoutType');
        $grid = $fields->dataFieldByName('ChildPages');

        $config = $grid->getConfig();
        $dataColumns = $config->getComponentByType(GridFieldDataColumns::class);

        $dataColumns->setDisplayFields([
            'Title' => 'Title',
            'LastEdited' => 'Last Edited'
        ]);

        $list = $grid->getList();

        $sortedList = $list->sort('LastEdited DESC');

        $grid->setList($sortedList);
        $grid->setTitle('Staff Members');
        // $grid->setName('StaffPages');



        $fields->addFieldToTab('Root.Main', $grid);
        // $fields->removeByName('ChildPages');
	}

}
