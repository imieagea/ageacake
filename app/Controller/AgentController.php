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

	public function cvtheque()
	{
		$options = array();
		if ($this->request->is('post')) {
			if(!empty($this->request->data['critere']))
			{
				$options = array(
				    'joins' => array(
				        array(
				            'alias' => 'CritereValue',
				            'table' => 'critere_value',
				            'type' => 'INNER',
				            'conditions' => array('`CritereValue`.`fiche_id` = `Fiche`.`id`','`CritereValue`.`critere_id`'=>$this->request->data['critere'])
				        )
				    )
				);
			}
		}
		$this->CritereCategory->recursive = 2;
		$c = $this->CritereCategory->find('all',array('conditions'=>array('CritereCategory.parent_id'=>null,'CritereCategory.public'=>1),'order'=>'CritereCategory.position ASC'));
		$this->set('criteres',$c);

		$fiches = $this->Fiche->find('all',array_merge($options,array('conditions'=>array('Fiche.statut'=>'validated'))));
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
		$html2pdf->getHtmlFromPage($content);
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