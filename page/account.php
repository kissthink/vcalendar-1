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
		
		$f = $p->prepareForm($cols, $m);
		
		$f->onSubmit(function($f) {
            if (!$f->get('password')) {
				return;
			}
             
            if ($f->get('password') != $f->get('password_confirm')) {
				$f->displayError('password_confirm', 'Passwörter stimmen nicht überein');
			}
			
			// ATK 4.2. adds hook for encryption to the model object
			$userModel = $f->api->auth->getModel()->loadData($f->api->auth->get('id'));
			$userModel->set('password',$f->get('password'))->update();
					 
			$newPage=$f->api->getDestinationURL('account');
            $f->js()->hide()->univ()->location($newPage)->execute();
        });
    }
	
	function prepareForm($cols, $m) {
		$f = $cols->addColumn(4)->add('Form');
		$f->addClass('stacked');
		$f->setModel($m, array('first_name', 'last_name'));
		
		$f->getElement('first_name')->disable();
		$f->getElement('last_name')->disable();
		
		$f->addField('password', 'password', 'Passwort')->setAttr('maxlength', 30);
		$f->addField('password', 'password_confirm', 'Passwort bestätigen')->setAttr('maxlength', 30);
		
		$f->addSubmit();
		
		return $f;
	}
}
