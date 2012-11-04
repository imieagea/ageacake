<?php
App::uses('AppController', 'Controller','CakeEmail', 'Network/Email');

class HomeController extends AppController {
	
	var $uses = array('Post','Category','CritereCategory','Fiche','CritereValue');

	var $docTypes = array('application/pdf','application/msword');

	public function beforeFilter()
	{
		$this->Auth->allow('index','deposer','actions','actualites');
		parent::beforeFilter();
	}


	public function partenaires()
	{
		$parts = $this->Partenaires->find('all');
		$this->set('partenaires',$parts);
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
		
		if ($this->request->is('post')) {
		var_dump($this->request->data."looooooooo");
			$this->Fiche->create();
			$this->Fiche->set('statut','new');
			$this->Fiche->set($this->request->data);
			
			if(!empty($this->request->data['Fiche']['cv']['name']))
			{
				$fiche = $this->Fiche->read(null,$id);
				
				$cv = $this->request->data['Fiche']['cv'];
				
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
	 				$this->Session->setFlash(utf8_encode('La pièce jointe n\'a pas été prise en compte'));
	 			}
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
	 			$this->Session->setFlash(utf8_encode('Votre CV a bien été enregistré'));
	 			$this->redirect(array('action'=>'merci'));
			}else
			{
		
				$this->Session->setFlash(utf8_encode('Un candidat avec cet email existe déjà'));
				$this->redirect(array('action'=>'deposer'));
			
			}

		}else
		{
			$this->CritereCategory->recursive = 3;
			$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null,'CritereCategory.public'=>1),'order'=>'CritereCategory.position ASC'));
			$this->set('criteres',$c);
		}

		
	}

}

?>