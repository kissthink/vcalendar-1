<?php
class page_index extends Page {
    function init(){
        parent::init();
        $page=$this;

        // Adding a View and chaining example
        $this->add('H1')->set('Index page');
  
    }
}
