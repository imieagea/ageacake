<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {
	
	var $uses = array('Post','Category','CritereCategory','Fiche','CritereValue');

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
		$authTypes = array('application/pdf','application/msword');
		if ($this->request->is('post')) {
			$this->Fiche->create();
			$this->Fiche->set('status','new');
			$this->Fiche->set($this->request->data);
			if(isset($this->request->data['Fiche']['cv']))
			{
				$cv = $this->request->data['Fiche']['cv'];
				if (in_array($cv['type'], $authTypes)) {
					$chemin_destination = WWW_ROOT.'cv\\';
					$name = AppController::slugify($cv['name']);
					$path_parts = pathinfo($cv['name']);
					$ext = $path_parts['extension'];
					
					$this->Fiche->set('pdf',$chemin_destination.$name.'.'.$ext);
					if(move_uploaded_file($cv['tmp_name'], $chemin_destination.$name.'.'.$ext))
					{
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
				 			
				 			echo 'ZGEG';
				 			die();
			 			}
					}else
					{
						var_dump($this->Fiche->validationErrors);
						var_dump($this->request->data);
					}
				}
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