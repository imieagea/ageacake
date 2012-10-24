<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {
	
	var $uses = array('Post','Category');

	public function beforeFilter()
	{
		$this->Auth->allow('index');
		parent::beforeFilter();
	}


	public function index()
	{
		$this->set('title_for_layout', 'AGEA - Accueil');
		$joins = array(
           array('table'=>'categories', 
                 'alias' => 'c',
                 'type'=>'inner',
                 'conditions'=> array(
                 'c.slug'=>'a-la-une'
           )));
		$alaune = $this->Post->find('first',array('joins'=>$joins));
		var_dump($alaune);

	}

}

?>