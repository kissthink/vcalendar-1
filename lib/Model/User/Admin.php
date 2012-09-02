<?php
class Model_User_Admin extends Model_User {
    
	function init(){
        parent::init();
		
		$this->addHook('beforeSave',$this);
    }
	
	
	function setConditions(){
		$this->addCondition('is_admin',true);
    }

	function beforeSave(){
		// set admin flag to true
		$this['is_admin'] = true;
	}
}