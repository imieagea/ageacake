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

	public function merci()
	{
		
	}

	public function deposer()
	{

		$authTypes = array('application/pdf','application/msword');
		if ($this->request->is('post')) {
			$this->Fiche->create();
			$this->Fiche->set('statut','new');
			$this->Fiche->set($this->request->data);
			if(!empty($this->request->data['Fiche']['cv']['name']))
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