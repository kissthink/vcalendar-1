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
		
		// Add a column to set the password. 
		if($crud->grid){
		    // Format the column as a button, a click will open a popup.
            $crud->grid->addColumn('prompt','set_password','Passwort setzen');
            if($_GET['set_password'] && $_GET['value']){
                $auth = $this->add('UserAuth');
                $model = $auth->getModel()->loadData($_GET['set_password']);
				
				// ATK 4.2. adds hook for encryption to the model object
                //$enc_p = $auth->encryptPassword($_GET['value'],$model->get('email'));
                $model->set('password',$_GET['value'])->update();
                $this->js()->univ()->successMessage('Passwort wurde geändert für '.$model->get('email'))->execute();
            }
			else if ($_GET['set_password']) {
			    $this->js()->univ()->errorMessage('Passwort wurde nicht geändert')->execute();
			}
        }
    }
}
