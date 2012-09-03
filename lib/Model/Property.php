<?php
class Model_Property extends Model_Table {
    public $table='property';
    function init(){
        parent::init();
        
		$this->addField('name');
		
		$this->hasOne('User');
		
		$this->setConditions();
    }
	
	function setConditions(){
    }
}