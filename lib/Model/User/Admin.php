<?php
/**
 * An admin can manage users and the properties of an user.
 */
class Model_User_Admin extends Model_User {
    
	function init(){
        parent::init();
    }
	
	/**
	 * @Override
	 */
	function setConditions(){
		$this->addCondition('is_admin', true);
    }

	/**
	 * @Override
	 */
	function beforeSave(){
		// make sure that admin flag is set to true
		$this['is_admin'] = true;
	}
}