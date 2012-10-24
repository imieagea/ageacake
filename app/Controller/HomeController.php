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
		$options['conditions'] = array('Category.slug' => 'a-la-une');
		$alaune = $this->Post->find('first',$options);
		$this->set('alaune', $alaune);
		
		$options['conditions'] = array(    'Category.slug' => 'texte-recrutement');
		$texte_recrutement = $this->Post->find('first',$options);
		$this->set('texte_recrutement', $texte_recrutement);
	}

}

?>