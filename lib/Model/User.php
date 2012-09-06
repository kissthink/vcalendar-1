<?php
/**
 * An user can have properties and can manage his properties.
 */
class Model_User extends Model_Table {
    public $table='user';

    function init(){
        parent::init();
        
		// fields
		$this->addField('first_name')->caption('Vorname')->mandatory('Vorname ist ein Pflichtfeld');
		$this->addField('last_name')->caption('Name')->mandatory('Name ist ein Pflichtfeld');
        $this->addField('email')->caption('E-Mail')->mandatory('E-Mail ist ein Pflichtfeld');
		$this->addField('password')->caption('Passwort')->mandatory(true);
        $this->addField('is_admin')->type('boolean').system(true);
		
		// expressions
		$this->addExpression('name', 'concat(first_name,\' \',last_name)')->caption('User');
		
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
		// make sure that admin flag is set to false
		$this['is_admin'] = false;
	}
}