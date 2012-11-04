<?php
App::uses('AppController', 'Controller');

class WebrootController extends AppController {

	public function beforeFilter()
	{
		$this->Auth->allow('cv');	
		parent::beforeFilter();
	}

	public function isAuthorized($user) {
	    if (isset($user['role']) && ($user['role'] === 'admin') || ($user['role'] === 'agent')) {
	        return true;
	    }
	    // Default deny
	    return false;
	}

	public function cv($name)
	{
		if($name)
		{
			$this->autoRender = false;
			$path_parts = pathinfo($name);
			$ext = $path_parts['extension'];

			$types = array('pdf'=>'application/pdf','doc'=>'application/msword');

			
			$this->response->type($types[$ext]);

			$this->response->download($name);
			$file = file_get_contents(WWW_ROOT.'cv\\'.$name);
			$this->response->body($file);
		}else
		{
			$this->redirect(array('controller'=>'home','action'=>'index'));
		}
	}
}

?>