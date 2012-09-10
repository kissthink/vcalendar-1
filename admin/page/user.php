<?php
/**
 * Admin can manage the users on this page.
 */
class page_user extends Page {
    function init(){
        parent::init();
        $page = $this;
		
		$page->add('H1')->set('Benutzer verwalten');
        $page->add('CRUD')->setModel('User');
    }
}
