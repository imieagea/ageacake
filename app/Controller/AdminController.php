<?php
App::uses('AppController', 'Controller');

class AdminController extends AppController {
	
	var $uses = array('Contenus','User','Fiche','Critere','CritereCategory','CritereValue');

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
			 if($this->Fiche->save($this->request->data)) {
			 	foreach ($this->request->data['criteres']['cb'] as $value)
			 	{
			 		$this->CritereValue->create();
			 		$this->CritereValue->set('fiche_id',$this->Fiche->id);
		 			$this->CritereValue->set('value',1);
		 			$this->CritereValue->set('critere_id',$value);
		 			$this->CritereValue->save();
	 			}
	 			foreach ($this->request->data['criteres']['text'] as $c => $value)
			 	{
			 		$this->CritereValue->create();
			 		$this->CritereValue->set('fiche_id',$this->Fiche->id);
		 			$this->CritereValue->set('value',$value);
		 			$this->CritereValue->set('critere_id',$c);
		 			$this->CritereValue->save();
	 			}
				$this->Session->setFlash(__('La fiche a bien été sauvegardée.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La fiche ne peut pas être sauvegardée.'));
			}
		}
		$this->CritereCategory->recursive = 3;
		$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null),'order'=>'CritereCategory.position ASC'));
		$this->set('criteres',$c);
	}

	public function view_fiche($id = null)
	{
		$this->Fiche->recursive = 2;
		$this->Fiche->id = $id;
		if (!$this->Fiche->exists()) {
			throw new NotFoundException(__('Fiche non trouvée'));
		}
		$this->set('fiche', $this->Fiche->read(null, $id));

		$this->CritereCategory->recursive = 2;
		$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null),'order'=>'CritereCategory.position ASC'));
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