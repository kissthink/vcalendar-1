<?php
/**
 * An admin can manage a property of a selected user with this view.
 */
class View_Property extends View {
    function init(){
        parent::init();

		$cols = $this->add('Columns');
		
		// use jquery 12col - design 
        $form = $cols->addColumn(3)->add('Form');
		$propCrud = $cols->addColumn(9)->add('CRUD');
		
		// init select form
		$form->addClass('stacked');
		$field = $form->addField('dropdown', 'user_id', 'User');
		$field->setAttr('size', 5);
		$field->setModel('User');
		$field->js('change', $form->js()->submit());
		
		// init CRUD
		$propModel = $this->add('Model_Property');
		$propCrud->setModel($propModel);
		
		// user is selected
		if(isset($_GET["user_id"])){
            $propModel->setMasterField('user_id', $_GET['user_id']);
			$this->api->stickyGET('user_id');   
        }
		else {
			$propModel->setMasterField('user_id', -1);
			$propCrud->grid->destroy();
			$this->api->stickyForget('user_id');   
		}
 
        if($form->isSubmitted()) {
            $propCrud->js()->reload(array('user_id' => $form->get('user_id')))->execute();
        }
    }
}
