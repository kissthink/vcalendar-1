<?php
/**
 * Admin can manage all other admins.
 */
class page_admin_admin extends Page {
    function init(){
        parent::init();
        $page = $this;

		// Tab Admins
        $page->add('CRUD')->setModel('User_Admin');
    }
}
