<?php
/**
 * An admin can manage a property of a selected user with this view.
 */
class View_Admin_Property extends View {
    function init(){
        parent::init();

		$cols = $this->add('Columns');
		
		// use jquery 12col - design 
        $form = $cols->addColumn(3)->add('Form');
		$form->addClass('stacked');
		$field = $form->addField('dropdown', 'user_id', 'User');
		$field->setAttr('size', 5);
		$field->setModel('User');
		$field->js('change', $form->js()->submit());
		
		$propModel = $this->add('Model_Property');
		$propCrud = null;
        
		if($_GET["user_id"]){
            $propModel->setMasterField('user_id', $_GET['user_id']);
			$this->api->stickyGET('user_id');
        }
		else {
			$propModel->setMasterField('user_id', -1);
		}
		
		// use jquery 12col - design 
		$propCrud = $cols->addColumn(9)->add('CRUD');
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
