<?php
class StaffPageExtension extends DataExtension {
  
    private static $belongs_many_many = array(
        'Roles' => 'Role'
    );    
}