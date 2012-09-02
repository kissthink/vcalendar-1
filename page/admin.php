<?php
class page_admin extends Page {
    function init(){
        parent::init();
        $page=$this;

		$tabs=$this->add('Tabs');
		
		$tab=$tabs->addTab('Users');
        $tab->add('CRUD')->setModel('User');
		
		$tab=$tabs->addTab('Admins');
        $tab->add('CRUD')->setModel('User_Admin');
		
    }
}
