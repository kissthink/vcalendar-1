<?php
/**
 * Admin can manage the users on this page.
 */
class page_admin_user extends Page {
    function init(){
        parent::init();
        $page = $this;
		
        $page->add('CRUD')->setModel('User');
    }
}
