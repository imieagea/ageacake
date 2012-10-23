<?php
App::uses('AppController', 'Controller');

class AdminController extends AppController {
	
	public function beforeFilter()
	{
        $this->layout = 'admin';
		$this->set('title_for_layout', 'AGEA - Administration');
		parent::beforeFilter();
	}

	public function isAuthorized($user) {
	    if (isset($user['role']) && $user['role'] === 'admin') {
	        return true;
	    }

	    // Default deny
	    return false;
	}

	public function index()
	{

	}

}

?>