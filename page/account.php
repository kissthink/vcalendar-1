<?php
class page_account extends Page {
    function init(){
        parent::init();
        $this->api->auth->check();
		$p = $this;

        $m = $this->add('Model_User');
		$m->loadData($p->api->auth->get('id'));
        $m->getField('email')->system(true);
		
		$cols = $p->add('Columns');
		
        $f = $cols->addColumn(4)->add('Form');
		$f->addClass('stacked');
		$f->setModel($m, array('first_name', 'last_name'));
		
		$f->getElement('first_name')->disable();
		$f->getElement('last_name')->disable();
		
		$f->addSubmit();
    }
}
