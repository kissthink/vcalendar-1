<?php
class page_property extends Page {
    function init(){
        parent::init();
		$this->api->auth->check();

        $page = $this;
		$page->add('H1')->set('Welcome to property page');
    }
}
