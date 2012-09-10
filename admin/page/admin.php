<?php
/**
 * Admin can manage all other admins.
 */
class page_admin extends Page {
    function init(){
        parent::init();
        $page = $this;

		$page->add('H1')->set('Administratoren verwalten');
        $page->add('CRUD')->setModel('User_Admin');
    }
}
