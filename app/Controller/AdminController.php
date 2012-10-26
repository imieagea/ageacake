<?php
App::uses('AppController', 'Controller');

class AdminController extends AppController {
	
	var $uses = array('Contenus','User','Fiche','Critere','CritereCategory');

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

	public function fiches()
	{
		if($this->request->is('post'))
		{
			$this->paginate = array(
	        'condition' => array('Fiche.status ' => $this->data['status'])
	        );
		}
		$this->Fiche->recursive = 0;
		$this->set('fiches',$this->paginate('Fiche'));
	}

	public function criteres()
	{
		$this->Critere->recursive = 0;
		$this->set('criteres',$this->paginate('Critere'));
	}

	public function add_fiche()
	{
		if ($this->request->is('post')) {
			$this->Fiche->create();
			$this->Fiche->set($this->request->data);
			var_dump($this->request->data->critetes);
			/*if ($this->Fiche->save()) {
				$this->Session->setFlash(__('The critere has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The critere could not be saved. Please, try again.'));
			}*/
		}
		$this->CritereCategory->recursive = 2;
		$c = $this->CritereCategory->find('all',array('conditions'=>array('ParentCategory.parent_id'=>null),'order'=>'CritereCategory.position ASC'));
		$this->set('criteres',$c);
	}

	public function add_critere()
	{
		if ($this->request->is('post')) {
			$this->Critere->create();
			if ($this->Critere->save($this->request->data)) {
				$this->Session->setFlash(__('The critere has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The critere could not be saved. Please, try again.'));
			}
		}
		$critereCategories = $this->Critere->CritereCategory->find('list');
		$this->set(compact('critereCategories'));
	}

	public function add_critere_category()
	{
		if ($this->request->is('post')) {
			$this->CritereCategory->create();
			if ($this->CritereCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The critere category has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The critere category could not be saved. Please, try again.'));
			}
		}
		$parentCategories = $this->CritereCategory->ParentCategory->find('list');
		$this->set(compact('parentCategories'));
	}

}

?>