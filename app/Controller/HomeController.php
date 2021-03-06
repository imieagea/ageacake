<?php
App::uses('AppController', 'Controller','CakeEmail', 'Network/Email');

class HomeController extends AppController {
	
	var $uses = array('Post','Category','CritereCategory','Fiche','CritereValue','Partenaires','Texte');

	var $docTypes = array('application/pdf','application/msword');

	public function beforeFilter()
	{
		$this->Auth->allow('index','deposer','actions','actualites','partenaires');
		parent::beforeFilter();
	}


	public function partenaires()
	{
		$options = array(
		    'conditions' => array('Texte.slug' => 'partenaires')
		);
		$texte = $this->Texte->find('first',$options);
		$this->set('texte',$texte);
		$parts = $this->Partenaires->find('all');
		$this->set('partenaires',$parts);
	}
	public function cul()
	{
		echo 'Cul na mie code.';
		die();
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

	public function merci()
	{
		
	}

	public function actions()
	{
		$options = array(
		    'conditions' => array('Texte.slug' => 'actions')
		);
		$texte = $this->Texte->find('first',$options);
		$this->set('texte',$texte);
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

	public function actualites()
	{
		$options = array(
		    'conditions' => array('Texte.slug' => 'actualites')
		);
		$texte = $this->Texte->find('first',$options);
		$this->set('texte',$texte);
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
		$this->set('actualites',$this->paginate('Post'));
	}

	public function deposer()
	{

		$authTypes = array('application/pdf','application/msword');
		$erreurs = '';	
		if ($this->request->is('post')) {
			$this->Fiche->create();
			$this->Fiche->set('statut','new');
			$this->Fiche->set($this->request->data);
			
			if(!empty($this->request->data['Fiche']['cv']['name']))
			{
				$cv = $this->request->data['Fiche']['cv'];
				
				if (in_array($cv['type'], $authTypes)) {
					$chemin_destination = '../webroot/cv/';
					$name = AppController::slugify($cv['name'].microtime());
					
					$path_parts = pathinfo($cv['name']);
					//var_dump($cv['tmp_name']);
					$ext = $path_parts['extension'];
					$this->Fiche->set('pdf',$name.'.'.$ext);

					move_uploaded_file($cv['tmp_name'], $chemin_destination.$name.'.'.$ext);
					

	 			}else
	 			{
	 				$this->Session->setFlash(utf8_encode('La pi�ce jointe n\'a pas �t� prise en compte'));
	 			}
			}else
			{
				$this->Session->setFlash(utf8_encode('Le cv est obligatoire'));
			}

			if($this->Fiche->save())
			{
				foreach ($this->request->data['criteres']['cb'] as $value)
			 	{
			 		$this->CritereValue->create();
			 		$this->CritereValue->set('fiche_id',$this->Fiche->id);
		 			$this->CritereValue->set('value',1);
		 			$this->CritereValue->set('critere_id',$value);
		 			$this->CritereValue->save();
	 			}
	 			if(isset($this->request->data['criteres']['text']))
	 			{
	 				foreach ($this->request->data['criteres']['text'] as $c => $value)
				 	{
				 		$this->CritereValue->create();
				 		$this->CritereValue->set('fiche_id',$this->Fiche->id);
			 			$this->CritereValue->set('value',$value);
			 			$this->CritereValue->set('critere_id',$c);
			 			$this->CritereValue->save();
		 			}
	 			}
	 		
/*			$email = new CakeEmail();
				$email->from(array('me@example.com' => 'My Site'));
				$email->to('you@example.com');
				$email->subject('About');
				$email->send('My message');
*/
	 			$this->Session->setFlash(utf8_encode('Votre CV a bien �t� enregistr�'));
	 			$this->redirect(array('action'=>'merci'));
			}else
			{
				
				//var_dump(expression)
				foreach ($this->Fiche->validationErrors as $erreur => $cause) {
					# code...
					$erreurs .= 'Le champ '.$erreur.' ';
					$cause = $cause[0];
					
					switch ($cause) {
						case 'notempty':
								$erreurs.= 'est obligatoire.<br/>';
							break;

						case 'email':
								$erreurs.= 'n\'est pas au format adresse@exemple.fr<br/>';
							break;
						
						default:
							$erreurs.= 'n\'est pas valide<br/>';
							break;
					}
				}
				
			}
			$this->set('criteresV',$this->request->data['criteres']);
		}
		$this->CritereCategory->recursive = 3;
		$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null,'CritereCategory.public'=>1),'order'=>'CritereCategory.position ASC'));
		$this->set('criteres',$c);
		

		
	}

}

?>