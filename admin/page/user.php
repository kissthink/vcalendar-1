<?php
/**
 * Admin can manage the users on this page.
 */
class page_user extends Page {
    function init(){
        parent::init();
        $page = $this;
		
		$page->add('H1')->set('Benutzer verwalten');
        $crud = $page->add('CRUD');
		$crud->setModel('User');
		
		if($crud->grid){
            $crud->grid->addColumn('prompt','set_password','Passwort setzen');
            if($_GET['set_password'] && $_GET['value']){
                $auth = $this->add('UserAuth');
                $model = $auth->getModel()->loadData($_GET['set_password']);
                $enc_p = $auth->encryptPassword($_GET['value'],$model->get('email'));
                $model->set('password',$enc_p)->update();
                $this->js()->univ()->successMessage('Passwort wurde geändert für '.$model->get('email'))->execute();
            }
			else {
			    $this->js()->univ()->errorMessage('Passwort wurde nicht geändert')->execute();
			}
        }
    }
}
