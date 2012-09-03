<?php
class page_admin extends Page {
    function init(){
        parent::init();
        $page=$this;

		$tabs=$this->add('Tabs');
		
		// Tab Users
		$tab=$tabs->addTab('Users');
        $tab->add('CRUD')->setModel('User');
		
		// Tab Properties
		$tab=$tabs->addTab('Properties');
		$users=$tab->add('Model_User');
		$userList=$users->getRows(array('first_name', 'last_name'));
		$form=$tab->add('Form');
		$field=$form->addField('dropdown','User')->setModel('User');
		
        //$tab->add('CRUD')->setModel('User');
		
		// Tab Admins
		$tab=$tabs->addTab('Admins');
        $tab->add('CRUD')->setModel('User_Admin');
		
    }
}
