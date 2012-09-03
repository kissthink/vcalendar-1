<?php
class Model_User extends Model_Table {
    public $table='user';
	//public $title_field='first_name';
    function init(){
        parent::init();
        
		$this->addField('first_name');
		$this->addField('last_name');
        $this->addField('email');
		$this->addField('password');
        $this->addField('is_admin')->type('boolean');
		
		$this->addExpression('name','concat(first_name,\' \',last_name)');
		
		$this->hasMany('Property');
		
		$this->setConditions();
    }
	
	function setConditions(){
		$this->addCondition('is_admin',false);
    }
}