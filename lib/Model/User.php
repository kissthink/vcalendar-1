<?php
/**
 * An user can have properties and can manage his own properties.
 */
class Model_User extends Model_Table {
    public $table='user';

    function init(){
        parent::init();
        
		// fields
		$this->addField('first_name')->caption('Vorname');
		$this->addField('last_name')->caption('Name');
        $this->addField('email')->caption('E-Mail');

        $this->addField('is_admin')->type('boolean');
		
		// expressions
		$this->addExpression('name', 'concat(first_name,\' \',last_name)')->caption('User')->visible(false);
		
		// relations
		$this->hasMany('Property');
		
		// conditions
		$this->setConditions();
		
		// hooks
		$this->addHook('beforeSave', $this);
    }
	
	function setConditions(){
		$this->addCondition('is_admin', false);
    }
	
	function beforeSave(){
		$this['is_admin'] = false;
		
		if (!filter_var($this['email'], FILTER_VALIDATE_EMAIL)) {
			throw $this->exception('E-Mail ist ungültig');
		}
	}
}