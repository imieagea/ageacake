<?php
App::uses('AppController', 'Controller');

class AgentController extends AppController {
	
	var $uses = array('Fiche','Critere','CritereCategory','CritereValue');

	public function beforeFilter()
	{
        $this->layout = 'default';
		$this->set('title_for_layout', 'AGEA - Espace adhérent');
		parent::beforeFilter();
	}

	public function isAuthorized($user) {
	    if (isset($user['role']) && ($user['role'] === 'admin') || ($user['role'] === 'agent')) {
	        return true;
	    }
	    // Default deny
	    return false;
	}

	public function index()
	{

	}

	public function agenda()
	{
		$this->layout = 'agenda';
	}

	public function cvtheque()
	{
		$options = array();
		$sql = "SELECT `Fiche`.`nom`,`Fiche`.`prenom`,`Fiche`.`email`,`Fiche`.`id` FROM `legrand4`.`fiches` AS `Fiche` WHERE `Fiche`.`statut` = 'validated'";
		if ($this->request->is('post')) {
			if(!empty($this->request->data['critere']))
			{
				$criteres = ' ( ';
					$ii = 0;
				foreach ($this->request->data['critere'] as $value) {
					if($value != 'null')
					{
						if($ii == 0)
							$criteres.= $value;
						else
						$criteres .= ','.$value;

						$cks[$value] = true ;
						$ii++;
					}
				}

				
			}
			if(isset($cks))
			{
				$criteres.= ' ) ';
				$sql = "SELECT `CritereValue`.`fiche_id`,`Critere`.`id`,`Fiche`.`nom`,`Fiche`.`prenom`,`Fiche`.`email`,`Fiche`.`id`
				FROM `critere_value` AS `CritereValue`
				INNER JOIN `criteres` AS `Critere` ON (`CritereValue`.`critere_id` = `Critere`.`id`)
				INNER JOIN `legrand4`.`fiches` AS `Fiche` ON (`Fiche`.`id` = `CritereValue`.`fiche_id`)
				WHERE `Fiche`.`statut` = 'validated' AND `CritereValue`.`critere_id` IN ".$criteres."
				GROUP BY `Fiche`.`id`";
				$this->set('cks',$cks);
			}
		}
		$this->CritereCategory->recursive = 2;
		$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null,'CritereCategory.public'=>1),'order'=>'CritereCategory.position ASC'));
		$this->set('criteres',$c);

		$fiches = $this->Fiche->query($sql);
		$this->set('fiches',$fiches);
	}

	public function cv($id=null)
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


	public function pdf($id=null)
	{
		$this->layout = null;
		require_once('../Lib/Html2Pdf/html2pdf.class.php');
		$this->Fiche->recursive = 2;
		$this->Fiche->id = $id;
		if (!$this->Fiche->exists()) {
			throw new NotFoundException(__('Fiche non trouvée'));
		}
		$this->set('fiche', $this->Fiche->read(null, $id));

		$this->CritereCategory->recursive = 2;
		$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null),'order'=>'CritereCategory.position ASC'));
		$this->set('criteres',$c);
		$response = $this->render('pdf');
		$content = $response->body();
		$html2pdf = new HTML2PDF('P','A4','fr');
		ob_start();
		echo $html2pdf->getHtmlFromPage($content);
		$data = ob_get_clean();
	    $html2pdf->WriteHTML($data);
	    $fiche = $this->Fiche->read(null, $id);
	    $nom = $fiche['Fiche']['nom'].'-'.$fiche['Fiche']['prenom'];
	    $this->response->type('application/pdf');
	    $html2pdf->Output($nom.'.pdf','D');
	}

	public function bruissements()
	{
		$this->Post->recursive = 1;
		$this->set('bruissements',$this->paginate('Post',array('Category.slug LIKE'=>'%bruissements%')));
	}

	public function bruissement($id=null)
	{
		if(!empty($id))
		{
			$this->set('bruissement', $this->Post->read(null, $id));
		}
	}

}

?>