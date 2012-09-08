<?php
/**
 * Admin can manage the properties of an user on this page.
 */
class page_admin_property extends Page {
    function init(){
        parent::init();
        $page = $this;
		
        $page->add('View_Admin_Property');
    }
}
