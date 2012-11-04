<?php
App::uses('AppController', 'Controller');

//Status
//	new
//	validated
//	refused


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
$this->set('fiches',$this->paginate('Fiche',  array('Fiche.statut' => 'new')   ));
	}

	public function fiches()
	{

	if(isset($this->params['url']['avalider'])){
	
	if($this->request->is('post'))
		{
			$this->paginate = array(
	        'condition' => array('Fiche.statut' => 'new')
	        );
		}
		//var_dump($this->paginate);
	$this->Fiche->recursive = 0;
		$this->set('fiches',$this->paginate('Fiche',  array('Fiche.statut' => 'new')   ));
		}else{
			if($this->request->is('post'))
		{
			$this->paginate = array(
	        'condition' => array('Fiche.statut ' => $this->data['status'])
	        );
		}
		$avalider=0;
		$f =$this->Fiche->find('all');
		foreach($f as $fiche){
			if($fiche['Fiche']['statut']=='new'){
			$avalider++;
			}
		}
		$this->set('avalider',$avalider);
		//var_dump($avalider);
		$this->Fiche->recursive = 0;
		$this->set('fiches',$this->paginate('Fiche'));
		}
		
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
			
			$authTypes = array('application/pdf','application/msword');

			if(isset($this->request->data['Fiche']['cv']))
			{
				$fiche = $this->Fiche->read(null,$id);
				
				$cv = $this->request->data['Fiche']['cv'];
				//var_dump($this->request->data);
				if (in_array($cv['type'], $authTypes)) {
					$chemin_destination = ROOT.'\app\webroot\cv\\';
					$name = AppController::slugify($cv['name'].microtime());
					
					$path_parts = pathinfo($cv['name']);
					//var_dump($cv['tmp_name']);
					$ext = $path_parts['extension'];
					$this->Fiche->set('pdf',$name.'.'.$ext);

					move_uploaded_file($cv['tmp_name'], $chemin_destination.$name.'.'.$ext);
					

	 			}else
	 			{
	 				$this->Session->setFlash(__('La pièce jointe n\'a pas été prise en compte'));
	 			}
			}
			$this->Fiche->set($this->request->data);
			 if($this->Fiche->save()) {
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

		if ($this->request->is('post')) {
			$this->Fiche->read(null, $id);
			$this->Fiche->set('statut','validated');
			
			$authTypes = array('application/pdf','application/msword');

			if(!empty($this->request->data['Fiche']['cv']['name']))
			{
				$fiche = $this->Fiche->read(null,$id);
				//var_dump($this->request->data);
				if ($fiche['Fiche']['pdf']!='') {
				//var_dump($fiche['Fiche']['pdf']);
					unlink(ROOT.'\app\webroot\cv\\'.$fiche['Fiche']['pdf']);
				}
				$cv = $this->request->data['Fiche']['cv'];
				//var_dump($this->request->data);
				if (in_array($cv['type'], $authTypes)) {
					$chemin_destination = ROOT.'\app\webroot\cv\\';
					$name = AppController::slugify($cv['name'].microtime());
					
					$path_parts = pathinfo($cv['name']);
					//var_dump($cv['tmp_name']);
					$ext = $path_parts['extension'];
					$this->Fiche->set('pdf',$name.'.'.$ext);

					move_uploaded_file($cv['tmp_name'], $chemin_destination.$name.'.'.$ext);
					

	 			}else
	 			{
	 				$this->Session->setFlash(__('La pièce jointe n\'a pas été prise en compte'));
	 			}
			}
			$this->Fiche->set($this->request->data);
			 if(!empty($this->request->data['rejected']))
			 {
			 	$this->Fiche->set('statut','rejected');
			 }else
			 {
			 	$this->Fiche->set('statut','validated');
			 }
			 if($this->Fiche->save()) {
			 	$this->CritereValue->deleteAll(array('CritereValue.fiche_id' => $id), false);
			 	//var_dump($this->request->datac);
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
				$this->Session->setFlash(__('La fiche a bien été mise à jour.'));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La fiche ne peut pas être sauvegardée.'));
			}
		}
		$this->CritereCategory->recursive = 3;
		$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null),'order'=>'CritereCategory.position ASC'));
		$this->set('criteres',$c);

		if (!$this->Fiche->exists()) {
			throw new NotFoundException(__('Fiche non trouvée'));
		}
		$this->set('fiche', $this->Fiche->read(null, $id));

		$this->CritereCategory->recursive = 2;
		$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null),'order'=>'CritereCategory.position ASC'));
		$this->set('criteres',$c);
	}
	
	public function view_actualite($id = null)
	{
if ($this->request->is('post')) {
			$this->Post->id = $id;
			$this->Post->read(null,$id);
			$this->Post->set('slug',AppController::slugify($this->request->data['Post']['titre']));
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('L\'actualité à bien mise à jour.'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer l\'actualité'));
			}
		}
		$this->set('actu', $this->Post->read(null, $id));
		$options = array(
		    'joins' => array(
		        array(
		            'alias' => 'ParentCategory',
		            'table' => 'categories',
		            'type' => 'INNER',
		            'conditions' => array('`ParentCategory`.`id` = `Category`.`parent_id`','`ParentCategory`.`slug`'=>'actualites')
		        )
		    )
	
		);
$categories = $this->Category->find('list',$options);
		$this->set(compact('categories'));
	}
public function view_contenu($id = null)
	{
		if ($this->request->is('post')) {
			$this->Contenus->id = $id;
			$this->Contenus->read(null,$id);
			$this->Contenus->set('slug',AppController::slugify($this->request->data['Contenus']['titre']));
			$this->Contenus->set($this->request->data);
			if ($this->Contenus->save()) {
				$this->Session->setFlash(__('La page à bien mise à jour.'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer la page'));
			}
		}
		$this->set('contenu', $this->Contenus->read(null, $id));
	}
	
public function view_recrutement($id = null)
	{
if ($this->request->is('post')) {
			$this->Post->id = $id;
			$this->Post->read(null,$id);
			$this->Post->set('slug',$this->slugify($this->request->data['Post']['titre']));
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Le texte a bien mise à jour.'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer le texte'));
			}
		}
		$this->set('recrut', $this->Post->read(null, $id));
	}
public function view_alaune($id = null)
	{
if ($this->request->is('post')) {
			$this->Post->id = $id;
			$this->Post->read(null,$id);
			$this->Post->set('slug',$this->slugify($this->request->data['Post']['titre']));
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('La une a bien mise à jour.'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer la une'));
			}
		}
		$this->set('recrut', $this->Post->read(null, $id));
	}
	public function view_action($id = null)
	{
		
		if ($this->request->is('post')) {
			$this->Post->id = $id;
			$this->Post->read(null,$id);
			$this->Post->set('slug',AppController::slugify($this->request->data['Post']['titre']));
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('L\'action à bien mise à jour.'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer l\'action'));
			}
		}
		$this->set('action', $this->Post->read(null, $id));
		$options = array(
		    'joins' => array(
		        array(
		            'alias' => 'ParentCategory',
		            'table' => 'categories',
		            'type' => 'INNER',
		            'conditions' => array('`ParentCategory`.`id` = `Category`.`parent_id`','`ParentCategory`.`slug`'=>'actions')
		        )
		    )
		);
$categories = $this->Category->find('list',$options);
		$this->set(compact('categories'));
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

	public function delete($type=null,$id=null)
	{
		switch ($type) {
			case 'Fiche':
				# code...
				break;

			case 'Critere':
					$this->Criterei->id = $id;
					$this->Critere->read(null,$id);
					$this->CritereValue->deleteAll(array('CritereValue.critere_id'=>$id),false);
					$this->Critere->delete($id);
				break;

			case 'CritereCategory':
					$c = $this->Critere->find('all',array('Critere.parent_category_id'=>$id));
					foreach ($c as $cri) {
						$this->CritereValue->deleteAll(array('CritereValue.critere_id'=>$cri['Critere']['id']),false);
					}
					$this->Critere->deleteAll(array('Critere.critere_category_id'=>$id),false);
					$this->CritereCategory->delete($id);

				break;
			
			default:
				# code...
				break;
		}
		$this->Session->setFlash(__('Supression réussie.'));
		$this->redirect(array('action'=>'index'));
	}

	public function add_actualite()
	{	
		$options = array(
		    'joins' => array(
		        array(
		            'alias' => 'ParentCategory',
		            'table' => 'categories',
		            'type' => 'INNER',
		            'conditions' => array('`ParentCategory`.`id` = `Category`.`parent_id`','`ParentCategory`.`slug`'=>'actualites')
		        )
		    )
		);

		if ($this->request->is('post')) {
			$this->Post->create();
			$this->Post->set('slug',AppController::slugify($this->request->data['Post']['titre']));
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('L\'actualité à bien été enregistrée.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer l\'actualité'));
			}
		}

		$categories = $this->Category->find('list',$options);
		$this->set(compact('categories'));
	}

	public function actualites_category()
	{
		$this->paginate = array(
		    'conditions' => array('ParentCategory.slug'=>'actualites'));
		$this->Category->recursive = 0;
		$this->set('categories',$this->paginate('Category'));
	}

	public function action_category()
	{
		$this->paginate = array(
		    'conditions' => array('ParentCategory.slug'=>'actions'));
		$this->Category->recursive = 0;
		$this->set('categories',$this->paginate('Category'));
	}

	public function add_actualite_category()
	{
		$this->Category->recursive = -1;
		
		if ($this->request->is('post')) {
			$this->Category->create();
			$this->Category->set('slug',AppController::slugify($this->request->data['Category']['nom']));
			if ($this->Category->save($this->request->data)) { 
				$this->Session->setFlash(__('La catégorie a bien été créée.'));
				//$this->redirect(array('action' => 'actualite_category'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer l\'actualité'));
			}
		}

		$parentCategories = $this->Category->find('list',array('conditions'=>array('Category.slug'=>'actualites')));
		$this->set(compact('parentCategories'));
	}

	public function add_action_category()
	{
		$this->Category->recursive = -1;
		
		if ($this->request->is('post')) {
			$this->Category->create();
			$this->Category->set('slug',AppController::slugify($this->request->data['Category']['nom']));
			if ($this->Category->save($this->request->data)) { 
				$this->Session->setFlash(__('La catégorie a bien été créée.'));
				//$this->redirect(array('action' => 'actualite_category'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer l\'actualité'));
			}
		}

		$parentCategories = $this->Category->find('list',array('conditions'=>array('Category.slug'=>'actions')));
		$this->set(compact('parentCategories'));
	}

public function alaune()
	{
		$this->paginate = array('conditions'=>array('Category.slug'=>'a-la-une'));
		$this->Post->recursive = 1;
		$this->set('alaune',$this->Paginate('Post'));
	}
	
	public function recrutement()
	{
		$this->paginate = array('conditions'=>array('Category.slug'=>'texte-recrutement'));
		$this->Post->recursive = 1;
		$this->set('alaune',$this->Paginate('Post'));
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
		$this->set('bruissements',$this->paginate('Post',array('Category.slug LIKE'=>'%bruissements%')));
	}

	public function add_bruissement()
	{
		if ($this->request->is('post')) {
			$c = $this->Category->find('first', array(
		        'conditions' => array('Category.slug' => 'bruissements')
		    ));
			$this->Post->create();
			$this->Post->set('category_id',$c['Category']['id']);
			if ($this->Post->save($this->request->data)) { 
				$this->Session->setFlash(__('Le bruissement a été créé.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Impossible d\'enregistrer le bruissement'));
			}
		}
	}

	public function actions()
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
		            'conditions' => array('`ParentCategory`.`id` = `cat`.`parent_id`','`ParentCategory`.`slug` LIKE'=>'%actions%')
		        )
		    )
		);
		$this->Post->recursive = 1;
		$this->set('actions',$this->paginate('Post'));

		
	}

	public function add_actions()
	{
		$options = array(
		    'joins' => array(
		        array(
		            'alias' => 'ParentCategory',
		            'table' => 'categories',
		            'type' => 'INNER',
		            'conditions' => array('`ParentCategory`.`id` = `Category`.`parent_id`','`ParentCategory`.`slug`'=>'actions')
		        )
		    )
		);
	
		$categories = $this->Category->find('list',$options);
		$this->set(compact('categories'));
	}
}

?>