<?php
/**
 * Admin can manage the users on this page. One admin can manage all admins.
 */
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
        $tab->add('View_AdminProperty');
		
		// Tab Admins
		$tab=$tabs->addTab('Admins');
        $tab->add('CRUD')->setModel('User_Admin');
    }
}
