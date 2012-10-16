<?php
/**
 * Admin can manage the properties of an user on this page.
 */
class page_property extends Page {
    function init(){
        parent::init();
        $page = $this;
		
		$page->add('H1')->set('Objekte verwalten');
        $page->add('View_Property');
    }
}
