<?php
/**
 * Consult documentation on http://agiletoolkit.org/learn 
 */
class ApiAdmin extends ApiFrontend {

    public $is_admin=true;

    function init(){
        parent::init();
        // Keep this if you are going to use database on all pages
        $this->dbConnect();
        $this->requires('atk','4.2.0');
		
		$this->add('Logger');
		$this->debug=false;

        // This will add some resources from atk4-addons, which would be located
        // in atk4-addons subdirectory.
		// Notice: This will add the lib folder of the subdirectory 'admin', too.
		$this->addLocation('..',array(
                    'php'=>array(
                        'lib',
                        'atk4-addons/mvc',
                        'atk4-addons/misc/lib',
                        )
                    ))
            ->setParent($this->pathfinder->base_location);
		
        // A lot of the functionality in Agile Toolkit requires jUI
        $this->add('jUI');

        // Initialize any system-wide javascript libraries here
        // If you are willing to write custom JavaScritp code,
        // place it into templates/js/atk4_univ_ext.js and
        // include it here
        $this->js()
            ->_load('atk4_univ')
            ->_load('ui.atk4_notify');
		
        // Allow user: "admin", with password: "demo" to use this application
        $auth = $this->add('BasicAuth');
		$auth->setModel('User_Admin');
		$auth->check();
		//->allow('admin','demo')->check();
			
        // This method is executed for ALL the peages you are going to add,
        // before the page class is loaded. You can put additional checks
        // or initialize additional elements in here which are common to all
        // the pages.

        // Menu:

        // If you are using a complex menu, you can re-define
        // it and place in a separate class
		
        $this->add('Menu',null,'Menu')
			->addMenuItem('user','Benutzer')
			->addMenuItem('admin','Admins')
			->addMenuItem('property','Objekte')
			->addMenuItem('logout', 'Abmelden');

        //$this->addLayout('UserMenu');
    }
}
