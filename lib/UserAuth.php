<?php

class UserAuth extends BasicAuth {
    /** 
     * Initialize our auth. Set model and password encryption 
     */
    function init(){
        parent::init();
        $this->setModel('Model_User');
        $this->getModel()->addField('password')->system(true);

        $this->usePasswordEncryption('sha256/salt');
    }

    /** 
     * Do not show form, simply redirect to index page, if not authorized 
     */
    function check(){
        if (!$this->isLoggedIn()) {
            $this->api->redirect('/');
        }
    }

    /** 
     * Password validation routine, now using the model. 
     */
    function verifyCredentials($email,$password){
        $model = $this->getModel()->loadBy('email',$email);
        if (!$model->isInstanceLoaded()) {
            return false;
        }
        if ($password == $model->get('password')) {
            $this->addInfo($model->get());
            unset($this->info['password']);
            return true;
        } 
        else { 
            return false;
        }
    }
}