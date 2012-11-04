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
		if ($this->request->is('post')) {
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
		}
		$fiches = $this->Fiche->find('all',array('conditions'=>array('Fiche.statut'=>'validated')));
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
		require_once(ROOT.'\\'.APP_DIR.'\\Lib\Html2Pdf\html2pdf.class.php');
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
		//var_dump($content);
		$html2pdf = new HTML2PDF('P','A4','fr');
	    $html2pdf->WriteHTML($html2pdf->getHtmlFromPage($content));
	    $fiche = $this->Fiche->read(null, $id);
	    $nom = $fiche['Fiche']['nom'].'-'.$fiche['Fiche']['prenom'];
	    $this->response->type('application/pdf');
	    $html2pdf->Output($nom.'.pdf','D');
	}

}

?>