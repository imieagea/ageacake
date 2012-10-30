<?php
App::uses('AppController', 'Controller');

class AdminController extends AppController {
	
	var $uses = array('Contenus','User','Fiche','Critere','CritereCategory','CritereValue','Post','Category');

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
			$this->Fiche->set('statut','validated');
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
		$critereCategories = $this->CritereCategory->find('list');
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
		$parentCategories = $this->CritereCategory->find('list');
		$this->set(compact('parentCategories'));
	}

	public function critere_category()
	{
		$this->CritereCategory->recursive = 1;
		$this->set('categories',$this->paginate('CritereCategory'));
	}

	public function actualites()
	{
		$this->paginate = array(
		    'joins' => array(
		    	array(
		            'alias' => 'cat',
		            'table' => 'categories',
		            'type' => 'INNER',
		            'conditions' => '`Post`.`category_id` = `cat`.`id`'
		        ),
		        array(
		            'alias' => 'ParentCategory',
		            'table' => 'categories',
		            'type' => 'INNER',
		            'conditions' => array('`ParentCategory`.`id` = `cat`.`parent_id`','`ParentCategory`.`slug` LIKE'=>'%actualites%')
		        )
		    )
		);
		$this->Post->recursive = 1;
		$this->set('actus',$this->paginate('Post'));

	}

	public function edit_fiche($id=null)
	{
		if(!empty($id))
		{
			if ($this->request->is('post')) {
				$this->Fiche->create();
				$this->Fiche->set('statut','validated');
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

				$this->set('fiche',$this->Fiche->read(null,$id));

				$this->CritereCategory->recursive = 3;
				$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null),'order'=>'CritereCategory.position ASC'));
				$this->set('criteres',$c);
			}
		
	}

	public function add_actualite()
	{
		if ($this->request->is('post')) {
			$this->Post->create();
			$this->Post->set('slug',$this->slugify($this->request->data['Post']['titre']));
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('L\'actualité à bien été enregistrée.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer l\'actualité'));
			}
		}
		$categories = $this->Category->find('list');
		$this->set(compact('categories'));
	}

	public function actualites_category()
	{
		$this->Category->recursive = 0;
		$this->set('categories',$this->paginate('Category'));
	}

	public function add_actualite_category()
	{
		$this->Category->recursive = -1;
		
		if ($this->request->is('post')) {
			$this->Category->create();
			$this->Category->set('slug',$this->slugify($this->request->data['Category']['nom']));
			if ($this->Category->save($this->request->data)) { 
				$this->Session->setFlash(__('La catégorie a bien été créée.'));
				//$this->redirect(array('action' => 'actualite_category'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer l\'actualité'));
			}
		}

		$parentCategories = $this->Category->find('list');
		$this->set(compact('parentCategories'));
	}

	public function alaune()
	{
		$this->Post->recursive = 1;
		$this->Post->find('all',array('conditions'=>array('Category.slug'=>'a-la-une')));
	}

	public function contenus()
	{
		$this->Contenus->recursive = 1;
		$this->set('pages',$this->paginate('Contenus'));
	}

	public function edit_contenus($id=null)
	{
		if ($this->request->is('post')) {
			$this->Contenu->id = $id;
			if ($this->Contenu->save($this->request->data)) { 
				$this->Session->setFlash(__('La page à bien été enregistrée.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer la page'));
			}
		}
	}

	public function edit_actualite($id=null)
	{
		if ($this->request->is('post')) {
			$this->Post->id = $id;
			if ($this->Post->save($this->request->data)) { 
				$this->Session->setFlash(__('L\'actualité à bien été mise à jour.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer la page'));
			}
		}
	}

	public function bruissements()
	{
		$this->Post->recursive = 1;
		//$b = $this->Post->find('all',array('conditions'=>array('Category.slug'=>'bruissements')));
		$this->set('bruissements',$this->paginate('Post',array('Category.slug LIKE'=>'%bruissements%')));
	}

	public function add_bruissement()
	{
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) { 
				$this->Session->setFlash(__('Le bruissement a été créé.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer la page'));
			}
		}
	}

}

?>