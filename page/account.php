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
		
		$f->addField('password', 'password', 'Passwort')->setAttr('maxlength', 30);
		$f->addField('password', 'password_confirm', 'Passwort bestätigen')->setAttr('maxlength', 30);
		
		$f->addSubmit();
		
		$f->onSubmit(function($f){
            if($f->get('password') != $f->get('password_confirm')) {
				$f->displayError('password_confirm', 'Passwörter stimmen nicht überein');
			}
                //throw $f->exception('Passwörter stimmen nicht überein')->setField('password_confirm');

            //$f->set('password',
            //    $f->api->auth->encryptPassword($form->get('password'),$form->get('email')));

            //$f->update();

            //$f->js()->hide('slow')->univ()->successMessage('Registered successfully')->execute();
            
        });
    }
}
