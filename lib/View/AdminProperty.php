<?php
/**
 * An admin can manage a property of a selected user with this view.
 */
class View_AdminProperty extends View {
    function init(){
        parent::init();

        $form = $this->add('Form');
		$field = $form->addField('dropdown', 'user_id', 'User');
		$field->setAttr('size', 5);
		$field->setModel('User');
		$field->setEmptyText('Bitte wählen ...')
			  ->js('change', $form->js()->submit());
		
		$propModel = $this->add('Model_Property');
		$propCrud = null;
        
		if($_GET["user_id"]){
            $propModel->setMasterField('user_id', $_GET['user_id']);
			$this->api->stickyGET('user_id');
        }
		else {
			$propModel->setMasterField('user_id', -1);
		}
		
		$propCrud = $this->add('CRUD');
        $propCrud->setModel($propModel);
		
		if ($_GET["user_id"]) {
			//$propCrud->js(true)->show()->execute();
		}
		else {
			$propCrud->js(true)->hide();
		}
        
        if($form->isSubmitted()) {
            $propCrud->js()->reload(array('user_id' => $form->get('user_id')))->execute();
        }
    }
}
