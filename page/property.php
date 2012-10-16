<?php
/**
 * An registered user can manage his own properties.
 */
class page_property extends Page {
    function init(){
        parent::init();
		$this->api->auth->check();
        $page = $this;
		
		// use jquery 12col - design 
		$cols = $page->add('Columns');
        $selectForm = $cols->addColumn(3)->add('Form');
		$editForm = $cols->addColumn(9)->add('Form');
		
		$this->initSelectForm($page, $selectForm);
		
		// user is selected
		if(isset($_GET['property_id'])){
		    $this->initEditForm($page, $editForm);
        }
		else {
			//$editForm->destroy();
		}
		
		if($selectForm->isSubmitted()) {
			$editForm->js()->reload(array('property_id' => $selectForm->get('property_id')))->execute();
		}
    }
	
	function initSelectForm($page, $selectForm) {
	    $selectModel = $page->add('Model_Property');
		$selectModel->setMasterField('user_id', $page->api->auth->get('id'));
		$selectForm->addClass('stacked');
		$field = $selectForm->addField('dropdown', 'property_id', 'Objekt auswählen');
		$field->setAttr('size', 5);
		$field->setModel($selectModel);
		$field->js('change', $selectForm->js()->submit());
	}
	
	function initEditForm($page, $editForm) {
	    $editModel = $page->add('Model_Property');
        $editModel->setMasterField('id', $_GET['property_id']);
		$editModel->loadAny();
		$page->api->stickyGET('property_id');   
		$editForm->setModel($editModel, array('name'));
	}
}
