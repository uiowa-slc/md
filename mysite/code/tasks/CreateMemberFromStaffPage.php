<?php
use Silverstripe\Dev\BuildTask;
use Silverstripe\Security\Member;
class CreateMemberFromStaffPage extends BuildTask {
 
    protected $title = 'Create Members from StaffPages';
 
    protected $description = 'Create Member associated with StaffPage, if none exist, and/or update the StaffPage memberID';
 
    protected $enabled = true;
 
    function run($request) {
        $staffPages = StaffPage::get(); //get all staff pages
        foreach($staffPages as $staff){
            $memberID = $staff->MemberID;
            $email = $staff->EmailAddress;
            // print_r($email);
            if($memberID == 0){
                $memberTest = Member::get()->filter(array('Email' => $email))->First();
                // print_r($memberTest);
                if(!$memberTest){
                    $member = new Member();
                    $member->Email = $staff->EmailAddress;
                    $staff->MemberID = $member->ID;
                    $member->write();

                    $staff->write();
                    if($staff->isPublished()){
                        $staff->publish('Stage', 'Live');
                    }
                    print_r('<li>created member and updated staff memberID</li>');
                }
                else{
                    $existingMember = Member::get()->filter(array('Email' => $email))->First();
                    // print_r($existingMember->ID);
                    $staff->MemberID = $existingMember->ID;
                    $staff->write();
                    if($staff->isPublished()){
                        $staff->publish('Stage', 'Live');
                    }
                    print_r('<li>updated staff memberID</li>');
                }
            }
            else{
                $existingMember = Member::get()->filter(array('Email' => $email))->First();
                $staff->MemberID = $existingMember->ID;
                print_r('<li>updated staff member ID</li>');
            }
            
        }
    }
}