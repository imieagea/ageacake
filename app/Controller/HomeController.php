<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {
	
	var $uses = array('Post');

	public function beforeFilter()
	{
		$this->Auth->allow('index');
		parent::beforeFilter();
	}


	public function index()
	{
		$this->set('title_for_layout', 'AGEA - Accueil');

	}

}

?>