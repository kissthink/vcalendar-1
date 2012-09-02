<?php
class Model_User extends Model_Table {
    public $table='user';
    function init(){
        parent::init();
        
		$this->addField('first_name');
		$this->addField('last_name');
        $this->addField('email');
		$this->addField('password');
        $this->addField('is_admin')->type('boolean');
		
		$this->setConditions();
    }
	
	function setConditions(){
		$this->addCondition('is_admin',false);
    }
}