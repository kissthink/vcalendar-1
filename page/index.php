<?php
class page_index extends Page {
    function init(){
        parent::init();

        $form = $this->add('Form',null,'LoginForm');
        $form->setFormClass('vertical');
        $form->addField('line','login');
        $form->addField('password','password');
        $form->addSubmit('Login');

        if($form->isSubmitted()){
            // Short-cuts
            $auth=$this->api->auth;
            $l=$form->get('login');
            $p=$form->get('password');

            // Manually encrypt password
            $enc_p = $auth->encryptPassword($p,$l);

            // Manually verify login
            if($auth->verifyCredentials($l,$enc_p)){
                // Manually log-in
                $auth->login($l);
                $form->js()->univ()->redirect('property')->execute();
            }
			else {
                $form->getElement('password')->displayFieldError('Incorrect login');
		    }
        }
    }
	
    function defaultTemplate(){
        return array('page/index');
    }
}
