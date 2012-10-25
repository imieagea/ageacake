<?php
App::uses('AppController', 'Controller');

class AdminController extends AppController {
	
	var $uses = array('Contenus','User','Fiche','Critere');

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

	}

	public function add_critere()
	{

	}

}

?>