<?php
/**
 * An user has one or many properties. A property is a flat or a house.
 */
class Model_Property extends Model_Table {
    public $table='property';
	
    function init(){
        parent::init();
        
		// fields
		$this->addField('name')->mandatory('Name ist ein Pflichtfeld');
		
		// relations
		$this->hasOne('User');
		
		// conditions
		$this->setConditions();
    }
	
	function setConditions(){
    }
}