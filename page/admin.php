<?php
class page_admin extends Page {
    function init(){
        parent::init();
        $page=$this;

		$tabs=$this->add('Tabs');
		
		// Tab Users
		$tab=$tabs->addTab('Users');
        $tab->add('CRUD')->setModel('User');
		
		// Tab Properties
		$tab=$tabs->addTab('Properties');
		$form=$tab->add('Form');
		$field=$form->addField('dropdown', 'user_id', 'User');
		$field->setModel('User');
		$field->setEmptyText('Select ...')
			  ->js('change', $form->js()->submit());
		
		
		$propModel=$this->add('Model_Property');
        
		if($_GET["user_id"]){
            $propModel->setMasterField('user_id', $_GET['user_id']);
			$this->api->stickyGET('user_id');
        }
		else {
			$propModel->setMasterField('user_id', -1);
		}
		
        $propCrud=$tab->add('CRUD');
		
        $propCrud->setModel($propModel);
        if($form->isSubmitted()){
             $propCrud->js()->reload(array('user_id' => $form->get('user_id')))->execute();
        }
		
		
        //$tab->add('CRUD')->setModel('User');
		
		// Tab Admins
		$tab=$tabs->addTab('Admins');
        $tab->add('CRUD')->setModel('User_Admin');
		
    }
}
