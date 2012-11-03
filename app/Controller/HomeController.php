<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {
	
	var $uses = array('Post','Category','CritereCategory','Fiche');

	var $docTypes = array('application/pdf','application/msword');

	public function beforeFilter()
	{
		$this->Auth->allow('index','deposer');
		parent::beforeFilter();
	}


	public function index()
	{
		$this->set('title_for_layout', 'AGEA - Accueil');
		$options['conditions'] = array('Category.slug' => 'a-la-une');
		$alaune = $this->Post->find('first',$options);
		$this->set('alaune', $alaune);
		
		$options['conditions'] = array( 'Category.slug' => 'texte-recrutement');
		$texte_recrutement = $this->Post->find('first',$options);
		$this->set('texte_recrutement', $texte_recrutement);
	}

	public function deposer()
	{
		if ($this->request->is('post')) {
			$this->Fiche->create();
			$this->set($this->request->data);
			if(isset($this->request->data['Fiche']['cv']))
			{
				var_dump($this->request->data['Fiche']['cv']);
			}

		}

		$this->CritereCategory->recursive = 3;
		$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null,'CritereCategory.public'=>1),'order'=>'CritereCategory.position ASC'));
		$this->set('criteres',$c);
	}

}

?>